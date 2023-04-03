@extends('layouts.enterprise')
@section('content')
@section('title', 'Plane List')
<div class="mb-3">
    <div class="mb-3 d-flex justify-content-center">
        <a href="/new-plane" class="btn btn-primary"><i class="fa-solid fa-plus"></i> New Plane</a>
    </div>
    <table>
        <tr>
            <th>Plane ID</th>
            <th>Type of Airplane</th>
            <th>Config</th>
        </tr>
        @foreach ($planes as $plane)
            <tr>
                <td>{{$plane->planeID}}</td>
                <td>{{$plane->planeType}}</td>
                <td class="text-center">
                    <a href="/update-plane/{{$plane->planeID}}" ><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@if (session('notify') == 'updateSuccess')
    <script>
        Swal.fire({
            title: 'Update Plane Information Successful!',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        })
    </script>
@endif
@endsection

