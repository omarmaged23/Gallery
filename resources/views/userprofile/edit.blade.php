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
                <img style="display: inline-block; position: relative; width: 120px; height: 120px; overflow: hidden; border-radius: 50%;" src="{{ url('/images/profile.jpeg') }}" class="card-img-top" alt="Video 1">
                <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <p class="card-text">Description: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores similique fuga quasi natus vel veniam, repudiandae aperiam totam nisi culpa aspernatur sunt laudantium dicta aut reprehenderit? Quia deleniti exercitationem vero.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Second Column Content -->
            <div class="card" style="border: none;">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Name" class="form-control input" id="name" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" placeholder="Email" class="form-control input" id="email">
                    </div>
                    {{-- <div class="mb-3">
                        <textarea class="form-control" name="description" id="message" cols="30" rows="10" style="resize:none">Description</textarea>
                    </div> --}}
                    <a href="#" type="submit" class="btn btn-primary">Submit</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
