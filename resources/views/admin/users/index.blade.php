@extends('admin.layouts.layout')
@section('title')
    Users
@endsection
@section('styles')
    <style>
        .refresh-btn {
            background-color: transparent;
            border: none;
            font-size: 0.8em; /* Adjust size */
            cursor: pointer;
            padding: 5px;
        }

        .refresh-btn i {
            color: black;
        }

        .refresh-btn i:hover {
            color: #007bff; /* Color on hover */
        }
    </style>
@endsection
@section('users_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Users</h1>
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
        <table class="table table-hover text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.update') }}" id="statusForm">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <select class="form-control-sm" name="status">
                                 <option value="0" {{$user->active == '0' ? 'selected' : ''}}>In-Active</option>
                                 <option value="1" {{$user->active == '1' ? 'selected' : ''}}>Active</option>
                            </select>
                            <button type="submit" class="refresh-btn">
                                <i class="fa ">refresh</i>
                            </button>
                        </form>
                    </td>
                    <td>
                            <form action="{{route('admin.users.delete')}}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
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
