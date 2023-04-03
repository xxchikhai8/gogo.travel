@extends('layouts.main')
@section('content')
@section('title', 'Ticket History')
<div class="container">
    <h3 class="mb-4">Ticket List History</h3>
    @foreach ($ticketLst as $ticket)
        <div class="card mb-4" id="border-transparent">
            <div class="card-body">
                <div class="mb-2">
                    <?php $datebooking = new DateTimeImmutable($ticket->bookingDay); ?>
                    <h5>Booking Date: <?php echo date_format($datebooking, 'd/m/Y h:i A') ?></h5>
                </div>
                <div class="container rounded-4" style="box-shadow: 10px 10px 5px rgba(0,0,0,.15);">
                    <div class="row p-2 bg-warning text-dark" style="border-radius:1rem 1rem 0px 0px;">
                        <div class="col-6 fw-bold">
                            BOARDING PASS
                        </div>
                        <div class="col-6 fw-bold text-end">
                            {{$ticket->ticketType}}
                        </div>
                    </div>
                    {{-- First Row --}}
                    <div class="row p-2 border-start border-end">
                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Ticket No:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$ticket->ticketID}}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Name of passenger:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$ticket->passengerName}}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Carrier:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$ticket->airlineName}}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Flight No:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$ticket->flightID}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Second Row --}}
                    <div class="row p-2 border-start border-end">
                        <div class="col-6">
                            <div class="row">
                                <div class="col fw-bold">
                                    From:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col fst-italic">
                                    @foreach ($airport as $loca)
                                        @if ($loca->airportName == $ticket->departure)
                                        {{$ticket->departure}} ({{$loca->airportCode}})
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col fst-italic">
                                    @foreach ($airport as $loca)
                                        @if ($loca->airportName == $ticket->departure)
                                            {{$loca->location}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col fw-bold">
                                    To:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col fst-italic">
                                    @foreach ($airport as $loca)
                                        @if ($loca->airportName == $ticket->destination)
                                            {{$ticket->destination}} ({{$loca->airportCode}})
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col fst-italic">
                                    @foreach ($airport as $loca)
                                        @if ($loca->airportName == $ticket->destination)
                                            {{$loca->location}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- Third Row --}}
                    </div>
                    <div class="row p-2 border-start border-end">
                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Boarding time:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php $time = new DateTimeImmutable($ticket->boardingTime);
                                        echo date_format($time, 'h:i A');
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Date:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php $date = new DateTimeImmutable($ticket->departDay);
                                        echo date_format($date, 'd M Y');
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Luggage:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$ticket->luggage}}
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Gate:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$ticket->gate}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Fourth Row --}}
                    <div class="row p-2 border-start border-end">
                        <div class="col-3">
                            <div class="row">
                                <div class="col fw-bold">
                                    Class:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$ticket->seatClass}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col fw-bold">
                                    Seat:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$ticket->seat}}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col fw-bold">
                                    Ticket Price:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @if ($ticket->ticketType == 'Two-Way Ticket')
                                        $ {{$ticket->ticketPrice*1.8}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2 bg-warning text-dark" style="border-radius:0px 0px 1rem 1rem;"></div>
                    <a href="/ticket/detail/{{$ticket->ticketID}}" class="stretched-link" title="Click To View More Detail of Ticket"></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
