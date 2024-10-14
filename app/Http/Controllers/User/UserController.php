<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findorFail($id);
        return view('userprofile.show',compact('user'));
    }
    public function edit($id)
    {
        $user = User::findorFail($id);
        if($user->id != auth()->user()->id){
            return to_route('home');
        }
        return view('userprofile.edit',compact('user'));
    }
    public function change(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id
        ]);
        $user = User::findorFail($request->id);
        if($user->id != auth()->user()->id){
            return to_route('home');
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return to_route('userprofile.show',auth()->user()->id);
    }
}
