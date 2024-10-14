@extends('admin.layouts.layout')
@section('title')
    Media
@endsection
@section('media_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Media</h1>
    <div class="container bg-light">
        <a class="btn btn-dark w-100" href="{{route('admin.media.create')}}"> Create Media</a>
        <table class="table table-hover">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th> {{-- M --}}
                <th scope="col">File Name</th> {{-- M --}}
                <th scope="col">Type</th> {{-- MD --}}
                <th scope="col">Size</th> {{-- MD --}}
                <th scope="col">Resolution</th> {{-- MD --}}
                <th scope="col">Uploaded By</th> {{-- M -> user_name --}}
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allMedia as $media)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$media->name}}</td>
                <td>{{basename($media->path)}}</td>
                <td>{{$media->mediaDetails->type}}</td>
                <td>{{$media->mediaDetails->size}}MB</td>
                <td>{{$media->mediaDetails->resolution}}</td>
                <td>{{$media->user->name}}</td>
                <td>{{$media->approved ? 'Approved' : 'Hidden'}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.media.show',$media->id)}}">View</a> {{-- Get All Media Details --}}
                    <a class="btn btn-secondary" href="{{route('admin.media.edit',$media->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{route('admin.media.delete',$media->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
@endsection
