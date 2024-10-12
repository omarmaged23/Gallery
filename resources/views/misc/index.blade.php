@extends('layouts.app1')

@section('title', 'Egyptian Photographers')

@section('content')

<main class="container-fluid" id="main-content">
    <!-- Section 1: Heading and Image -->
    <div class="row mt-4 fade-in">
        <div class="col-md-4">
            <h1 class="display-4" style="font-weight: bold;">Checkout How Beautiful Egypt Actually is!</h1>
        </div>
        <div class="col-md-8">
            <figure>
                <img class="img-fluid" src="{{ url('/images/pexels1.jpg') }}" alt="Show of Force" class="fade-in-image">
                <figcaption>Show of Force</figcaption>
            </figure>
        </div>
    </div>

    <!-- Section 2: Image and Text -->
    <div class="row mt-4 fade-in">
        <div class="col-md-8">
            <figure>
                <img class="img-fluid" src="{{ url('/images/pexels1.jpg') }}" alt="Old Growth Forests" class="fade-in-image">
                <figcaption>Old Growth Forests</figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <p>
                As a photographer, I work to tell these stories truthfully, with curiosity and respect. I covered North Africa and the Middle East for nearly a decade, photographing culture, politics, and revolution.
                In 2020, I returned to Boston to photograph this dynamic period in the United States.
            </p>
            <p>
                My time is divided between personal projects, editorial photography, and commercial photography. Most of my work is in New England & New York, but I have also been commissioned for projects worldwide.
            </p>
        </div>
    </div>

    <!-- Section 3: Smaller Images in Grid -->
    <div class="row mt-4 fade-in">
        <div class="col-md-4">
            <figure>
                <img class="img-fluid" src="{{ url('/images/pexels3.jpg') }}" alt="Modern Miracles" class="fade-in-image">
                <figcaption>Modern Miracles</figcaption>
            </figure>
        </div>
        <div class="col-md-8">
            <figure>
                <img class="img-fluid" src="{{ url('/images/pexels4.jpg') }}" alt="Portraits" class="fade-in-image">
                <figcaption>Larry Summers</figcaption>
            </figure>
        </div>
    </div>
    
    <!-- Section 4: Additional Images -->
    <div class="row mt-4 fade-in">
        <div class="col-md-8">
            <figure>
                <img class="img-fluid" src="{{ url('/images/pexels5.jpg') }}" alt="More Photography" class="fade-in-image">
                <figcaption>More Photography Work</figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <p>
                I employ a diverse set of skills in my photography, such as drone photography, video production, portraiture, infrared photography, and attaching cameras to pigeons. However, the most essential skills remain the journalistic fundamentals of getting close, listening attentively, and bearing witness.
            </p>
        </div>
    </div>

    <!-- Section 5: Smaller Images in Grid -->
    {{-- <div class="row mt-4 fade-in">
        <div class="col-md-4">
            <figure>
                <img class="img-fluid" src="{{ url('/images/pexels6.jpg') }}" alt="Modern Miracles" class="fade-in-image">
                <figcaption>Modern Miracles</figcaption>
            </figure>
        </div>
        <div class="col-md-8">
            <figure>
                <img class="img-fluid" src="{{ url('/images/pexels7.jpg') }}" alt="Portraits" class="fade-in-image">
                <figcaption>Larry Summers</figcaption>
            </figure>
        </div>
    </div> --}}
</main>

{{-- <style>
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-in-image {
        opacity: 0;
        transform: scale(1.05);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .fade-in-image.visible {
        opacity: 1;
        transform: scale(1);
    }
</style> --}}

<script>
    //DOMContentLoaded ensures the script runs after the entire page is loaded
    document.addEventListener("DOMContentLoaded", function() {
        //We grabbed every element with these classes
        const fadeElements = document.querySelectorAll('.fade-in');
        const fadeImages = document.querySelectorAll('.fade-in-image');

        const observerOptions = {
            root: null,//root: null means that the default viewport of the browser window will be used to determine if the observed elements are intersecting.
            threshold: 0.1 // Trigger when 10% of the element is visible
        };

        const observer = new IntersectionObserver((entries) => {
            //this observer observes each element and adds the visible class when they intersect
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target); // Stop observing once it has appeared
                }
            });
        }, observerOptions);

        // Observe each fade-in section
        fadeElements.forEach(element => {
            observer.observe(element);
        });

        // Observe each fade-in image
        fadeImages.forEach(image => {
            observer.observe(image);
        });

        // Check if elements are already in the viewport on load
        fadeElements.forEach(element => { // Returns the size of an element and its position relative to the viewport.
            if (element.getBoundingClientRect().top < window.innerHeight && element.getBoundingClientRect().bottom >= 0) { 
                //Checks if the top of the element is above the bottom edge of the viewport. Checks if the bottom of the element is still visible above the top edge of the viewport.
                element.classList.add('visible');
            }
        });

        fadeImages.forEach(image => {
            if (image.getBoundingClientRect().top < window.innerHeight && image.getBoundingClientRect().bottom >= 0) {
                image.classList.add('visible');
            }
        });
    });
</script>

@endsection
