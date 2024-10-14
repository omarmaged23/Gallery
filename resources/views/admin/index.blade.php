@extends('admin.layouts.layout')
@section('title')
    Dashboard
@endsection
@section('home_status')
    active
@endsection
@section('content')
    <h1 class="display-2 mb-5 text-center">Dashboard Statistics</h1>
    <div class="container bg-light mt-5">

        <table class="table table-hover table-striped">
            <tbody>
            <tr>
                <th scope="col">Categories Count</th> {{-- M --}}
                <td>{{$categories}}</td>
            </tr>
            <tr>
                <th scope="col">Slugs Count</th> {{-- M --}}
                <td>{{$slugs}}</td>
            </tr>
            <tr>
                <th scope="col">Photos Count</th> {{-- M --}}
                <td>{{$photosCount}}</td>
            </tr>
            <tr>
                <th scope="col">Videos Count</th> {{-- M --}}
                <td>{{$videosCount}}</td>
            </tr>
            <tr>
                <th scope="col">All Media</th> {{-- MD --}}
                <td>{{$allMediaCount}}</td>
            </tr>
            <tr>
                <th scope="col">Hidden Media</th> {{-- MD --}}
                <td>{{$hiddenMedia}}</td>
            </tr>
            <tr>
                <th scope="col">Active Media</th> {{-- MD --}}
                <td>{{$activeMedia}}</td>
            </tr>
            <tr>
                <th scope="col">Users Count</th> {{-- M -> user_name --}}
                <td>{{$usersCount}}</td>
            </tr>
            <tr>
                <th scope="col">In Active Users</th> {{-- M -> user_name --}}
                <td>{{$usersInActiveCount}}</td>
            </tr>
            <tr>
                <th scope="col">Active Users</th>
                <td>{{$usersActiveCount}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
@endsection
