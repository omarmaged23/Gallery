@extends('admin.layouts.layout')
@section('title')
    Slugs
@endsection
@section('slugs_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Slugs</h1>
    <div class="container text-center bg-light">
        <a class="btn btn-dark w-100" href="{{route('admin.slugs.create')}}"> Create Slug</a>
        <table class="table table-hover text-center">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Slug Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($slugs as $slug)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$slug->title}}</td>
                    <td>
                        <form action="{{route('admin.slugs.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$slug->id}}">
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
