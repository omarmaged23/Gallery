@extends('admin.layouts.layout')
@section('title')
    Admins
@endsection
@section('admins_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Admins</h1>
    <div class="container text-center bg-light">
        <a class="btn btn-dark w-100" href="{{route('admin.admins.create')}}"> Add Admin</a>
        <table class="table table-hover text-center">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>
                            <a class="btn btn-secondary" href="{{route('admin.admins.edit',$admin->id)}}">Edit</a>
                            <form action="{{route('admin.admins.delete')}}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{$admin->id}}">
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
