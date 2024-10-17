@extends('layouts.app1')

@section('title') Videos @endsection

@section('content')
<div class="container mt-4">
    <div class="row" style="padding: 5%;">
        <div class="d-flex justify-content-center align-items-center flex-column flex-lg-row" style="box-shadow: 0 4px 20px rgba(0,0,0,0.2);">
            <!-- User Info Card -->
            <div class="col-12 mb-4 m-5 px-3" >
                <div class="card d-flex align-items-center " style="border: none; text-align: center; padding: 0 15% 0; ">
                    <img style="width: 120px; height: 120px; border-radius: 50%;" src="{{$user->avatar_path ? asset('profile_picture/'.$user->avatar_path) : url('/images/profile.jpeg') }}" class="card-img-top" alt="Profile Image">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        @if($user->id == auth('web')->user()->id)
                        <a href="{{ route('userprofile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
                        @endif
                    </div>
                </div>
            {{-- </div> --}}

            <!-- Photo Gallery -->
            {{-- <div class="col-lg-8 col-sm-12" style=" contain:content;" > --}}
                <div id="photo-gallery" class="row">
                    @php
                        $i=0;
                    @endphp
                    @foreach($user->media as $media)
                        @continue($media->approved != 1)
                        <div class="col-lg-3 col-md-6 col-12 p-1"> <!-- Adjust this class for your layout -->
                            <div style='border:1px solid black;'>
                                @if($media->mediaDetails->type == 'image')
                                    <figure class="effect-ming tm-video-item">
                                        <a href="/photos/{{ $media->id }}">
                                            <div class=" d-flex justify-content-center">
                                                <img class="img-fluid " src="{{ asset($media->path) }}" alt="" style="height:200px; ">
                                            </div>
                                            <figcaption class="d-flex align-items-center justify-content-center">
                                                <h2>{{ $media->name }}</h2>
                                            </figcaption>
                                        </a>
                                    </figure>
                                @else
                                    <figure class="effect-ming tm-video-item">
                                        <a href="/videos/{{ $media->id }}">
                                            <div class=" d-flex justify-content-center">
                                                <img class="img-fluid" src="{{ asset('screen_shots/'.pathinfo($media->path, PATHINFO_FILENAME).'.png') }}" alt="" style="height:200px;">
                                            </div>
                                            <figcaption class="d-flex align-items-center justify-content-center">
                                                <h2>{{ $media->name }}</h2>
                                            </figcaption>
                                        </a>
                                    </figure>
                                @endif
                                <div class="d-flex justify-content-evenly">
                                    <span>{{ $media->user->name }}</span>
                                    <div id="{{'like-'.++$i}}" class="like-btn" data-id="{{$media->id}}">

                                        <button class="heart-button" aria-label="Like">
                                            @php
                                                $isLiked = \App\Models\likes::where([
                                                    ['media_id', $media->id],
                                                    ['user_id', auth('web')->user()->id]
                                                ])->exists();
                                            @endphp
                                            <i class="{{ $isLiked ? 'fa-solid' : 'fa-regular' }} fa-heart" style="font-size: 1.1em; color: red;"></i>
                                        </button>
                                        <span id="{{'likesCount-'.$i}}">{{$media->likes->count()}}</span>
                                    </div>
                                    <span class="tm-text-gray-light">{{ $media->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
