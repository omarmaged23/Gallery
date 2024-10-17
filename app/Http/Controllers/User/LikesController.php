<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\media;
use App\Models\likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LikesController extends Controller
{
    public function like(Request $request)
    {
        $obj = new likes();
        $like = $obj->where([
            ['media_id',$request->id],
            ['user_id',auth('web')->user()->id]
        ]);
        $is_liked = $like->count();

        if($is_liked){
            $like->first()->delete();
            $likes = $obj->where('media_id',$request->id)->count();
            return response()->json([
                'status' => 302,
                'count' =>$likes
            ]);
        }

        $obj->create([
            'media_id' => $request->id,
            'user_id' => auth('web')->user()->id
        ]);

        $likes = $obj->where('media_id',$request->id)->count();

        return response()->json([
            'status' => 200,
            'count' =>$likes
        ]);
    }
    public function download($id)
    {
        $media = media::find($id);
        if($media){
            return response()->json('yes');
        }

        return response()->json(['error' => 'File not found'], 404);
    }
}
