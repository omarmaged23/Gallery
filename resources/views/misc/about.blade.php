@extends('layouts.app1')

@section('title') About @endsection

@section('content')
<div class="position-relative" style="width: 100%; height: 25vh; overflow: hidden;">
    <h1 class="special-heading">About</h1>
    <p>learn about us</p>
    {{-- <img src="{{ url('/images/myimage1.jpg') }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;"> --}}
</div>
<div class="container my-4"  style="margin-bottom: 100%;">
    <div class="row mx-5" >
        <h3>About EgPics Website</h3>
        <div class="col-md-6" >
            <div class="position-relative my-4 " style="  width: 100%; height: 35vh; overflow: hidden;">
                <img src="{{ url('/images/about.jpg') }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center flex-sm-column" >
            <p class="my-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio, est tempore suscipit explicabo voluptatem facilis nisi excepturi sequi sed quia, facere ullam unde praesentium accusantium deleniti architecto, amet ipsum magnam? Maxime, obcaecati?
            </p>
            <p class="my-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio, est tempore suscipit explicabo voluptatem facilis nisi excepturi sequi sed quia, facere ullam unde praesentium accusantium deleniti architecto, amet ipsum magnam? Maxime, obcaecati?
            </p>
            <p class="my-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio, est tempore suscipit explicabo voluptatem facilis nisi excepturi sequi sed quia, facere ullam unde praesentium accusantium deleniti architecto, amet ipsum magnam? Maxime, obcaecati?
            </p>
        </div>
    </div>
</div>
@endsection
