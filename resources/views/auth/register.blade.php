@extends('layouts.app1')

@section('title') Account Login @endsection

@section('content')
<div class="container vh-100 d-flex justify-content-center align-items-stretch p-0 mx-auto  my-5" style="background-color: #f2f2f2;">
    <div class="row w-100 m-0 h-100">
        <!-- Left Side with Image -->
        <div class="col-lg-6 d-none d-lg-flex p-0">
            <img src="{{ url('/images/ss.png') }}" alt="" style="height: 100vh; width: 100%; object-fit: cover;">
        </div>

        <!-- Right Side with Login Form -->
        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center bg-light p-0">
            <div class="login-form p-4" style="max-width: 350px; width: 100%;">
                <h2 class="mb-4 text-center">Account Login</h2>

                <form action="" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="repassword" placeholder="re-write the Password" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" id="myFile" name="profilepic" accept=".jpg,.jpeg,.png">
                    </div>

                    <button type="submit" class="btn btn-success w-100 mb-3">Sign In</button>

                    {{-- <div class="text-center">
                        <a href="#" class="text-muted">Forgot User name / password?</a>
                    </div> --}}
                </form>

                <div class="text-center mt-3">
                    <span>Have an Account? </span><a href="{{ route('login') }}" class="text-success">Log-in</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
