@extends('admin.layouts.layout')
@section('title')
    Media
@endsection
@section('media_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Media Details</h1>
    <div class="container bg-light mt-5">

    <div class="row tm-mb-90 text-center my-5 pt-5">
        <div class="col-lg-8 col-md-12 mx-auto" style="max-height:500px;">
            @if($media->mediaDetails->type == 'image')
            <img src="{{ asset($media->path) }}" alt="" style="max-height: 100%;">
            @else
                <video src="{{asset($media->path)}}" style="max-height: 100%;" controls></video>
            @endif
        </div>
    </div>

        <table class="table table-hover table-striped">
            <tbody>
            <tr>
                <th scope="col">#ID</th>
                <td>{{$media->id}}</td>
            </tr>
            <tr>
                <th scope="col">Category</th> {{-- M --}}
                <td>{{$media->categories->first()->title}}</td>
            </tr>
            <tr>
                <th scope="col">Title</th> {{-- M --}}
                <td>{{$media->name}}</td>
            </tr>
            <tr>
                <th scope="col">Format</th> {{-- M --}}
                <td>{{$media->format}}</td>
            </tr>
            <tr>
                <th scope="col">File Path</th> {{-- M --}}
                <td>{{$media->path}}</td>
            </tr>
            <tr>
                <th scope="col">Type</th> {{-- MD --}}
                <td>{{$media->mediaDetails->type}}</td>
            </tr>
            <tr>
                <th scope="col">Size</th> {{-- MD --}}
                <td>{{$media->mediaDetails->size}}MB</td>
            </tr>
            <tr>
                <th scope="col">Resolution</th> {{-- MD --}}
                <td>{{$media->mediaDetails->resolution}}</td>
            </tr>
            @if($media->mediaDetails->type == 'video')
                <tr>
                    <th scope="col">Duration</th> {{-- MD --}}
                    <td>{{$media->mediaDetails->duration}}</td>
                </tr>
            @endif
            <tr>
                <th scope="col">Uploaded By</th> {{-- M -> user_name --}}
                <td>{{$media->user->name}}</td>
            </tr>
            <tr>
                <th scope="col">Uploaded At</th> {{-- M -> user_name --}}
                <td>{{$media->created_at}}</td>
            </tr>
            <tr>
                <th scope="col">Status</th>
                <td>{{$media->approved ? 'Approved' : 'Declined'}}</td>
            </tr>
            <tr>
                <th scope="col">Downloads</th>
                <td>{{$media->mediaDetails->download_count}}</td>
            </tr>
            <tr>
                <th scope="col">Tags</th>
                <td>
                    @foreach($media->slugs as $slug)
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block" style="text-decoration: none">{{$slug->title}}</a>
                    @endforeach
                </td>
            </tr>
             </tbody>
        </table>
    </div>
@endsection
@section('scripts')
@endsection
