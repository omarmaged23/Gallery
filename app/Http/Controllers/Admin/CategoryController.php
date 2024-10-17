<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();
        $i = 0;
        return view('admin.categories.index',compact('categories','i'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:15|unique:categories,title|regex:/^\S*$/',
        ]);
        category::create([
            'title' => $request->title,
        ]);
        return back()->with('success','category added');
    }
    public function delete(Request $request)
    {
        $slug = category::find($request->id);
        if($slug){
            $slug->delete();
        }
        return back()->with('success','category removed');
    }
}
