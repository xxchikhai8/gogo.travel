@extends('layouts.admin')
@section('content')
@section('title', 'New Airport Information')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/save-airport" method="POST">
            @csrf
            <a href="/airport" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">New Airport</h3>
            <div class="form-floating mb-3">
                <input type="text" name="airportCode" class="form-control border border-dark" id="floatingInput"
                    placeholder="Airport ID">
                <label for="floatingInput">Airport ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="airportName" class="form-control border border-dark" id="floatingInput"
                    placeholder="Airport Name">
                <label for="floatingInput">Airport Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="location" class="form-control border border-dark" id="floatingInput"
                    placeholder="Airport Location">
                <label for="floatingInput">Airport Location</label>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Save Flight</button>
        </form>
    </div>
</div>
@endsection
