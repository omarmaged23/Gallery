<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\slugs;
use Illuminate\Http\Request;

class SlugsController extends Controller
{
    public function index(){
        $slugs = slugs::all();
        $i = 0;
        return view('admin.slugs.index',compact('slugs','i'));
    }
    public function create()
    {
        return view('admin.slugs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:15|unique:slugs|regex:/^\S*$/',
        ]);
        slugs::create([
            'title' => $request->title,
        ]);
        return back()->with('success','slug created successfully');
    }
    public function delete(Request $request)
    {
        $slug = slugs::find($request->id);
        if($slug){
            $slug->delete();
        }
        return back()->with('success','slug deleted successfully');
    }
}
