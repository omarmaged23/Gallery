<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Models\Admin\banner;
use App\Models\Admin\category;
use App\Models\Admin\media;
use App\Models\Admin\media_slugs;
use App\Models\Admin\slugs;
use App\Models\media_interaction;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    private $photosPerPage = 8;
    public function index()
    {
        $photosPerPage = $this->photosPerPage;

        $photos = media::whereHas('mediaDetails', function($query) {
            $query->where('type', 'image');
        })->where('approved','1')->paginate($photosPerPage);

        $banner = banner::where('active','1')->whereHas('bannerDetails', function($query) {
            $query->where('type', 'image');
        })->first();

        $categories = category::all();
        $slugs = slugs::all();

        return view('photos.view',compact('photos','categories','slugs','banner'));
    }

    public function show($id)
    {
        $photo = media::findorFail($id);
        if(!($photo->approved)){
            return back();
        }
        $photoSlugs = media_slugs::where('media_id',$id)->pluck('slug_id')->toArray();
        $categories = category::all();
        $slugs = slugs::all();
        return view('photos.show',compact('photo','photoSlugs','categories','slugs'));
    }

    public function searchBySlug($slug_id)
    {
        $photosPerPage = $this->photosPerPage;
        $photos = media::where('approved','1')->whereHas('slugs', function($query) use($slug_id){
            $query->where('slug_id', $slug_id);
        })->paginate($photosPerPage);
        $banner = banner::where('active','1')->whereHas('bannerDetails', function($query) {
            $query->where('type', 'image');
        })->first();
        return view('photos.slugSearch',compact('photos','banner'));
    }
}
