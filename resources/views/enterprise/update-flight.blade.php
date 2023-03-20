@extends('layouts.enterprise')
@section('content')
@section('title', 'Ticket List')
<div class="container">
    <div></div>
    <div class="d-flex justify-content-center">
        <form action="/update-flight/{{$flight->id}}" method="POST">
            @csrf
            <a href="/flight" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">New Flight</h3>
            <div class="form-floating mb-3">
                <input type="text" name="flightID" class="form-control border border-dark" id="floatingInput" value="{{$flight->flightID}}"
                    placeholder="Flight ID">
                <label for="floatingInput">Flight ID</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name='planeID'>
                    <option selected>Choose Plane ID</option>
                    @foreach ($planes as $plane)
                        <option value={{$plane->planeID}} @if($plane->planeID == $flight->planeID) selected @endif>{{$plane->planeID}}</option>
                    @endforeach
                  </select>
                <label for="floatingSelect">Plane ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="departure" class="form-control border border-dark" id="floatingInput" value="{{$flight->departure}}"
                    placeholder="Departure">
                <label for="floatingInput">Departure</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="destination" class="form-control border border-dark" id="floatingInput" value="{{$flight->destination}}"
                    placeholder="Destination">
                <label for="floatingInput">Destination</label>
            </div>
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="departDay" class="form-control border border-dark" value="{{$flight->departDay}}"
                            id="floatingInput" placeholder="Departure Day">
                        <label for="floatingInput">Departure Day</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="returnDay" class="form-control border border-dark" value="{{$flight->returnDay}}"
                            id="floatingInput" placeholder="Return Day">
                        <label for="floatingInput">Return Day</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" name="flightTime" class="form-control border border-dark" value="{{$flight->flightTime}}"
                            id="floatingInput" placeholder="Flight Time">
                        <label for="floatingInput">Flight Time (Hours)</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="ticketPrice" class="form-control border border-dark" id="floatingInput" value="{{$flight->priceTicket}}"
                    placeholder="Ticket Price">
                <label for="floatingInput">Ticket Price</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name='state'>
                    <option selected>Choose Plane ID</option>
                    <option value="Excepted" @if($flight->state=='Excepted') selected @else @endif>Excepted</option>
                    <option value="Arrived On-Time" @if($flight->state=='Arrived On-Time') selected @else @endif>Arrived On-Time</option>
                    <option value="On-Time" @if($flight->state=='On-Time') selected @else @endif>On-Time</option>
                    <option value="Delay" @if($flight->state=='Delay') selected @else @endif>Delay</option>
                    <option value="Cancel" @if($flight->state=='Cancel') selected @else @endif>Cancel</option>
                  </select>
                <label for="floatingSelect">State</label>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Save Flight</button>
        </form>
    </div>
</div>
@endsection
