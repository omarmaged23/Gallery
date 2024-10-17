@extends('admin.layouts.layout')
@section('title')
    Add Media
@endsection
@section('media_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Add New Media</h1>
    <div class="container bg-light">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @if(session()->has('failed'))
            <div class="alert alert-danger">
                {{session('failed')}}
            </div>
        @endif
        <form action="{{route('admin.media.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" maxlength="10" placeholder="Enter Image Title">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="slugs" class="form-label">Slugs</label>
                <select class="form-control" name="slugs[]" multiple>
                    @foreach($slugs as $slug)
                        <option value="{{$slug->id}}">{{$slug->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="media" class="form-label">Media</label>
                <input type="file" class="form-control" name="media" id="media">
            </div>
            <input class="btn btn-dark" type="submit" value="Add Media">
        </form>
    </div>
@endsection
@section('scripts')
@endsection
