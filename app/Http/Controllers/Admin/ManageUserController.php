<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $i = 0;
        return view('admin.users.index',compact('users','i'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'exists:users,id'
        ]);

        if($request->status == '1'){
            $status = 1;
        }else{
            $status = 0;
        }

        $user = User::find($request->id);
        $user->active = $status;
        $user->status_changed_by = auth()->user()->id;
        $user->save();
        return back()->with('success','user status changed successfully');
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'exists:users,id'
        ]);
        $user = User::find($request->id);
        if($user){
            if (File::exists(public_path('profile_picture'.$user->path))) {
                File::delete(public_path('profile_picture'.$user->path));
            }
            $user->delete();
        }
        return back()->with('success','user deleted successfully');
    }
}
