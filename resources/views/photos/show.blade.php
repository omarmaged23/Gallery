@extends('layouts.app1')

@section('title') Photos @endsection

@section('content')
<div class="container">

    <form id="search" class="d-flex justify-content-center my-3">
        <input class="form-control me-2" type="search" placeholder="Search for videos..." aria-label="Search" style="width: 300px;">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
</div>
    @if($photo->user->id == auth()->user()->id)
    <div class="containers mb-4">
        <h3>Want to Edit/Delete Your file?</h3>
        <button type="button" class="btn btn-success" onclick="toggleUploadModal()">Edit</button>
        <a class="btn btn-danger" href="{{route('delete',$photo->id)}}">Delete</a>
    </div>

    <div id="upload-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="toggleUploadModal()">&times;</span>
            @include('userprofile.uploads.update')
        </div>
    </div>
    @endif

    <div class="container pt-5 pb-3" style="padding: 0 4% 0;">
        <div class="container-fluid tm-container-content tm-mt-60">
            <div class="row mb-4">
                <h2 class="col-12 tm-text-primary">{{$photo->name}}</h2>
            </div>
            <div class="row tm-mb-90">
                <div class="col-lg-8 col-md-12" style="padding: 0%">
                    <img src="{{ asset($photo->path) }}" alt="" style="width: 100%;">
                </div>
                <div class="col-lg-4 col-md-12" style="background-color: #eeeeee; padding: 40px 40px 40px 20px;">
                    <div class="tm-bg-gray tm-video-details">
                        <div class="text-center mb-5">
                            <a href="{{asset($photo->path)}}" download="capture" id="download-btn" class="btn btn-success tm-btn-big" style="padding: 12px 90px 14px;">Download</a>
                            <p class="mb-4" style="color: #999; padding-top:5%;">
                                Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat aliquet justo. Cras nec varius leo.
                            </p>
                        </div>
                        <div class="mb-4 d-flex flex-wrap dimension-format">
                            <div class="mb-4">
                                <h4 class="tm-text-gray-dark mb-3">Uploaded By: {{$photo->user->name}}</h4>
                            </div>

                            <div class="mb-4">
                                <h4 class="tm-text-gray-dark mb-3">Description:</h4>
                                <p>{{$photo->description}}</p>
                            </div>
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Dimensions: </span>
                                <span class="tm-text-primary highlight">{{$photo->mediaDetails->resolution}}</span>
                            </div>
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Format: </span>
                                <span class="tm-text-primary highlight">{{$photo->format}}</span>
                            </div>
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Category: </span>
                                <span class="tm-text-primary highlight">{{$photo->categories->first()->title}}</span>
                            </div>
                        </div>
                        <div>
                            <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                            @foreach($photo->slugs as $slug)
                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">{{$slug->title}}</a>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-between">
                            <div id="liked" class="like-btn-0" data-id="{{$photo->id}}">
                                <button class="heart-button" aria-label="Like">
                                    @php
                                        $isLiked = \App\Models\likes::where([
                                            ['media_id', $photo->id],
                                            ['user_id', auth()->user()->id]
                                        ])->exists();
                                    @endphp
                                    <i class="{{ $isLiked ? 'fa-solid' : 'fa-regular' }} fa-heart" style="font-size: 1.1em; color: red;"></i>
                                </button>
                                <span id="{{'likesCount-0'}}">{{$photo->likes->count()}}</span>
                            </div>
{{--                                <span class="tm-text-gray-dark">Downloads: </span>--}}
{{--                                <span class="highlight">{{$photo->mediaDetails->download_count}}</span>--}}
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row my-4">
                <h4 class="col-12 tm-text-primary">Comments</h4>
                <div class="col-12 mt-3" id="commentSection">
                    @foreach($photo->comments as $comment)
                    <div class="comment mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ route('profile', $comment->user->id) }}" style="display: inline">
                                    <img style="display: inline-block; position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;" src="{{$comment->user->avatar_path ? asset('profile_picture/'.$comment->user->avatar_path) : url('/images/profile.jpeg') }}" alt="">
                                </a>
                                <a href="{{ route('profile', $comment->user->id) }}"> <span class="font-weight-bold">{{$comment->user->name}}</span></a>
                            </div>
                            <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
                        </div>
                        <p class="mt-2">{{$comment->comment}}</p>
                    </div>
                    @endforeach

                </div>
                <div class="col-12 mt-4">
                    <form id="commentForm" method="POST">
                        @csrf
                        <div class="form-group" style="padding-bottom: 3%">
                            <label for=""><h5 class="tm-text-secondary">Leave a Comment:</h5></label>
                            <textarea name="comment" class="form-control py-2" rows="3" placeholder="Write your comment here..." style="resize:none"></textarea>
                        </div>
                        <input name="id" type="hidden" value="{{$photo->id}}">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                </div>
            </div>
{{-- Start Related Photos Section --}}
            <hr>
{{--            <div class="row mb-4">--}}
{{--                <h2 class="col-12 tm-text-primary">Related Photos</h2>--}}
{{--            </div>--}}
{{--            <div class="row mb-3 tm-gallery">--}}
{{--                @for ($i = 1; $i <= 8; $i++)--}}
{{--                <div class="col-lg-3 col-md-6 col-12 p-1">--}}
{{--                    <div style="border:1px solid black;">--}}
{{--                        <figure class="effect-ming tm-video-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="img-fluid" src="{{ url('/images/img.jpg') }}" alt="" style="width: 100%;">--}}
{{--                                <figcaption class="d-flex align-items-center justify-content-center">--}}
{{--                                    <h2>Pinky</h2>--}}
{{--                                </figcaption>--}}
{{--                            </a>--}}
{{--                        </figure>--}}
{{--                        <div class="d-flex justify-content-evenly">--}}
{{--                            <span>Ahmed</span>--}}
{{--                            <div id="{{'like-0'}}" class="like-btn-0" data-id="{{$photo->id}}">--}}
{{--                                <button class="heart-button" aria-label="Like">--}}
{{--                                    <i class="fa-regular fa-heart" style="font-size: 1.1em; color: red;"></i>--}}
{{--                                </button>--}}
{{--                                <span id="{{'likesCount-0'}}">500</span>--}}
{{--                            </div>--}}
{{--                            <span class="tm-text-gray-light">18 Oct 2020</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endfor--}}
{{--            </div>--}}
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

<script>
    $(document).ready(function () {
        $(document).on('click', '.like-btn-0', function () {
            const buttonId = $(this).attr('id'); // Get clicked btn
            const itemId = $(this).data('id');   // Get data-id attr
            const likeIcon =$('#' + buttonId).children().first();   // Get first child
            const likeCount =$('#' + buttonId).children().eq(1);   // Get second child
            $.ajax({
                type: 'POST',
                url: '/like',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: itemId,
                },
                success: function (response) {
                    if(response.status == 302){
                        likeIcon.html(`<i class="fa-regular fa-heart" style="font-size: 1.1em; color: red;"></i>`);
                    }else{
                        likeIcon.html(`<i class="fa-solid fa-heart" style="font-size: 1.1em; color: red;"></i>`);
                    }
                    likeCount.html(response.count);
                },
                error: function (xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    //     Comments
        newComment = $('#commentSection');
        $('#commentForm').on('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            $.ajax({
                type: 'POST',
                url: '/comment',
                data: $(this).serialize(),
                success: function (response) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.log('nope');
                }
            });
        });

    });
</script>
{{--<script>--}}
{{--    const photoid = "{{$photo->id}}"; // Get the photo ID--}}
{{--    $(document).ready(function () {--}}
{{--        $(document).on('click', '#download-btn', function (e) {--}}
{{--        e.preventDefault;--}}
{{--            $.ajax({--}}
{{--                type: 'GET',--}}
{{--                url: '/download/' + `${photoid}`,--}}
{{--                success: function () {--}}
{{--                    // console.log(data);--}}
{{--                },--}}
{{--                error: function (xhr, status, error) {--}}
{{--                    // console.error('Error downloading file:', xhr.responseText);--}}
{{--                    alert('Error downloading file:'+xhr.responseText);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
@endsection
