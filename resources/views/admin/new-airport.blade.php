@extends('layouts.admin')
@section('content')
@section('title', 'New Airport Information')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/airport/new/save" method="POST">
            @csrf
            <a href="/airport" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">New Airport</h3>
            @if (count($errors) > 0)
                <div class="d-flex justify-content-center">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            <div><i class="fa-solid fa-triangle-exclamation me-2"></i>{{ $err }}</div>
                        @endforeach
                    </div>
                </div>
            @endif
            <input type="hidden" name="current_page" value="{{Request::getRequestUri()}}">
            <div class="form-floating mb-3">
                <input type="text" name="airportCode" class="form-control border border-dark" id="floatingInput"
                    placeholder="Airport ID">
                <label for="floatingInput">Airport ID</label>
                <span class="text-danger">{{ $errors->first("airportCode")}}</span>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="airportName" class="form-control border border-dark" id="floatingInput"
                    placeholder="Airport Name">
                <label for="floatingInput">Airport Name</label>
                <span class="text-danger">{{ $errors->first("airportName")}}</span>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="location" class="form-control border border-dark" id="floatingInput"
                    placeholder="Airport Location">
                <label for="floatingInput">Airport Location</label>
                <span class="text-danger">{{ $errors->first("location")}}</span>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Save Flight</button>
        </form>
    </div>
</div>
@if (session('notify') == 'newFail')
    <script>
        Swal.fire({
            title: 'Add New Airport Information Successful!',
            text: 'The Airport Information That Your Enter was exit!',
            icon: 'error',
            allowOutsideClick: false,
        })
    </script>
@endif
@endsection
