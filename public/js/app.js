let currentPage = 1;
const photosPerPage = 16;
const totalPhotos = 30; // You can adjust this based on your data
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
        img.className = 'col-3 p-1'; // Adjust this class for your layout
        img.innerHTML = `<div style='border:1px solid black;'>
                            <a href="photos"><img src="/images/img.jpg" alt="${photo}" style="width: 100%;"></a>
                            <div class="d-flex justify-content-evenly">
                            <span>Ahmed</span>
                            <div>
                            <button>
                                <i class="fa-regular fa-heart py-1 mx-1" style="font-size: 1.1em; color: red;"></i><span>500</span>
                            </button>
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
        loadPhotos(currentPage);
    }
});

document.getElementById('next-page').addEventListener('click', () => {
    if (currentPage < totalPages) {
        currentPage++;
        loadPhotos(currentPage);
    }
});

// Event listeners for individual page links
for (let i = 1; i <= totalPages; i++) {
    const pageLink = document.getElementById(`page-${i}`);
    if (pageLink) {
        pageLink.addEventListener('click', (e) => {
            e.preventDefault();
            currentPage = i;
            loadPhotos(currentPage);
        });
    }
}

// Initial load
loadPhotos(currentPage);
