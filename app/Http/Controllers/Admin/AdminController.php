<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function indexAdmins(){
        $admins = Admin::all();
        $i = 0;
        return view('admin.admins.index',compact('admins','i'));
    }
    public function create()
    {
        return view('admin.admins.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create admin
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return to_route('admin.admins.indexAdmins');
    }
    public function edit($id)
    {
        $admin = Admin::findorFail($id);
        return view('admin.admins.edit',compact('admin'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:70|unique:admins,email,'.$request->id,
        ]);
        $admin = Admin::findorFail($request->id);
        // Update admin
        if($request->password == $request->password_confirmation && empty($request->password)){
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } elseif ($request->password == $request->password_confirmation && strlen($request->password) >= 8){
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }else{
            return back()->with('failed','password fields must be empty or >= 8 characters and equal');
        }

        return to_route('admin.admins.indexAdmins');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'exists:admins,id'
        ]);
        $admin = Admin::find($request->id);
        if($admin){
            $admin->delete();
        }
        return back();
    }

}
