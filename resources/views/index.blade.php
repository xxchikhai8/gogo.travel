@extends('layouts.main')
@section('content')
@section('title', 'Home')
<div class="row">
    <div class="col-4" id="collapse">
        <div class="shadow-lg rounded-3 border p-3">
            <form action="/seachflights" method="post">
                <h4>Search</h4>
                <h6>From</h6>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="From" aria-label="From"
                        aria-describedby="basic-addon1">
                </div>
                <h6>To</h6>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="To" aria-label="To"
                        aria-describedby="basic-addon1">
                </div>
                <h6>Departure Date</h6>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Departure" aria-label="Departure"
                        aria-describedby="basic-addon1">
                </div>
                <button type="submit" id="search-button" class="btn btn-primary d-block ms-auto">Search
                    Flights</button>
            </form>
        </div>
    </div>

    <div class="col-12 col-lg-8">
        <div class="p-3">
            <div class="input-group mb-3 border border-dark rounded-2" id="searchforms">
                <input type="text" class="form-control" placeholder="Search Flights" aria-label=""
                    aria-describedby="form-search" data-bs-toggle="modal" data-bs-target="#search-flights-form">
                <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <h4>Ticket List</h4>
            @foreach ($flights as $flight)
                <div class="border border-dark p-2 rounded-2 mb-2" id="ticket-border">
                    <div class="card" id="border-transparent">
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-lg-3">
                                <div class="col">
                                    <h6 class="fw-bold">From: {{ $flight->departure }} - To: {{ $flight->destination }}
                                    </h6>
                                </div>
                                <div class="col d-none d-lg-flex"></div>
                                <div class="col text-lg-end text-start">
                                    <?php $money = $flight->priceTicket;
                                    setlocale(LC_MONETARY, 'en_US'); ?>
                                    <h6>Price: $<?php echo number_format($money); ?></h6>
                                </div>
                                <a href="booking-ticket/{{$flight->flightID}}" class="stretched-link"></a>
                            </div>
                            <?php $date = new DateTimeImmutable($flight->departDay); ?>
                            <h6>Daparment Day: <?php echo date_format($date, 'd M Y'); ?> - Filght Time: {{ $flight->flightTime }} hours</h5>
                                <?php $date = new DateTimeImmutable($flight->returnDay); ?>
                            <h6>Return Day: <?php echo date_format($date, 'd M Y'); ?></h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="modal fade" id="search-flights-form" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="ModalLabel">Search Flights</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/seachflights" method="POST">
                <div class="modal-body">
                    <h6>From</h6>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="From" aria-label="From"
                            aria-describedby="basic-addon1">
                    </div>
                    <h6>To</h6>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="To" aria-label="To"
                            aria-describedby="basic-addon1">
                    </div>
                    <h6>Departure Date</h6>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Departure" aria-label="Departure"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary buttons" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary button">Search Flights</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if (session('notify') == '0')
    <script>
        Swal.fire({
            title: 'Sign In Successfull',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
    </script>
@endif
@if (session('notify') == 'active')
    <script>
        Swal.fire({
            title: 'Sign In Fail!',
            text: 'You Have Deleted This Account'
            icon: 'error',
            allowOutsideClick: false,
        });
    </script>
@endif
@if (session('notify') == '1')
    <script>
        Swal.fire({
            title: 'Sign In Failed!',
            icon: 'error',
            allowOutsideClick: false,
        });
    </script>
@endif
@if (session('notify') == 'exists')
    <script>
        Swal.fire({
            title: 'Sign Up Failed!',
            text: 'Username Was Exists!',
            icon: 'error',
            allowOutsideClick: false,
        });
    </script>
@endif
@if (session('notify') == 'confPass')
    <script>
        Swal.fire({
            title: 'Sign Up Failed!',
            text: 'Password and Confirm Password is not match!',
            icon: 'error',
            allowOutsideClick: false,
        });
    </script>
@endif
@if (session('notify') == '2')
    <script>
        Swal.fire({
            title: 'Sign Out Successfull',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
    </script>
@endif
@if (session('notify') == 'signupSuccess')
    <script>
        Swal.fire({
            title: 'Sign Up Successfull',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
    </script>
@endif
@endsection
