@extends('layouts.enterprise')
@section('content')
@section('title', 'New Plane')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/plane/new/save" method="POST">
            @csrf
            <a href="/planes" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">New Plane</h3>
            <div class="form-floating mb-3">
                <input type="text" name="planeID" class="form-control border border-dark" id="floatingInput"
                    placeholder="Plane ID">
                <label for="floatingInput">Plane ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="planeType" class="form-control border border-dark" id="floatingInput"
                    placeholder="Plane Type">
                <label for="floatingInput">Plane Type</label>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Save Flight</button>
        </form>
    </div>
</div>
@endsection
