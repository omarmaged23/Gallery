<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\media;
use App\Models\likes;
use App\Models\media_interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaInteractionController extends Controller
{
    public function comment(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
            'id' => 'required|exists:media,id'
        ]);
        $comment = media_interaction::create([
            'comment' => $request->comment,
            'media_id' => $request->id,
            'user_id' => auth()->user()->id
        ]);
        return response()->json($comment);
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
        return to_route('home');
    }
}
