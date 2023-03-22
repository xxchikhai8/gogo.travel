@extends('layouts.main')
@section('content')
@section('title', 'Account Management')
<div>
    <div class="bg-danger">
        <div class="d-flex justify-content-center">
            <img src="/assets/img/avatar.png" alt="avatar" class="avatar mt-2">
        </div>
        <div class="d-flex justify-content-center mt-3">
            <h4 style="color:#fff">Hi, {{ Auth::user()->username }}</h4>
        </div>
    </div>
    <hr style="background-color:rgb(255, 0, 0);color:rgb(255, 0, 0);height:2px;border-width:0;with:100%">
    <div class="container">
        <div class="mb-3">
            <h4>Customer Information</h4>
        </div>
        <div class="w-75 mx-auto">
            <div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border border-dark" id="floatingInput"
                        value="{{$customer->cusName}}" placeholder="Full Name" readonly>
                    <label for="floatingInput">Full Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="gender" class="form-control border border-dark" id="floatingInput"
                        @if ($customer->gender==0)
                            value='Male'
                        @elseif ($customer->gender==1)
                            value='Female'
                        @else
                            value=''
                        @endif placeholder="Gender" readonly>
                    <label for="floatingInput">Gender</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border border-dark" id="floatingInput"
                        value="{{$customer->DoB}}" placeholder="Date of Birth" readonly>
                    <label for="floatingInput">Date of Birth</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="ticketPrice" class="form-control border border-dark" id="floatingInput"
                        value="{{$customer->phone}}" placeholder="Phone Number" readonly>
                    <label for="floatingInput">Phone Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="a" class="form-control border border-dark" id="floatingInput"
                        value="{{$customer->email}}" placeholder="Email" readonly>
                    <label for="floatingInput">Email</label>
                </div>
                <button type="submit" class="btn btn-primary d-block mx-auto">Update Information</button>
            </div>
        </div>
    </div>
</div>
@endsection
