<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\MediaUploadTrait;
use App\Http\Controllers\Controller;
use App\Models\Admin\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    use MediaUploadTrait;
    public function index()
    {
        $banners = banner::all();
        $i = 0;
        return view('admin.banner.index',compact('banners','i'));
    }

    public function show($id)
    {
        $banner = banner::findorFail($id);
        return view('admin.banner.show',compact('banner'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4,wav,mkv|max:102400',
        ]);
        list($type,$duration,$directory,$media_name,$dummyId,$extension,$folder,$size,$formattedDuration,$dimensions) = $this->HandleMedia($request,'photo_banner','video_banner');
        DB::transaction(function () use ($request,$extension,$folder,$media_name,$type,$size,$formattedDuration,$dimensions) {
            $banner = banner::create([
                'path' => $folder.'/'.$media_name,
                'uploaded_by_admin' => auth('admin')->user()->id,
            ]);
            $banner->bannerDetails()->create([
                'type' => $type,
                'size' => $size,
                'duration' => $formattedDuration,
                'resolution' => $dimensions,
            ]);
        });
        return to_route('admin.banner')->with('success','banner uploaded successfully!');
    }

    public function setActive(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:banners,id'
        ]);
        $bannerObject = new banner();
        $banner = $bannerObject->find($request->id);

        if($banner->active == '1'){
            return back()->with('failed','banner is already set to active');
        }

        $type = $banner->bannerDetails->type;

        $ActiveBanner = $bannerObject->where('active','1')->whereHas('bannerDetails', function ($query) use ($type) {
            $query->where('type', $type);
        })->first();

        if($ActiveBanner){
            $ActiveBanner->update([
                'active' => 0
            ]);
        }

        $banner->update([
            'active' => 1
        ]);

        return back()->with('success','banner is now set to active!');
    }

    public function delete($id)
    {
        $banner = banner::findorFail($id);
        if($banner){
            if (File::exists(public_path($banner->path))) {
                File::delete(public_path($banner->path));
            }
            $banner->delete();
        }
        return back();
    }
}
