@extends('admin.layouts.layout')
@section('title')
    Banner
@endsection
@section('banner_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Banner Details</h1>
            @if($banner->bannerDetails->type == 'image')
                <div class="position-relative" style="width: 100%; height: 25vh; overflow: hidden;">
                    <img src="{{ asset($banner->path) }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
                </div>
            @else
                <div class="position-relative" style="width: 100%; height: 25vh; overflow: hidden;">
                    <a href="">
                        <video src="{{asset($banner->path)}}" style="width: 100%; height: 100%; object-fit: cover;" autoplay muted loop>
                        </video>
                    </a>
                </div>
            @endif
    <h5 class="display-5 mb-5 text-center">This is how your banner will look like on the main website so, pick carefully</h5>

    <div class="container bg-light mt-5">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        <form action="{{route('admin.banner.setActive')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$banner->id}}">
            <button type="submit" class="btn btn-dark w-100"> Set As Active!</button>
        </form>

        <table class="table table-hover table-striped">
            <tbody>
            <tr>
                <th scope="col">#ID</th>
                <td>{{$banner->id}}</td>
            </tr>
            <tr>
                <th scope="col">Format</th> {{-- M --}}
                <td>{{pathinfo($banner->path, PATHINFO_EXTENSION)}}</td>
            </tr>
            <tr>
                <th scope="col">File Path</th> {{-- M --}}
                <td>{{$banner->path}}</td>
            </tr>
            <tr>
                <th scope="col">Type</th> {{-- MD --}}
                <td>{{$banner->bannerDetails->type}}</td>
            </tr>
            <tr>
                <th scope="col">Size</th> {{-- MD --}}
                <td>{{$banner->bannerDetails->size}}MB</td>
            </tr>
            <tr>
                <th scope="col">Resolution</th> {{-- MD --}}
                <td>{{$banner->bannerDetails->resolution}}</td>
            </tr>
            @if($banner->bannerDetails->type == 'video')
                <tr>
                    <th scope="col">Duration</th> {{-- MD --}}
                    <td>{{$banner->bannerDetails->duration}}</td>
                </tr>
            @endif
            <tr>
                <th scope="col">Uploaded By</th> {{-- M -> user_name --}}
                <td>{{$banner->admin->name}}</td>
            </tr>
            <tr>
                <th scope="col">Uploaded At</th> {{-- M -> user_name --}}
                <td>{{$banner->created_at}}</td>
            </tr>
            <tr>
                <th scope="col">Status</th>
                <td>{{$banner->active ? 'Approved' : 'Disabled'}}</td>
            </tr>
             </tbody>
        </table>
    </div>
@endsection
@section('scripts')
@endsection
