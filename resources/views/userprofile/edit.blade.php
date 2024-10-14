@extends('layouts.app1')

@section('title') Videos @endsection

@section('content')
{{-- <div class="position-relative" style="width: 100%; height: 25vh; overflow: hidden;">
    <img src="{{ url('/images/myimage1.jpg') }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">

    <form class="d-flex my-2 my-lg-0 position-absolute" style="top: 35%; left: 40%;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
</div> --}}

<div class="container mt-4">
    <div class="row" style="padding: 5%">
        <div class="col-md-4">
            <!-- First Column Content -->
            <div class="card" style="border: none; text-align: center; display: flex; justify-content: center; align-items: center;">
                <img style="display: inline-block; position: relative; width: 120px; height: 120px; overflow: hidden; border-radius: 50%;" src="{{$user->avatar_path ? asset('profile_picture/'.$user->avatar_path) : url('/images/profile.jpeg') }}" class="card-img-top" alt="Video 1">
                <div class="card-body">
                    <h5 class="card-title">{{auth()->user()->name}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Second Column Content -->
            <div class="card" style="border: none;">
                <form action="{{route('userprofile.change')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Name" class="form-control input" id="name" aria-describedby="emailHelp" value="{{$user->name}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" placeholder="Email" class="form-control input" id="email" value="{{$user->email}}">
                    </div>
                    {{-- <div class="mb-3">
                        <textarea class="form-control" name="description" id="message" cols="30" rows="10" style="resize:none">Description</textarea>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
