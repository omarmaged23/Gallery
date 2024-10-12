<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">EGPICS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('home_status')" aria-current="page" href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('banner_status')" href="{{route('admin.banner')}}">Banner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('media_status')" href="{{route('admin.media')}}">Media Control</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('categories_status')" href="{{route('admin.categories')}}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('slugs_status')" href="{{route('admin.slugs')}}">Slugs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('contact_status')" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('users_status')" href="{{route('admin.users')}}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('admins_status')" href="{{route('admin.admins.indexAdmins')}}">Admins</a>
                </li>
            </ul>
            <div class="d-flex">
            <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{route('admin.logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button class="btn" style="color: white">Logout</button>
            </a>
            </div>
        </div>
    </div>
</nav>
