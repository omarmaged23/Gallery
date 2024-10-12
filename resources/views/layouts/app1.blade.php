<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  </head>
  <body class="d-flex flex-column vh-100">    
    <nav class="p-3 px-4 navbar navbar-expand-lg navbar-light bg-white ">
      <a style=" width:8%;" class="navbar-brand" href="{{route('home')}}"><img style="max-width: 100%; max-height: 100%; height: auto; border: 1px solid black;" src="{{ url('/images/LogoAI.com.png') }}" alt=""></a>
      {{-- <a class="navbar-brand" href="#">EgPics</a> --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
  
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item n">
            <a class="nav-link" href="{{route('home')}}">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item n ">
            <a class="nav-link" href="{{route('photos')}}">Photos<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item n">
            <a class="nav-link" href="{{route('videos')}}">Videos</a>
          </li>
          <li class="nav-item n">
            <a class="nav-link" href="{{route('about')}}">About</a>
          </li>
          <li class="nav-item n">
            <a class="nav-link" href="{{route('contact')}}">Contact</a>
          </li>
          <li class="nav-item n">
            <button class="nav-link">Log-Out</button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('userprofile.show',1)}}">
              <img style="display: inline-block; position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;" src="{{ url('/images/profile.jpeg') }}" alt="">
            </a>
          </li>
        </ul>
      </div>
    </nav>
      
    
    <div class="mx-2 flex-grow-1">       
      @yield('content')
    </div>

    <footer class=" d-flex flex-wrap justify-content-between align-items-center p-4 border-top" style="background-color:#22219b">
      
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="mb-3 mb-md-0 " style="color: white">© 2022 Company, Inc</span>
      </div>
  
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3 icon-large"><a href=""><i style="color: white" class="fa-brands fa-x-twitter"></i></a></li>
        <li class="ms-3 icon-large"><a href=""><i style="color: white" class="fa-brands fa-facebook"></i></a></li>
        <li class="ms-3 icon-large"><a href=""><i style="color: white" class="fa-brands fa-instagram "></i></a></li>
      </ul>
    </footer>
  </body>
</html>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
      const currentUrl = window.location.href; // Use full URL
      console.log(currentUrl);
      
      navLinks.forEach(link => {
          const href = link.getAttribute('href');
          // Check for exact match
          if (currentUrl === href) {
              link.classList.add('actives');
          }
      });
  });
</script>
