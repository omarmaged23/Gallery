@extends('admin.layouts.layout')
@section('title')
    Banners
@endsection
@section('banner_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Banners</h1>
    <div class="container bg-light">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a class="btn btn-dark w-100" href="{{route('admin.banner.create')}}"> Create Banner</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
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
            @foreach($banners as $banner)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{basename($banner->path)}}</td>
                <td>{{$banner->bannerDetails->type}}</td>
                <td>{{$banner->bannerDetails->size}}MB</td>
                <td>{{$banner->bannerDetails->resolution}}</td>
                <td>{{$banner->admin->name}}</td>
                <td>{{$banner->active ? 'Active' : 'Disabled'}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.banner.show',$banner->id)}}">View</a> {{-- Get All Media Details --}}
{{--                    <a class="btn btn-secondary" href="{{route('admin.banner.edit',$banner->id)}}">Edit</a>--}}
                    <a class="btn btn-danger" href="{{route('admin.banner.delete',$banner->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
@endsection
