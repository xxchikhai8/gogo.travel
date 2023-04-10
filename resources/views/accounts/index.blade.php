@extends('layouts.main')
@section('content')
@section('title', 'Account Management')
<div>
    <div class="bg-danger">
        <div class="d-flex justify-content-center">
            <img src="/assets/img/avatar.png" alt="avatar" class="avatar mt-2">
        </div>
        <div class="d-flex justify-content-center mt-3">
            <h4 style="color:#fff">Hi, {{ $customer->cusName }}</h4>
        </div>
    </div>
    <hr style="background-color:rgb(255, 0, 0);color:rgb(255, 0, 0);height:2px;border-width:0;with:100%">
    <div class="container">
        <div class="mb-3 ms-5">
            <h4 class="ps-5">Customer Information</h4>
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
                        @elseif ($customer->gender==2)
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
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col mt-3 mb-4">
                        <a href="/information/changes" class="btn btn-primary d-block mx-auto w-75">Change Information</a>
                    </div>
                    <div class="col mt-3 mb-4">
                        <a href="/password/change" class="btn btn-primary d-block mx-auto w-75">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="border border-dark rounded-2 w-75 mx-auto p-3">
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <h4>Account Setting</h4>
                </div>
                <div class="col text-end">
                    <form action="/delete/account/{{Auth::user()->username}}" method="GET">
                        <button type="submit" class="btn btn-danger text-light show_delete"><i class="fa-solid fa-trash me-2"></i>Delete Account</button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>
@if (session('notify') == 'changeSuccess')
    <script>
        Swal.fire({
            title: 'Save Successful',
            text: 'Change Information Successful',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
    </script>
@endif
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
