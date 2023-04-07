@extends('layouts.admin')
@section('content')
@section('title', 'Update Airport')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/airport/update/save/{{$airport->airportCode}}" method="POST">
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
                    value="{{$airport->airportCode}}" placeholder="Airport ID">
                <label for="floatingInput">Airport ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="airportName" class="form-control border border-dark" id="floatingInput"
                    value="{{$airport->airportName}}" placeholder="Airport Name">
                <label for="floatingInput">Airport Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="location" class="form-control border border-dark" id="floatingInput"
                    value="{{$airport->location}}" placeholder="Airport Location">
                <label for="floatingInput">Airport Location</label>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto show_confirm">Save Flight</button>
        </form>
    </div>
</div>
@if (session('notify') == 'editFail')
    <script>
        Swal.fire({
            title: 'Update Airport Information Fail!',
            text: 'The Airport Information that you enter to update was exit!',
            icon: 'error',
            allowOutsideClick: false,
        })
    </script>
@endif
<script>
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: 'Are you want to Update?',
            text: 'This operation will modify the data! Are you sure you want to Update?',
            icon: 'question',
            showCancelButton: true,
            scrollbarPadding: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
@endsection
