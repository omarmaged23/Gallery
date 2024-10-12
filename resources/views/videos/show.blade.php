@extends('layouts.app1')

@section('title') Photos @endsection

@section('content')
{{-- <div class="position-relative" style="width: 100%; height: 25vh; overflow: hidden;">
    <img src="{{ url('/images/myimage1.jpg') }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
</div> --}}

<div class="container">
    <form id="search" class="d-flex justify-content-center my-3">
        <input class="form-control me-2" type="search" placeholder="Search for videos..." aria-label="Search" style="width: 300px;">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
</div>
  <div class="containers mb-4">
    <h3>Want to Edit/Delete Your file?</h3>
    <button type="button" class="btn btn-success" onclick="toggleUploadModal()">Edit</button>
    <button type="button" class="btn btn-danger" onclick="">Delete</button>
</div>

<div id="upload-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="toggleUploadModal()">&times;</span>
        @include('userprofile.uploads.update')
    </div>
</div>
<div class="pt-5 pb-3" style="padding: 0 4%;">
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">Photo title goes here</h2>
        </div>
        <div class="row tm-mb-90">            
            <div class=" col-lg-8 col-md-12" style="padding: 0%">
                <video class="video" style="width: 100%; height: auto; object-fit: cover;" muted controls>
                    <source src="{{ url('/images/movie(1).mp4') }}" type="video/mp4">
                    <source src="{{ url('/images/movie.ogg') }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class=" col-lg-4 col-md-12" style="display:flex; align-items:center; background-color: #eeeeee; padding: 40px 40px 40px 20px; ">
                <div class="tm-bg-gray tm-video-details">
                    <p class="mb-4" style="color: #999;">
                        Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a PayPal donation</a>. Your support helps us continue our work.
                    </p>
                    <div class="text-center mb-5">
                        <a href="#" class="btn btn-success tm-btn-big" style="padding: 12px 90px 14px;">Download</a>
                    </div>                    
                    <div class="mb-4 d-flex flex-wrap dimension-format">
                        <div class="mb-4">
                            <h4 class="tm-text-gray-dark mb-3">Uploader: Ahmed</h4>
                        </div>
                        <div class="mb-4">
                            <h4 class="tm-text-gray-dark mb-3">Image Title: Title</h4>
                        </div>
                        <div class="mb-4">
                            <h4 class="tm-text-gray-dark mb-3">Description:</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque in doloremque nobis? Delectus architecto maxime mollitia sunt veniam eum tempore necessitatibus! Consequuntur similique reprehenderit harum asperiores amet aperiam corrupti quibusdam.</p>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Dimension: </span>
                            <span class="tm-text-primary highlight">1920x1080</span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Format: </span>
                            <span class="tm-text-primary highlight">JPG</span>
                        </div>
                    </div>                   
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">License</h3>
                        <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
                    </div>
                    <div>
                        <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Cloud</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Bluesky</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Nature</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Background</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Timelapse</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Night</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Real Estate</a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <button class="heart-button" aria-label="Like">
                                <i class="fa-regular fa-heart" style="font-size: 1.1em; color: red;"></i>
                            </button>
                            <span class="highlight">500</span>
                        </div>
                        <div>
                            <span class="tm-text-gray-dark">Downloads: </span>
                            <span class="highlight">5000000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <hr>
        <div class="row my-4">
            <h4 class="col-12 tm-text-primary">Comments</h4>
            <div class="col-12 mt-3">
                <div class="comment mb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a  href="{{route('profile',1)}}" style="display: inline">
                                <img style="display: inline-block; position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;" src="{{ url('/images/profile.jpeg') }}" alt="">
                            </a>
                            <a href="{{route('profile',1)}}"> <span class="font-weight-bold">User Name</span></a>
                        </div>
                        <span class="text-muted">2 days ago</span>
                    </div>
                    <p class="mt-2">This is a comment text. It can be insightful, funny, or simply a response to the photo.</p>
                </div>
                <div class="comment mb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a  href="{{route('profile',1)}}" style="display: inline">
                                <img style="display: inline-block; position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;" src="{{ url('/images/profile.jpeg') }}" alt="">
                            </a>
                            <a href="{{route('profile',2)}}"> <span class="font-weight-bold">User Name</span></a>
                        </div>
                        <span class="text-muted">3 days ago</span>
                    </div>
                    <p class="mt-2">Another comment goes here. It can also contain some reactions or additional thoughts.</p>
                </div>
            </div>
            <div class="col-12 mt-4">
                <form>
                    <div class="form-group" style="padding-bottom: 3%">
                        <label for=""><h5 class="tm-text-secondary">Leave a Comment:</h5></label>
                        <textarea class="form-control py-2" rows="3" placeholder="Write your comment here..." style="resize:none"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <hr>


        <!-- Related Photos Section -->
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">Related Photos</h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @for ($i = 1; $i <= 8; $i++)
            <div class="col-lg-3 col-md-6 col-12 p-1"><div style="border:1px solid black;">
                <figure class="effect-ming tm-video-item">
                    <a href="{{route('videos.show',1)}}">
                        <video style="width: 100%; height: 100%; object-fit: cover;" muted>
                            <source src="/images/movie(1).mp4" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    <figcaption class="d-flex align-items-center justify-content-center">
                      <h2>Ocean</h2>
                    </figcaption>
                  </a>
                </figure>
                <div class="d-flex justify-content-evenly">
                <span>Ahmed</span>
                <div>
                  <button class="heart-button" aria-label="Like">
                    <i class="fa-regular fa-heart" style="font-size: 1.1em; color: red;"></i>
                  </button>
                  <span>500</span>
                </div>
                <span class="tm-text-gray-light">18 Oct 2020</span>
                </div>
             </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<script>
    
function toggleUploadModal() {
        const modal = document.getElementById('upload-modal');
        modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('upload-modal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
  </script>

@endsection
