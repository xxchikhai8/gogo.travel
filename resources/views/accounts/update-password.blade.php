@extends(Auth::user()->role == 'user' ? 'layouts.main' : 'layouts.enterprise')
@section('content')
@section('title', 'Change Password')
<div class="container">
    <div class="w-75 mx-auto">
        @if (Auth::user()->role == 'user')
            <a href="/management/account/user" class="btn btn-dark mb-3"><i class="fa-solid fa-chevron-left"></i> Back</a>
            <form action="/password/change/save" method="POST">
                @csrf
                <h3 class="text-center mb-3 fw-bold">Change Password</h3>
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
            <a href="/management/account/enterprise" class="btn btn-dark"><i class="fa-solid fa-chevron-left"></i>
                Back</a>
            <form action="/password/changes/save" method="POST">
                @csrf
                <h3 class="text-center mb-3 fw-bold">Change Password</h3>
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
                    <button type="submit" class="btn btn-primary d-block mx-auto w-25 show_confirm">Save Change</button>
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
<script>
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: 'Are you want to Change Password?',
            text: 'This operation will modify the Password! Are you sure you want to proceed?',
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
