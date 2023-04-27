@extends('layouts.main')
@section('content')
@section('title', 'Ticket Detail')
<div class="container">
    <div class="mt-1">
        <a href="/ticket/history" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
    </div>
    <h2 class="mb-3 text-center fw-bold">Ticket Detail</h2>
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
                                {{$carrier}}
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
                                {{$flight->flightID}}
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
                                {{$flight->departure}} ({{$departCode}})
                            </div>
                        </div>
                        <div class="row">
                            <div class="col fst-italic">
                                {{$departLocation}}
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
                                {{$flight->destination}} ({{$destiCode}})
                            </div>
                        </div>
                        <div class="row">
                            <div class="col fst-italic">
                                {{$destiLocation}}
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
                                <?php $time = new DateTimeImmutable($flight->boardingTime);
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
                                <?php $date = new DateTimeImmutable($flight->departDay);
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
                                $ {{$ticket->ticketPrice*1.8}}
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col fw-bold">
                                Flight Status:
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{ $ticket->state}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-2 bg-warning text-dark" style="border-radius:0px 0px 1rem 1rem;"></div>
            </div>
        </div>
    </div>
    @if ($ticket->ticketType == 'Two-Way Ticket')
        <div class="card mb-4" id="border-transparent">
            <div class="card-body">
                <div class="mb-2">
                    <h5>Return Ticket </h5>
                </div>
                <div class="container rounded-4" style="box-shadow: 10px 10px 5px rgba(0,0,0,.15);">
                    <div class="row p-2 bg-warning text-dark" style="border-radius:1rem 1rem 0px 0px;">
                        <div class="col-6 fw-bold">
                            BOARDING PASS
                        </div>
                        <div class="col-6 fw-bold text-end">
                            Round-Trip Ticket
                        </div>
                    </div>
                    {{-- First Row --}}
                    <div class="row p-2 border-start border-end">
                        <div class="col-6">
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
                                    {{$carrier}}
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
                                    {{$flight->flightID}}
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
                                    {{$flight->destination}} ({{$destiCode}})
                                </div>
                            </div>
                            <div class="row">
                                <div class="col fst-italic">
                                    {{$destiLocation}}
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
                                    {{$flight->departure}} ({{$departCode}})
                                </div>
                            </div>
                            <div class="row">
                                <div class="col fst-italic">
                                    {{$departLocation}}
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
                                    <?php $time = new DateTimeImmutable($flight->boardingTime);
                                        echo date_format($time->modify("+12 hours"), 'h:i A');
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
                                    <?php $date = new DateTimeImmutable($flight->returnDay);
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
                                    {{$ticket->gate}}
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
                                    {{$ticket->luggage}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Fourth Row --}}
                    <div class="row p-2 border-start border-end">
                        <div class="col-6">
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
                        <div class="col-3">
                            <div class="row">
                                <div class="col fw-bold">
                                    Flight Status:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @if ($ticket->state == "Finish")
                                        Return Completed
                                    @else
                                        Excepted
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2 bg-warning text-dark" style="border-radius:0px 0px 1rem 1rem;"></div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
