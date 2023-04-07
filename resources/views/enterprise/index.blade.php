@extends('layouts.enterprise')
@section('content')
@section('title', 'Enterprise Home')
<div class="mb-3">
    <div class="mb-3 d-flex justify-content-center">
        <a href="/flight/new" class="btn btn-primary"><i class="fa-solid fa-plus"></i> New Flight</a>
    </div>
    <table id="datatable">
        <thead>
            <tr>
                <th>Flight No</th>
                <th>Plane No</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Departure Day</th>
                <th>Boarding Time</th>
                <th>Flight Time</th>
                <th>Return Day</th>
                <th>Price Ticket</th>
                <th>State</th>
                <th>Config</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flights as $flight)
                <tr>
                    <td>{{ $flight->flightID }}</td>
                    <td>{{ $flight->planeID }}</td>
                    <td>{{ $flight->departure }}</td>
                    <td>{{ $flight->destination }}</td>
                    <?php $date = new DateTimeImmutable($flight->departDay); ?>
                    <td><?php echo date_format($date, 'd M Y'); ?></td>
                    <?php $time = new DateTimeImmutable($flight->boardingTime); ?>
                    <td><?php echo date_format($time, 'h:i A'); ?></td>
                    <td>{{ $flight->flightTime }} Hours</td>
                    <?php $date = new DateTimeImmutable($flight->returnDay); ?>
                    <td><?php echo date_format($date, 'd M Y'); ?></td>
                    <?php $money = $flight->priceTicket;
                    setlocale(LC_MONETARY, 'en_US'); ?>
                    <td>$ <?php echo number_format($money); ?></td>
                    <td>{{ $flight->state }}</td>
                    <td class="text-center"><a href="/flight/update/{{ $flight->flightID }}"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $flights->links() }}
    </div>
</div>
@if (session('notify') == 'editSuccess')
    <script>
        Swal.fire({
            title: 'Change Flight Information Successful!',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        })
    </script>
@endif
@if (session('notify') == 'newSuccess')
    <script>
        Swal.fire({
            title: 'Add New Flight Information Successful!',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        })
    </script>
@endif
@if (session('notify') == 'enterprise')
    <script>
        Swal.fire({
            title: 'Sign In Successful!',
            text: 'Welcome Back.',
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
        });
    });
</script>
@endsection
