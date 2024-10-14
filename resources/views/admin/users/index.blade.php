@extends('admin.layouts.layout')
@section('title')
    Users
@endsection
@section('users_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Users</h1>
    <div class="container text-center bg-light">
        @if (session()->has('success'))
            <div class="alert alert-success">
                        {{ session('success') }}
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
                        <select class="form-control-sm" name="status" onchange="document.getElementById('statusForm').submit();">
                             <option value="0" {{$user->active == '0' ? 'selected' : ''}}>In-Active</option>
                             <option value="1" {{$user->active == '1' ? 'selected' : ''}}>Active</option>
                        </select>
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
