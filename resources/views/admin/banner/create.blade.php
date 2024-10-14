@extends('admin.layouts.layout')
@section('title')
    Add Banner
@endsection
@section('banner_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Upload New Banner</h1>
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
        <form action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="media" class="form-label">Upload Banner</label>
                <input type="file" class="form-control" name="media" id="media">
            </div>
            <input class="btn btn-dark" type="submit" value="Add Banner">
        </form>
    </div>
@endsection
@section('scripts')
@endsection
