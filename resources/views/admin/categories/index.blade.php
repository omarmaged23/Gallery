@extends('admin.layouts.layout')
@section('title')
    Categories
@endsection
@section('categories_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Categories</h1>
    <div class="container text-center bg-light">
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
        @if(session()->has('failed'))
            <div class="alert alert-danger">
                {{session('failed')}}
            </div>
        @endif
        <a class="btn btn-dark w-100" href="{{route('admin.categories.create')}}"> Create Category</a>
        <table class="table table-hover text-center">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$category->title}}</td>
                    <td>
                        <form action="{{route('admin.categories.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
@endsection
