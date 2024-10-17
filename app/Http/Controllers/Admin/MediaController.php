<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\MediaUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Admin\category;
use App\Models\Admin\media;
use App\Models\Admin\media_slugs;
use App\Models\Admin\mediaCategory;
use App\Models\Admin\slugs;
use App\Models\User;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    use MediaUploadTrait;
    public function index(){
        $allMedia = media::all();
        $i = 0;
        return view('admin.media.index',compact('allMedia','i'));
    }

    public function create()
    {
        $slugs = slugs::all();
        $categories = category::all();
        return view('admin.media.create',compact('slugs','categories'));
    }

    public function show($id)
    {
        $media = media::findorFail($id);
        return view('admin.media.show',compact('media'));
    }

    public function store(StoreMediaRequest $request)
    {
        // Get Uploaded Media Basic Data
        list($type,$duration,$directory,$media_name,$dummyId,$extension,$folder,$size,$formattedDuration,$dimensions) = $this->HandleMedia($request,'uploaded_photos','uploaded_videos');
        if($type == 'video'){

            if (!is_dir(public_path('screen_shots'))) {
                mkdir(public_path('screen_shots'), 0755, true); // Creates the directory with permission 0755 and recursively
            }

            // Generate random second
            $randomSecond = rand(0, $duration);

            // Format the random second as HH:MM:SS
            $formattedTime = gmdate("H:i:s", $randomSecond);
            $videoPath = $directory.'/'.$media_name;
            $screenshotPath = public_path('screen_shots/'.$dummyId.'.png');
            // Build the FFmpeg command
            $command = "ffmpeg -ss $formattedTime -i $videoPath -vframes 1 $screenshotPath";
            // Execute the command
            shell_exec($command);

        }
        if (Auth::guard('admin')->check()) {
            $id = User::first()->id;
        } elseif (Auth::guard('web')->check()) {
            $id = auth()->user()->id;
        }
        DB::transaction(function () use ($request,$extension,$folder,$media_name,$type,$size,$formattedDuration,$dimensions,$id) {
            $description = $request->description ?? null;
            $media = Media::create([
                'name' => $request->name,
                'description' => $description,
                'format' => $extension,
                'path' => $folder.'/'.$media_name,
                'uploaded_by_id' => $id // logged in user
            ]);

            foreach ($request->slugs as $slug_id){
                media_slugs::create([
                    'media_id' => $media->id,
                    'slug_id' => $slug_id
                ]);
            }

            mediaCategory::create([
                'media_id' => $media->id,
                'category_id' => $request->category
            ]);

            $media->mediaDetails()->create([
                'type' => $type,
                'size' => $size,
                'duration' => $formattedDuration,
                'resolution' => $dimensions,
            ]);
        });
        return back()->with('success','media deleted successfully');
    }

    public function edit($id)
    {
        $allSlugs = slugs::all();
        $mediaSlugs = media_slugs::where('media_id',$id)->pluck('slug_id')->toArray();
        $media = media::find($id);
        $categories = category::all();
        return view('admin.media.edit',compact('allSlugs','mediaSlugs','media','categories'));
    }

    public function update(UpdateMediaRequest $request)
    {

        $media = media::find($request->id);
        DB::transaction(function () use ($request,$media){
            if(!($request->description)){
                $description = null;
            }else{
                $description = $request->description;
            }

            if(($request->status == null)){
                $status = $media->approved;
            }else{
                $status = $request->status;
            }
            $media->update([
            'name' => $request->name,
            'description' => $description,
            'approved' => $status,
        ]);
            // Delete all tags
        $media->slugs()->detach();
        foreach ($request->slugs as $slug){
            media_slugs::create([
                'media_id' => $media->id,
                'slug_id' => $slug
            ]);
        }

        if($media->categories->first()->id != $request->category){
            mediaCategory::where('media_id',$media->id)->update([
                'category_id' => $request->category
            ]);
        }
        });

        return back()->with('success','media edited successfully');
    }

    public function delete($id){
        $media = media::find($id);
        if($media){
            if (File::exists(public_path($media->path))) {
                File::delete(public_path($media->path));
            }
            if (File::exists(public_path('screen_shots/'.basename($media->path)))) {
                File::delete(public_path('screen_shots/'.basename($media->path)));
            }
            $media->delete();
        }
        return back()->with('success','media deleted successfully');
    }
}
