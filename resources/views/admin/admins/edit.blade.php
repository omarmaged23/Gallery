@extends('admin.layouts.layout')
@section('title')
    Edit Admin
@endsection
@section('admins_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Edit New Admin</h1>

    <div class="container bg-light">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('failed'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{session('failed')}}</li>
                </ul>
            </div>
        @endif
        <form action="{{route('admin.admins.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$admin->id}}">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{$admin->name}}" name="name" id="name" placeholder="Enter Admin Name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{$admin->email}}" name="email" id="email" placeholder="Enter Admin Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
            </div>
            <input class="btn btn-dark" type="submit" value="Edit Admin">
        </form>
    </div>
@endsection
@section('scripts')
@endsection
