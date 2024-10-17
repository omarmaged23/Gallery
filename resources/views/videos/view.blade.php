@extends('layouts.app1')

@section('title') Photos @endsection

@section('content')
    @php
        $j=0;
    @endphp
    <div>
        <div class="position-relative" style="width: 100%; height: 25vh; overflow: hidden;">
            <a href="">
                <video src="{{asset($banner->path)}}" style="width: 100%; height: 100%; object-fit: cover;" autoplay muted loop></video>
            </a>
        </div>
{{--        <div class="container">--}}
{{--            <form id="search" class="d-flex justify-content-center my-3">--}}
{{--                <input class="form-control me-2" type="search" placeholder="Search for videos..." aria-label="Search" style="width: 300px;">--}}
{{--                <button class="btn btn-primary" type="submit">Search</button>--}}
{{--            </form>--}}
{{--        </div>--}}
        <div class="containers mt-5">
            <h3>Want to Upload Your Photo/Video?</h3>
            <button type="button" class="btn btn-secondary" onclick="toggleUploadModal()">Upload Photo/Video</button>
        </div>
        <div id="upload-modal" class="modal" style="display: none;">
            {{-- MODAL: is the outer container that covers the entire screen and dims the background --}}
            <div class="modal-content">
                {{-- MODAL-CONTENT: is the inner container that holds the form inside and its centerd --}}
                <span class="close" onclick="toggleUploadModal()">&times;</span>
                {{-- CLOSE: is the span element that allows the user to close the form --}}
                @include('misc.upload')
            </div>
        </div>
        <div class="containers">
            <div  id="photo-gallery" class="row mx-0 my-5 ">
                <!-- Photo Gallery Will Be Populated Here -->
                @php
                    $i=0;
                @endphp
                @foreach($photos as $photo)
                    <div class="col-lg-3 col-md-6 col-12 p-1"> <!-- Adjust this class for your layout -->
                        <div style='border:1px solid black;'>
                            <figure class="effect-ming tm-video-item">
                                <a href="/videos/{{ $photo->id }}">
                                    <div class=" d-flex justify-content-center">
                                        <img class="img-fluid" src="{{ asset('screen_shots/'.pathinfo($photo->path, PATHINFO_FILENAME).'.png') }}" alt="" style="height:200px;">
                                    </div>
                                    <figcaption class="d-flex align-items-center justify-content-center">
                                        <h2>{{ $photo->name }}</h2>
                                    </figcaption>
                                </a>
                            </figure>
                            <div class="d-flex justify-content-evenly">
                                <span>{{ $photo->user->name }}</span>
                                <div id="{{'like-'.++$i}}" class="like-btn" data-id="{{$photo->id}}">

                                    <button class="heart-button" aria-label="Like">
                                        @php
                                            $isLiked = \App\Models\likes::where([
                                                ['media_id', $photo->id],
                                                ['user_id', auth('web')->user()->id]
                                            ])->exists();
                                        @endphp
                                        <i class="{{ $isLiked ? 'fa-solid' : 'fa-regular' }} fa-heart" style="font-size: 1.1em; color: red;"></i>
                                    </button>
                                    <span id="{{'likesCount-'.$i}}">{{$photo->likes->count()}}</span>
                                </div>
                                <span class="tm-text-gray-light">{{ $photo->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    <!-- Pagination -->
                    {{ $photos->links('pagination::bootstrap-4') }} <!-- Use Bootstrap pagination -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleUploadModal() {
            // this function checks the current display status of the modal. if its hidden, it sets it to block making it visible
            const modal = document.getElementById('upload-modal');
            modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
        }

        // Close the modal when clicking outside of the modal content
        window.onclick = function(event) {
            // listens to click anyhwhere on the screen
            // the even listener checks if the user clicks anywhere on the window
            // if the click occurs on the dark area, it hides the modal again
            const modal = document.getElementById('upload-modal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.like-btn', function () {
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
        });
    </script>
@endsection
