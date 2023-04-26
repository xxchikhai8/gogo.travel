@extends('layouts.enterprise')
@section('content')
@section('title', 'Ticket List')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/planes/{{$plane->planeID}}/update" method="POST">
            @csrf
            <a href="/planes" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">Update Plane</h3>
            <input type="hidden" name="current_page" value="{{Request::getRequestUri()}}">
            <div class="form-floating mb-3">
                <input type="text" name="planeID" class="form-control border border-dark" id="floatingInput" value="{{$plane->planeID}}"
                    placeholder="Plane No">
                <label for="floatingInput">Plane No</label>
                <span class="text-danger">{{ $errors->first("planeID")}}</span>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="planeType" class="form-control border border-dark" id="floatingInput" value="{{$plane->planeType}}"
                    placeholder="Plane Type">
                <label for="floatingInput">Plane Type</label>
                <span class="text-danger">{{ $errors->first("planeType")}}</span>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto show_confirm" data-toggle="tooltip">Save Flight</button>
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
@if (session('notify') == 'editFail')
    <script>
        Swal.fire({
            title: 'Update Plane Information Fail!',
            text: 'Plane No was exit!',
            icon: 'error',
            allowOutsideClick: false,
        })
    </script>
@endif
@endsection
