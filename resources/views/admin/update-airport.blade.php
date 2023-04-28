@extends('layouts.admin')
@section('content')
@section('title', 'Update Airport')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/airport/update/save/{{$airport->airportCode}}" method="POST">
            @csrf
            <a href="/airport" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">Update Airport</h3>
            <input type="hidden" name="current_page" value="{{Request::getRequestUri()}}">
            <div class="form-floating mb-3">
                <input type="text" name="airportCode" class="form-control border border-dark" id="floatingInput"
                    value="{{$airport->airportCode}}" placeholder="Airport ID">
                <label for="floatingInput">Airport ID</label>
                <span class="text-danger">{{ $errors->first("airportCode")}}</span>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="airportName" class="form-control border border-dark" id="floatingInput"
                    value="{{$airport->airportName}}" placeholder="Airport Name">
                <label for="floatingInput">Airport Name</label>
                <span class="text-danger">{{ $errors->first("airportName")}}</span>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="location" class="form-control border border-dark" id="floatingInput"
                    value="{{$airport->location}}" placeholder="Airport Location">
                <label for="floatingInput">Airport Location</label>
                <span class="text-danger">{{ $errors->first("location")}}</span>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto show_confirm">Save Airport</button>
        </form>
    </div>
</div>
@if (session('notify') == 'editFail')
    <script>
        Swal.fire({
            title: 'Update Airport Information Fail!',
            text: 'The Airport Information that you enter to update was exist!',
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
