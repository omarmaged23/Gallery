@extends('layouts.app1')

@section('title') Contact @endsection

@section('content')
<div>
    <div class="position-relative" style="width: 100%; height: 25vh; overflow: hidden;">
        <h1 class="special-heading">Contact</h1>
        <p>How can we help?</p>
        {{-- <img src="{{ url('/images/myimage1.jpg') }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;"> --}}
    </div>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
    </div>
    <div class=" py-3 d-grid gap-4 " style="margin:5% 20% 5% ; grid-template-columns: 1fr 1fr;">
        <div class="pe-4 border-end">
            <form method="post" action="{{route('contact.mail')}}">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Name" class="form-control input" id="name" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <input type="text" name="email" placeholder="Email" class="form-control input" id="email">
                </div>
                <div class="mb-3">
                    <input type="text" name="subject" placeholder="Subject" class="form-control input" id="subject">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" style="resize:none">Message</textarea>
                </div>
                <button type="submit" class="btn" style="width: 100%; background-color:#22219b; color:white">Submit</button>
            </form>
        </div>
        <div >
            <h2>We are more than happy to assist you with any inquiries!</h2>
            {{-- <p>We are more than happy to assist you with any inquiries.</p> --}}
            <p>Quisque eleifend mi et nisi eleifend pretium. Duis porttitor accumsan arcu id rhoncus. Praesent fermentum venenatis ipsum, eget vestibulum purus.</p>
            <p>Nulla ut scelerisque elit, in fermentum ante. Aliquam congue mattis erat, eget iaculis enim posuere nec. Quisque risus turpis, tempus in iaculis</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint non cum, molestiae consequuntur vero commodi, est, dicta iste tempora exercitationem vel hic recusandae in porro labore adipisci laboriosam aliquam. Placeat?</p>
            <ul class="tm-contacts list-unstyled">
                <li>
                    <a href="#" class="tm-text-gray glow-link" style="color: inherit; text-decoration: none;">
                        <i class="fas fa-envelope"></i>
                        Email: info@company.com
                    </a>
                </li>
                <li>
                    <a href="#" class="tm-text-gray glow-link" style="color: inherit; text-decoration: none;">
                        <i class="fas fa-phone"></i>
                        Tel: 010-020-0340
                    </a>
                </li>
                <li>
                    <a href="#" class="tm-text-gray glow-link" style="color: inherit; text-decoration: none;">
                        <i class="fas fa-globe"></i>
                        URL: www.company.com
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
