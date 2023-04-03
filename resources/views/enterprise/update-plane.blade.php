@extends('layouts.enterprise')
@section('content')
@section('title', 'Ticket List')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/planes/{{$plane->id}}/update" method="POST">
            @csrf
            <a href="/planes" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">Update Plane</h3>
            <div class="form-floating mb-3">
                <input type="text" name="planeID" class="form-control border border-dark" id="floatingInput" value="{{$plane->planeID}}"
                    placeholder="Plane ID">
                <label for="floatingInput">Plane ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="planeType" class="form-control border border-dark" id="floatingInput" value="{{$plane->planeType}}"
                    placeholder="Plane Type">
                <label for="floatingInput">Plane Type</label>
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
