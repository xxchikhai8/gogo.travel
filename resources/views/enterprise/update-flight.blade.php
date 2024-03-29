@extends('layouts.enterprise')
@section('content')
@section('title', 'Ticket List')
<div class="container">
    <div class="d-flex justify-content-center">
        <form action="/flight/update/{{$flight->flightID}}/save" method="POST">
            @csrf
            <a href="/flight" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <h3 class="text-center mb-3 fw-bold">Update Flight</h3>
            <input type="hidden" name="current_page" value="{{Request::getRequestUri()}}">
            <div class="form-floating mb-3">
                <input type="text" name="flightID" class="form-control border border-dark" id="floatingInput" value="{{$flight->flightID}}"
                    placeholder="Flight ID">
                <label for="floatingInput">Flight ID</label>
                <span class="text-danger">{{$errors->first("flightID")}}</span>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select border border-dark" id="floatingSelect" name='planeID'>
                    <option selected>Choose Plane ID</option>
                    @foreach ($planes as $plane)
                        <option value="{{$plane->planeID}}" @if($plane->planeID == $flight->planeID) selected @endif>{{$plane->planeID}}</option>
                    @endforeach
                  </select>
                <label for="floatingSelect">Plane ID</label>
                <span class="text-danger">{{$errors->first("planeID")}}</span>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select border border-dark" id="floatingSelect" name='departure'>
                    <option selected value="">Choose Departure</option>
                    @foreach ($airports as $airport)
                        <option value="{{ $airport->airportCode }}" @if($airport->airportCode == $flight->departure) selected @endif>{{ $airport->location }} |
                            {{ $airport->airportName }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Departure</label>
                <span class="text-danger">{{$errors->first("departure")}}</span>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select border border-dark" id="floatingSelect" name='destination'>
                    <option selected value="">Choose Destination</option>
                    @foreach ($airports as $airport)
                        <option value="{{ $airport->airportCode }}" @if($airport->airportCode == $flight->destination) selected @endif>{{ $airport->location }} |
                            {{ $airport->airportName }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Destination</label>
                <span class="text-danger">{{$errors->first("destination")}}</span>
            </div>
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="departDay" class="form-control border border-dark" value="{{$flight->departDay}}"
                            id="floatingInput" placeholder="Departure Day">
                        <label for="floatingInput">Departure Day</label>
                        <span class="text-danger">{{$errors->first("departDay")}}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="time" name="boardingTime" class="form-control border border-dark" value="{{$flight->boardingTime}}"
                            id="floatingInput" placeholder="Departure Day">
                        <label for="floatingInput">Boarding Time</label>
                        <span class="text-danger">{{$errors->first("boardingTime")}}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="returnDay" class="form-control border border-dark" value="{{$flight->returnDay}}"
                            id="floatingInput" placeholder="Return Day">
                        <label for="floatingInput">Return Day</label>
                        <span class="text-danger">{{$errors->first("returnDay")}}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" name="flightTime" class="form-control border border-dark" value="{{$flight->flightTime}}"
                            id="floatingInput" placeholder="Flight Time">
                        <label for="floatingInput">Flight Time (Hours)</label>
                        <span class="text-danger">{{$errors->first("flightTime")}}</span>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="ticketPrice" class="form-control border border-dark" id="floatingInput" value="{{$flight->priceTicket}}"
                    placeholder="Ticket Price">
                <label for="floatingInput">Ticket Price</label>
                <span class="text-danger">{{$errors->first("ticketPrice")}}</span>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name='state'>
                    <option selected>Choose Plane ID</option>
                    <option value="Excepted" @if($flight->state=='Excepted') selected @else @endif>Excepted</option>
                    <option value="Arrived On-Time" @if($flight->state=='Arrived On-Time') selected @else @endif>Arrived On-Time</option>
                    <option value="On-Time" @if($flight->state=='On-Time') selected @else @endif>On-Time</option>
                    <option value="Delay" @if($flight->state=='Delay') selected @else @endif>Delay</option>
                    <option value="Cancel" @if($flight->state=='Cancel') selected @else @endif>Cancel</option>
                    <option value="Finish" @if($flight->state=='Finish') selected @else @endif>Return Finish</option>
                  </select>
                <label for="floatingSelect">State</label>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto show_confirm" data-toggle="tooltip">Save Flight</button>
        </form>
    </div>
</div>
<script>
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: 'Are you want to Update?',
            text: 'This operation will modify the data! Are you sure you want to Update?',
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
@if (session('notify') == 'editFail')
    <script>
        Swal.fire({
            title: 'Update Flight Information Fail!',
            text: 'Flight No was exist!',
            icon: 'error',
            allowOutsideClick: false,
        })
    </script>
@endif
@endsection
