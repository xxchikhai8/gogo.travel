@extends('layouts.enterprise')
@section('content')
@section('title', 'Plane List')
<div class="mb-3">
    <div class="mb-3 d-flex justify-content-center">
        <a href="/planes/new" class="btn btn-primary"><i class="fa-solid fa-plus"></i> New Plane</a>
    </div>
    <table id="datatable">
        <thead>
            <tr>
                <th>Plane No</th>
                <th>Type of Airplane</th>
                <th>Config</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planes as $plane)
                <tr>
                    <td>{{ $plane->planeID }}</td>
                    <td>{{ $plane->planeType }}</td>
                    <td class="text-center">
                        <a href="/planes/{{ $plane->planeID }}/update"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $planes->links() }}
    </div>
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
<script>
    $(function() {
        $('#datatable').DataTable({
            dom: "<'row my-2'<'col-sm-12 col-md-6 mb-2'><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>",
            "responsive": true,
            "lengthChange": true,
            "ordering": false,
        });
    });
</script>
@endsection
