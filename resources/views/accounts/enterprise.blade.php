@extends('layouts.enterprise')
@section('content')
@section('title', 'Account Management')
<div>
    <div class="bg-danger">
        <div class="d-flex justify-content-center">
            <img src="/assets/img/avatar.png" alt="avatar" class="avatar mt-2">
        </div>
        <div class="d-flex justify-content-center mt-3">
            <h4 style="color:#fff">Hi, {{ $enterprise->airlineName }}</h4>
        </div>
    </div>
    <hr style="background-color:rgb(255, 0, 0);color:rgb(255, 0, 0);height:2px;border-width:0;with:100%">
    <div class="container">
        <div class="mb-3 ms-5">
            <h4 class="ps-5">Enterprise Information</h4>
        </div>
        <div class="w-75 mx-auto">
            <div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border border-dark" id="floatingInput"
                        value="{{$enterprise->username}}" placeholder="Username" readonly>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border border-dark" id="floatingInput"
                        value="{{$enterprise->airlineName}}" placeholder="Airline Name" readonly>
                    <label for="floatingInput">Airline Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border border-dark" id="floatingInput"
                        value="{{$enterprise->airlineCode}}" placeholder="Airline Code" readonly>
                    <label for="floatingInput">Airline Code</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="ticketPrice" class="form-control border border-dark" id="floatingInput"
                        value="{{$enterprise->enterpriseNum}}" placeholder="Enterprise Number" readonly>
                    <label for="floatingInput">Enterprise Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="a" class="form-control border border-dark" id="floatingInput"
                        value="{{$enterprise->Nation}}" placeholder="Nation" readonly>
                    <label for="floatingInput">Nation</label>
                </div>
                <div class=" mt-3 mb-4">
                    <a href="/password/changes" class="btn btn-primary d-block mx-auto w-25">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('notify') == 'changePass')
    <script>
        Swal.fire({
            title: 'Save Successful',
            text: 'Change Password Successful',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
    </script>
@endif
@endsection
