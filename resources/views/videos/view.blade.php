@extends('layouts.app1')

@section('title') Videos @endsection

@section('content')
<div>
    <div class="position-relative" style="width: 100%; height: 25vh; overflow: hidden;">
      <a href=""> 
        <video style="width: 100%; height: 100%; object-fit: cover;" autoplay muted loop>
          <source src="{{ url('/images/movie(1).mp4') }}" type="video/mp4">
          <source src="movie.ogg" type="video/ogg">
          Your browser does not support the video tag.
        </video> 
      </a> 
    </div>
    <div class="container">
      <form id="search" class="d-flex justify-content-center my-3">
          <input class="form-control me-2" type="search" placeholder="Search for videos..." aria-label="Search" style="width: 300px;">
          <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>  
    <div class="containers">
      <h3>Want to Upload Your Photo/Video?</h3>
      <button type="button" class="btn btn-secondary" onclick="toggleUploadModal()">Upload Photo/Video</button>
    </div>
    <div id="upload-modal" class="modal" style="display: none;">
      <div class="modal-content">
          <span class="close" onclick="toggleUploadModal()">&times;</span>
          @include('misc.upload')
      </div>
  </div>

    <div class="containers">
      <div id="video-gallery" class="row mx-0 my-5">
        <!-- Video Gallery Will Be Populated Here -->
      </div>

      <div class="d-flex justify-content-center">
        <ul class="pagination pagination-lg">
          <li class="page-item" id="prev-page"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item active" id="page-1"><a class="page-link" href="#">1</a></li>
          <li class="page-item" id="page-2"><a class="page-link" href="#">2</a></li>
          <li class="page-item" id="page-3"><a class="page-link" href="#">3</a></li>
          <li class="page-item" id="next-page"><a class="page-link" href="#">Next</a></li>
        </ul>
      </div>
    </div>
</div>

<script>
  let currentPage = 1;
  const videosPerPage = 12;
  const totalVideos = 30; // Adjust this based on your data
  const totalPages = Math.ceil(totalVideos / videosPerPage);

  const videos = Array.from({ length: totalVideos }, (_, i) => `Video ${i + 1}`);

  function loadVideos(page) {
      const start = (page - 1) * videosPerPage;
      const end = start + videosPerPage;
      const gallery = document.getElementById('video-gallery');

      // Clear existing videos
      gallery.innerHTML = '';

      // Load new videos
      videos.slice(start, end).forEach(video => {
          const videoDiv = document.createElement('div');
          videoDiv.className = 'col-lg-3 col-md-6 col-12 p-1'; // 4 columns on large screens, 2 columns on medium screens, 1 column on small screens
          videoDiv.innerHTML = `<div style='border:1px solid black;'>
                                  <figure class="effect-ming tm-video-item">
                                    <a href="{{ route('videos.show', 1) }}">
                                      <video style="width: 100%; height: 100%; object-fit: cover;" muted>
                                        <source src="/images/movie(1).mp4" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                      </video>
                                      <figcaption class="d-flex align-items-center justify-content-center">
                                        <h2>${video}</h2>
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
                                </div>`;
          gallery.appendChild(videoDiv);
      });

      updatePagination();
  }

  function updatePagination() {
      const prevPage = document.getElementById('prev-page');
      const nextPage = document.getElementById('next-page');

      prevPage.classList.toggle('disabled', currentPage === 1);
      nextPage.classList.toggle('disabled', currentPage === totalPages);

      // Update active page
      for (let i = 1; i <= totalPages; i++) {
          const pageItem = document.getElementById(`page-${i}`);
          if (pageItem) {
              pageItem.classList.toggle('active', currentPage === i);
          }
      }
  }

  // Event listeners for pagination
  document.getElementById('prev-page').addEventListener('click', () => {
      if (currentPage > 1) {
          currentPage--;
          loadVideos(currentPage);
      }
  });

  document.getElementById('next-page').addEventListener('click', () => {
      if (currentPage < totalPages) {
          currentPage++;
          loadVideos(currentPage);
      }
  });

  // Event listeners for individual page links
  for (let i = 1; i <= totalPages; i++) {
      const pageLink = document.getElementById(`page-${i}`);
      if (pageLink) {
          pageLink.addEventListener('click', (e) => {
              e.preventDefault();
              currentPage = i;
              loadVideos(currentPage);
          });
      }
  }

  // Initial load
  loadVideos(currentPage);
  function toggleUploadModal() {
    const modal = document.getElementById('upload-modal');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
}

// Close the modal when clicking outside of the modal content
window.onclick = function(event) {
    const modal = document.getElementById('upload-modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}
</script>

@endsection
