@extends('admin.layouts.layout')
@section('title')
    Add Category
@endsection
@section('categories_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Add New Category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container bg-light">
        <form action="{{route('admin.categories.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Category Title">
            </div>
            <input class="btn btn-dark" type="submit" value="Add Category">
        </form>
    </div>
@endsection
@section('scripts')
@endsection
