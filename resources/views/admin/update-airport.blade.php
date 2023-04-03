@extends('layouts.admin')
@section('content')
@section('title', 'Update Airport')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/airport/update/{{$airport->airportCode}}/save" method="POST">
            @csrf
            <a href="/airport" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">New Airport</h3>
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
<script>
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: 'Are you want to Update?',
            text: 'This operation will modify the data! Are you sure you want to proceed?',
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
