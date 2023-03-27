@extends('layouts.enterprise')
@section('content')
@section('title', 'Ticket List')
<div class="mb-3">
    <table>
        <tr>
            <th>Flight ID</th>
            <th>Plane ID</th>
            <th>Departure</th>
            <th>Destination</th>
            <th>Departure Day</th>
            <th>Flight Time</th>
            <th>Return Day</th>
            <th>Price Ticket</th>
            <th>State</th>
            <th>Config</th>
        </tr>
        @foreach ($flights as $flight)
            <tr>
                <td>{{$flight->flightID}}</td>
                <td>{{$flight->planeID}}</td>
                <td>{{$flight->departure}}</td>
                <td>{{$flight->destination}}</td>
                <?php $date = new DateTimeImmutable($flight->departDay); ?>
                <td><?php echo date_format($date,'d M Y'); ?></td>
                <td>{{$flight->flightTime}} Hours</td>
                <?php $date = new DateTimeImmutable($flight->returnDay); ?>
                <td><?php echo date_format($date,'d M Y'); ?></td>
                <?php $money = $flight->priceTicket; setlocale(LC_MONETARY, 'en_US'); ?>
                <td>$ <?php echo number_format($money); ?></td>
                <td>{{$flight->state}}</td>
                <td class="text-center"><a href="/update-flight/{{$flight->flightID}}" ><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
