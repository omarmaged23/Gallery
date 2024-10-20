@extends('layouts.app1')

@section('title') Videos @endsection

@section('content')
<div class="container mt-4">
    <div class="row" style="padding: 5%;">
        <div class="d-flex justify-content-center align-items-center flex-column flex-lg-row" style="box-shadow: 0 4px 20px rgba(0,0,0,0.2);">
            <!-- User Info Card -->
            <div class="col-12 mb-4 m-5 px-3" >
                <div class="card d-flex align-items-center " style="border: none; text-align: center; padding: 0 15% 0; ">
                    <img style="width: 120px; height: 120px; border-radius: 50%;" src="{{ url('/images/profile.jpeg') }}" class="card-img-top" alt="Profile Image">
                    <div class="card-body">
                        <h5 class="card-title">Name</h5>
                        <p class="card-text">Description: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste similique corrupti repellendus necessitatibus maxime rerum quibusdam illo soluta quo sint dicta eveniet, quos odio voluptate minus ab in tenetur harum!</p>
                    </div>
                </div>
            {{-- </div> --}}

            <!-- Photo Gallery -->
            {{-- <div class="col-lg-8 col-sm-12" style=" contain:content;" > --}}
                <div id="photo-gallery" class="row">
                    {{-- Photos will be loaded here --}}
                </div>
                <div class="pagination d-flex justify-content-center mt-3">
                    <button id="prev-page" class="btn btn-secondary" disabled>Previous</button>
                    <span id="pagination-numbers" class="mx-2"></span>
                    <button id="next-page" class="btn btn-secondary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  let currentPage = 1;
  const photosPerPage = 12;
  const totalPhotos = 30; // Adjust this based on your data
  const totalPages = Math.ceil(totalPhotos / photosPerPage);
  const photos = Array.from({ length: totalPhotos }, (_, i) => `Image ${i + 1}`);

  function loadPhotos(page) {
      const start = (page - 1) * photosPerPage;
      const end = start + photosPerPage;
      const gallery = document.getElementById('photo-gallery');

      // Clear existing photos
      gallery.innerHTML = '';

      // Load new photos
      photos.slice(start, end).forEach(photo => {
          const img = document.createElement('div');
          img.className = 'col-lg-4 col-md-4 col-sm-6 col-12 p-1';
          img.innerHTML = `
            <div style='border:1px solid black;'>
                <figure class="effect-ming tm-video-item">
                    <a href="{{ route('userphoto.show', [1,1]) }}">
                        <img class="img-fluid" src="{{ url('/images/img.jpg') }}" alt="" style="width: 100%;">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2 class="h2">${photo}</h2>
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
          gallery.appendChild(img);
      });

      updatePagination();
  }

  function updatePagination() {
      const prevPage = document.getElementById('prev-page');
      const nextPage = document.getElementById('next-page');
      const paginationNumbers = document.getElementById('pagination-numbers');

      prevPage.classList.toggle('disabled', currentPage === 1);
      nextPage.classList.toggle('disabled', currentPage === totalPages);
      paginationNumbers.innerHTML = `Page ${currentPage} of ${totalPages}`;

      // Update active page
      for (let i = 1; i <= totalPages; i++) {
          const pageItem = document.createElement('button');
          pageItem.textContent = i;
          pageItem.className = `btn ${currentPage === i ? 'btn-primary' : 'btn-outline-secondary'} mx-1`;
          pageItem.onclick = () => {
              currentPage = i;
              loadPhotos(currentPage);
          };
          paginationNumbers.appendChild(pageItem);
      }
  }

  document.getElementById('prev-page').addEventListener('click', () => {
      if (currentPage > 1) {
          currentPage--;
          loadPhotos(currentPage);
      }
  });

  document.getElementById('next-page').addEventListener('click', () => {
      if (currentPage < totalPages) {
          currentPage++;
          loadPhotos(currentPage);
      }
  });

  // Initial load
  loadPhotos(currentPage);
  
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
@endsection
