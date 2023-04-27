@extends('layouts.enterprise')
@section('content')
@section('title', 'Ticket List')
<div class="mb-3">
    <table id="datatable">
        <thead>
            <tr>
                <th>Ticket No</th>
                <th>Flight No</th>
                <th>User</th>
                <th>Passenger Name</th>
                <th>Citizen No</th>
                <th>Luggage</th>
                <th>Gate</th>
                <th>Seat Class</th>
                <th>Seat</th>
                <th>Booking Day</th>
                <th>Ticket Type</th>
                <th>Price Ticket</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->ticketID }}</td>
                    <td>{{ $ticket->flightID }}</td>
                    <td>{{ $ticket->username }}</td>
                    <td>{{ $ticket->passengerName }}</td>
                    <td>{{ $ticket->citizenID }}</td>
                    <td>{{ $ticket->luggage }}</td>
                    <td>{{ $ticket->gate }}</td>
                    <td>{{ $ticket->seatClass }}</td>
                    <td>{{ $ticket->seat }}</td>
                    <?php $date = new DateTimeImmutable($ticket->bookingDay); ?>
                    <td><?php echo date_format($date, 'd-m-Y'); ?></td>
                    <td>{{ $ticket->ticketType }}</td>
                    <td>{{ $ticket->ticketPrice }}</td>
                    <td>{{ $ticket->state }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $tickets->links() }}
    </div>
</div>
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
