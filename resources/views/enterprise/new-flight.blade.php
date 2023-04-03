@extends('layouts.enterprise')
@section('content')
@section('title', 'New Flight')
<div class="container">
    <div class="w-75 mx-auto">
        <form action="/save-flight" method="POST">
            @csrf
            <a href="/flight" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">New Flight</h3>
            <div class="form-floating mb-3">
                <input type="text" name="flightID" class="form-control border border-dark" id="floatingInput"
                    placeholder="Flight ID">
                <label for="floatingInput">Flight ID</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select border border-dark" id="floatingSelect" name='planeID'>
                    <option selected value="">Choose Plane ID</option>
                    @foreach ($planes as $plane)
                        <option value={{ $plane->planeID }}>{{ $plane->planeID }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Plane ID</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select border border-dark" id="floatingSelect" name='departure'>
                    <option selected value="">Choose Departure</option>
                    @foreach ($airports as $airport)
                        <option value={{ $airport->airportCode }}>{{ $airport->location }} |
                            {{ $airport->airportCode }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Departure</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select border border-dark" id="floatingSelect" name='destination'>
                    <option selected value="">Choose Destination</option>
                    @foreach ($airports as $airport)
                        <option value={{ $airport->airportCode }}>{{ $airport->location }} |
                            {{ $airport->airportCode }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Destination</label>
            </div>
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="departDay" class="form-control border border-dark"
                            id="floatingInput" placeholder="Departure Day">
                        <label for="floatingInput">Departure Day</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="time" name="boardingTime" class="form-control border border-dark"
                            id="floatingInput" placeholder="Departure Day">
                        <label for="floatingInput">Boarding Time</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="returnDay" class="form-control border border-dark"
                            id="floatingInput" placeholder="Return Day">
                        <label for="floatingInput">Return Day</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" name="flightTime" class="form-control border border-dark"
                            id="floatingInput" placeholder="Flight Time">
                        <label for="floatingInput">Flight Time (Hours)</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="ticketPrice" class="form-control border border-dark" id="floatingInput"
                    placeholder="Ticket Price">
                <label for="floatingInput">Ticket Price ($)</label>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Save Flight</button>
        </form>
    </div>
</div>
@endsection
