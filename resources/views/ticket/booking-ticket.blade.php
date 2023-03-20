@extends('layouts.main')
@section('content')
@section('title', 'Ticket Booking')
<div class="container">
    <div class="d-flex justify-content-center">
        <form action="/booking" method="POST">
            @csrf
            <a href="" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">Booking Ticket</h3>
            <div class="form-floating mb-3">
                <input type="text" name="ticketID" class="form-control border border-dark" id="floatingInput" value="{{$ticketID}}"
                    placeholder="Ticket ID" readonly>
                <label for="floatingInput">Ticket ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="flightID" class="form-control border border-dark" id="floatingInput" value="{{$flight->flightID}}"
                    placeholder="Flight ID" readonly>
                <label for="floatingInput">Flight ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="departure" class="form-control border border-dark" id="floatingInput" value="{{$flight->departure}}"
                    placeholder="Departure" readonly>
                <label for="floatingInput">Departure</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="destination" class="form-control border border-dark" id="floatingInput" value="{{$flight->destination}}"
                    placeholder="Destination" readonly>
                <label for="floatingInput">Destination</label>
            </div>
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="departDay" class="form-control border border-dark" value="{{$flight->departDay}}"
                            id="floatingInput" placeholder="Departure Day" readonly>
                        <label for="floatingInput">Departure Day</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="returnDay" class="form-control border border-dark" value="{{$flight->returnDay}}"
                            id="floatingInput" placeholder="Return Day" readonly>
                        <label for="floatingInput">Return Day</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" name="flightTime" class="form-control border border-dark" value="{{$flight->flightTime}}"
                            id="floatingInput" placeholder="Flight Time" readonly>
                        <label for="floatingInput">Flight Time (Hours)</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="ticketPrice" class="form-control border border-dark" id="floatingInput" value="$ {{$flight->priceTicket}}"
                    placeholder="Ticket Price" readonly>
                <label for="floatingInput"> Ticket Price</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="a" class="form-control border border-dark" id="floatingInput" value="{{$flight->priceTicket}}"
                    placeholder="Ticket Price" readonly>
                <label for="floatingInput">Ticket Price</label>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Booking Flight</button>
        </form>

        {{-- <form action="/booking" method="post">
            <button type="submit" class="btn btn-primary d-block mx-auto">Booking Flight</button>
        </form> --}}
    </div>
</div>

@endsection
