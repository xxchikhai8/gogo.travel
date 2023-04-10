@extends('layouts.main')
@section('content')
@section('title', 'Update Information')
<div class="container">
    <div class="w-75 mx-auto">
        <div class="mb-3">
            <a href="/management/account/user" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i> Back</a>
        </div>
        <form action="/information/changes/save" method="post">
            @csrf
            <h3 class="text-center mb-3 fw-bold">Change Information</h3>
            @if (count($errors) > 0)
                <div class="d-flex justify-content-center">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            <div><i class="fa-solid fa-triangle-exclamation me-2"></i>{{ $err }}</div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="form-floating mb-3">
                <input type="text" name="cusName" class="form-control border border-dark" id="floatingInput"
                    value="{{$customer->cusName}}" placeholder="Full Name" required>
                <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" name="DoB" class="form-control border border-dark" id="floatingInput"
                    value="{{$customer->DoB}}" placeholder="Date of Birth" required>
                <label for="floatingInput">Date of Birth</label>
            </div>
            <div class="form-check mb-3 ps-2 border border-dark p-2 rounded-2">
            <label>Gender: </label>
            <input type="radio" class="btn-check" name="gender" id="success-outlined" value="0" autocomplete="off" @if ($customer->gender==0 || $customer->gender==2) checked @endif>
            <label class="btn btn-outline-success w-25" for="success-outlined">Male</label>
            <input type="radio" class="btn-check" name="gender" id="danger-outlined" value="1" autocomplete="off" @if ($customer->gender==1) checked @endif>
            <label class="btn btn-outline-success w-25" for="danger-outlined">Female</label>
        </div>
            <div class="form-floating mb-3">
                <input type="text" name="phone" class="form-control border border-dark" id="floatingInput"
                    value="{{$customer->phone}}" placeholder="Phone Number" required>
                <label for="floatingInput">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control border border-dark" id="floatingInput"
                    value="{{$customer->email}}" placeholder="Email" required>
                <label for="floatingInput">Email</label>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary d-block mx-auto w-25 show_confirm">Save Change</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: 'Are you want to Update Information?',
            text: 'This operation will modify the data! Are you sure you want to proceed?',
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
@endsection
