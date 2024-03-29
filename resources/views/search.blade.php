@extends('layouts.main')
@section('content')
@section('title', 'Home')
<div class="row">
    <div class="col-4" id="collapse">
        <div class="shadow-lg rounded-3 border p-3">
            <form action="/search" method="post" role="search">
                @csrf
                <h4>Search Flights</h4>
                <div class="mb-2">
                    <h6>Departure:</h6>
                    <select class="js-departure form-control" name="departure">
                        <option></option>
                        @foreach ($airports as $airport)
                            <option value={{ $airport->airportCode }} @if ($airport->airportCode==$departure) selected @endif >
                                {{ $airport->location }} | {{ $airport->airportCode }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <h6>Destination:</h6>
                    <select class="js-destination form-control" name="destination">
                        <option></option>
                        @foreach ($airports as $airport)
                            <option value="{{ $airport->airportCode }}" @if ($airport->airportCode==$destination) selected @endif>
                                {{ $airport->location }} | {{ $airport->airportCode }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <h6>Departure Date</h6>
                    <div class="form-floating mb-3">
                        <input type="date" name="departDay" class="form-control border border-dark" id="floatingInput"
                            placeholder="Departure Day" value="{{$departDay}}">
                        <label for="floatingInput">Departure Day</label>
                    </div>
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
            @if ($results->isNotEmpty())
            @foreach ($results as $result)
            <div class="border border-dark p-2 rounded-2 mb-2 blur" id="ticket-border">
                <div class="card" id="border-transparent">
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-lg-2">
                            <div class="col">
                                <h6 class="fw-bold">Departure: {{ $result->departure }}</h6>
                                <h6 class="fw-bold">Destination: {{ $result->destination }}</h6>
                            </div>
                            {{-- <div class="col d-none d-lg-flex"></div> --}}
                            <div class="col text-lg-end text-start">
                                <?php $money = $result->priceTicket;
                                    setlocale(LC_MONETARY, 'en_US'); ?>
                                <h6>Price: $
                                    <?php echo number_format($money); ?>
                                </h6>
                            </div>
                            <a href="/ticket/booking/{{ $result->flightID }}" class="stretched-link"></a>
                        </div>
                        <?php $date = new DateTimeImmutable($result->departDay); ?>
                        <h6>Department Day:
                            <?php echo date_format($date, 'd M Y'); ?> - Flight Time: {{ $result->flightTime }} hours
                            </h5>
                            <?php $date = new DateTimeImmutable($result->returnDay); ?>
                            <h6>Return Day:
                                <?php echo date_format($date, 'd M Y'); ?>
                            </h6>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="h4 text-center">No result, please try again !</div>
            @endif
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
            <form action="/search" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <h6>Departure:</h6>
                        <select class="js-departure-modal form-control" name="departure">
                            <option></option>
                            @foreach ($airports as $airport)
                                <option value={{ $airport->airportCode }} @if ($airport->airportCode==$departure) selected @endif>
                                    {{ $airport->location }} | {{ $airport->airportCode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <h6>Destination:</h6>
                        <select class="js-destination-modal form-control" name="destination">
                            <option></option>
                            @foreach ($airports as $airport)
                                <option value="{{ $airport->airportCode }}" @if ($airport->airportCode==$destination) selected @endif>
                                    {{ $airport->location }} | {{ $airport->airportCode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <h6>Departure Date</h6>
                        <div class="form-floating mb-3">
                            <input type="date" name="departDay" class="form-control border border-dark" id="floatingInput"
                                placeholder="Departure Day" value="{{$departDay}}">
                            <label for="floatingInput">Departure Day</label>
                        </div>
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
@if (session('notify') == '2')
<script>
    Swal.fire({
            title: 'Sign Out Successful',
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
            title: 'Sign Up Successful',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
</script>
@endif
@endsection
