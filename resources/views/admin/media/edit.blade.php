@extends('admin.layouts.layout')
@section('title')
    Add Media
@endsection
@section('media_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Edit Media</h1>
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
        <form action="{{route('admin.media.update')}}" method="post">
            @csrf
            <input type="hidden" value="{{$media->id}}" name="id">
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" name="name" value="{{$media->name}}" id="name" maxlength="10" placeholder="Enter Image Title">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="0" {{$media->approved == 0 ? 'selected' : ''}}>Declined</option>
                    <option value="1" {{$media->approved == 1 ? 'selected' : ''}}>Approved</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$media->categories->first()->id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="slugs" class="form-label">Slugs</label>
                <select class="form-control" name="slugs[]" multiple>
                    @foreach($allSlugs as $slug)
                        <option value="{{$slug->id}}" {{in_array($slug->id,$mediaSlugs) ? 'selected' : ''}}>{{$slug->title}}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-dark" type="submit" value="Submit Changes">
        </form>
    </div>
@endsection
@section('scripts')
@endsection
