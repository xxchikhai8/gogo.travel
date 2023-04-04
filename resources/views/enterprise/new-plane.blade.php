@extends('layouts.enterprise')
@section('content')
@section('title', 'New Plane')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/plane/new/save" method="POST">
            @csrf
            <a href="/planes" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">New Plane</h3>
            @if (count($errors) > 0)
                <div class="d-flex justify-content-center">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            <div><i class="fa-solid fa-triangle-exclamation me-2"></i>{{ $err }}</div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="form-floating mb-3">
                <input type="text" name="planeID" class="form-control border border-dark" id="floatingInput"
                    placeholder="Plane No">
                <label for="floatingInput">Plane No</label>
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
@if (session('notify') == 'exits')
    <script>
        Swal.fire({
            title: 'Add New Plane Information Fail!',
            text: 'Plane No was exit!',
            icon: 'error',
            allowOutsideClick: false,
        })
    </script>
@endif
@endsection
