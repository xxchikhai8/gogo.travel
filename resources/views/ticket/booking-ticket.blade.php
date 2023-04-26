@extends('layouts.main')
@section('content')
@section('title', 'Ticket Booking')
<div class="container mb-3">
    <a onclick="history.back();" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
</div>
<div class="w-100 mx-auto">
    <form action="/booking" method="POST">
        @csrf
        <div class="container rounded-4" style="box-shadow: 10px 10px 5px rgba(0,0,0,.15);">
            <div class="row p-2 bg-warning text-dark" style="border-radius:1rem 1rem 0px 0px;">
                <div class="col-4 fw-bold">
                    BOARDING PASS
                </div>
            </div>
            <div class="row p-2 border-start border-end">
                <div class="col">
                    <div class="row">
                        <div class="col fw-bold">
                            Ticket No:
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="ticketID" value="{{ $ticketID }}" readonly class="form-control-plaintext">
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
                            <input type="text" name="flightID" value="{{ $flight->flightID }}" readonly class="form-control-plaintext">
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
                        <div class="col mt-1">
                            {{ $carrier }}
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
                        <div class="col mt-1">
                            <?php
                            $date = new DateTimeImmutable($flight->departDay);
                            echo date_format($date, 'd M Y');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2 border-start border-end">
                <div class="col-6">
                    <div class="row">
                        <div class="col fw-bold">
                            From:
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $flight->departure }} ({{ $departCode }})
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $departlocation }}
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
                            <input type="text" name="luggage" value="{{ $luggage }}" readonly class="form-control-plaintext">
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
                            <input type="text" name="gate" value="{{ $gate }}" readonly class="form-control-plaintext">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2 border-start border-end">
                <div class="col-6">
                    <div class="row">
                        <div class="col fw-bold">
                            To:
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $flight->destination }} ({{ $destiCode }})
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $destilocation }}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col fw-bold">
                            Boarding Time:
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <?php
                            $time = new DateTimeImmutable($flight->boardingTime);
                            echo date_format($time, 'h:i A');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col fw-bold">
                            Price ($):
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="ticketPrice" value="{{$flight->priceTicket}}" readonly class="form-control-plaintext">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2 bg-warning text-dark" style="border-radius:0px 0px 1rem 1rem;"></div>
        </div>
        <div class="w-75 mx-auto mt-5">
            <h3 class="text-center mb-3 fw-bold">Passenger Information</h3>
            <div class="form-floating mb-3">
                <input type="text" name="passengerName" class="form-control border border-dark" id="floatingInput"
                    placeholder="Passenger Name">
                <label for="floatingInput">Passenger Name</label>
                <span class="text-danger">{{$errors->first("passengerName")}}</span>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select border border-dark" id="floatingSelect" name='seatClass'>
                    <option selected value="Economy"> Economy</option>
                    <option value="Premium Economy"> Premium Economy</option>
                    <option value="Bussiness"> Bussiness</option>
                </select>
                <label for="floatingInput">Seat Class</label>
                <span class="text-danger">{{$errors->first("seatClass")}}</span>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="reDay" name="returnOrNot" value="Yes">
                <label class="form-check-label" for="reDay">Return Date</label>
            </div>
            <div class="form-floating mb-3" id="return" style="display: none">
                <input type="date" name="returnDay" class="form-control border border-dark" id="floatingInput" value="{{$flight->returnDay}}"
                    placeholder="Return Date" readonly>
                <label for="floatingInput">Return Date</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary d-block mx-auto check_signin" data-toggle="tooltip">Booking
            Flight</button>
    </form>
</div>
@if (Auth::check() == true)
    <script>
        $('.check_signin').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure want to booking?',
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
@else
    <script type="text/javascript">
        $('.check_signin').click(function(event) {
            event.preventDefault();
            $('#sign-in-modal').modal('show');
        });
    </script>
@endif
@if (session('notify') == 'bookSuccess')
    <script>
        Swal.fire({
            title: 'Booking Ticket Successful!',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        })
    </script>
@endif
@if (session('notify') == '0')
    <script>
        Swal.fire({
            title: 'Sign In Successful',
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
            text: ' Username or Password is not correct!',
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
@if (session('notify') == 'signupSuccess')
    <script>
        Swal.fire({
            title: 'Sign Up Successful',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
    </script>
@endif
@endsection
