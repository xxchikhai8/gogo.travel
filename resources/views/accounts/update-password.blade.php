@extends(Auth::user()->role == 'user' ? 'layouts.main' : 'layouts.enterprise')
@section('content')
@section('title', 'Change Password')
<div class="container">
    <div class="w-75 mx-auto">
        @if (Auth::user()->role == 'user')
            <a href="/management-user-account" class="btn btn-dark mb-3"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <form action="/changes-password" method="POST">
                @csrf
                <h3 class="text-center mb-3 fw-bold">Change Password</h3>
                <div class="form-floating mb-3">
                    <input type="password" name="newPass" class="form-control border border-dark" id="floatingInput"
                        placeholder="New Password" required>
                    <label for="floatingInput">New Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="confirmPass" class="form-control border border-dark" id="floatingInput"
                        placeholder="Confirm Password" required>
                    <label for="floatingInput">Confirm Password</label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary d-block mx-auto w-25">Save Change</button>
                </div>
            </form>
        @else
            <a href="/management-enterprise-account" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i>
                Back</a>
            <form action="/changeds-password" method="POST">
                @csrf
                <h3 class="text-center mb-3 fw-bold">Change Password</h3>
                <div class="form-floating mb-3">
                    <input type="password" name="newPass" class="form-control border border-dark" id="floatingInput"
                        placeholder="New Password" required>
                    <label for="floatingInput">New Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="confirmPass" class="form-control border border-dark" id="floatingInput"
                        placeholder="Confirm Password" required>
                    <label for="floatingInput">Confirm Password</label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary d-block mx-auto w-25">Save Change</button>
                </div>
            </form>
        @endif
    </div>
</div>
@if (session('notify') == 'match')
    <script>
        Swal.fire({
            title: 'Fail to Save!',
            text: 'New Password and Confirm Password is not match!',
            icon: 'error',
            allowOutsideClick: false,
        });
    </script>
@endif
@endsection
