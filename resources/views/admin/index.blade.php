@extends('layouts.admin')
@section('content')
@section('title', 'Welcome Back Admin')
<div class="mb-3">
    <table>
        <tr>
            <th>Username</th>
            <th>Role</th>
            <th>State</th>
            <th>Config</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->state}}</td>
                <td class="text-center"><a href="/reset/{{$user->username}}" ><i class="fa-solid fa-arrows-rotate fa-spin-pulse" style="color: #ff0000;"></i></a></td>
            </tr>
        @endforeach
    </table>
</div>
@if (session('notify')=='admin')
    <script>
        Swal.fire({
            title: 'Sign In Successfull!',
            text: 'Welcome Back Admin.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        })
    </script>
@endif
@if (session('notify')=='resetSuccess')
    <script>
        Swal.fire({
            title: 'Reset Password Successfull!',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false,
            allowOutsideClick: false,
        })
    </script>
@endif
@endsection
