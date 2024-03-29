@extends('layouts.admin')
@section('content')
@section('title', 'Airport List')
<div class="mb-3">
    <div class="mb-3 d-flex justify-content-center">
        <a href="/airport/new" class="btn btn-primary"><i class="fa-solid fa-plus"></i> New Airport</a>
    </div>
    <table id="datatable">
        <thead>
            <tr>
                <th>Airport ID</th>
                <th>Airport Name</th>
                <th>Location</th>
                <th>Config</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($airports as $airport)
                <tr>
                    <td>{{ $airport->airportCode }}</td>
                    <td>{{ $airport->airportName }}</td>
                    <td>{{ $airport->location }}</td>
                    <td class="text-center"><a href="/airport/update/{{ $airport->airportCode }}"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $airports->links() }}
    </div>
</div>
@if (session('notify') == 'updateSuccess')
    <script>
        Swal.fire({
            title: 'Save Successful',
            text: 'Update Airport Information Successful',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
    </script>
@endif
@if (session('notify') == 'newSuccess')
    <script>
        Swal.fire({
            title: 'Save Successful',
            text: 'Add New Airport Information Successful',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
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
