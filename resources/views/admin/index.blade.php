@extends('layouts.admin')
@section('content')
@section('title', 'Welcome Back Admin')
@if (session('notify')=='admin')
    <script>
        Swal.fire({
            title: 'Sign In Successfull!',
            text: 'Welcome Back Admin.'
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        })
    </script>
@endif
@endsection
