@extends('layouts.admin')
@section('content')
@section('title', 'Welcome Back Admin')
<div class="mb-3">
    <table id="datatable" class="table-border">
        <thead>
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>State</th>
                <th>Config</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->state }}</td>
                    <td class="text-center">
                        <form action="/reset/{{ $user->username }}" method="get">
                            <button type="submit" class="show_reset" data-toggle="tooltip"><i class="fa-solid fa-arrows-rotate fa-spin-pulse"
                                    style="color: #ff0000;"></i></button>
                        </form>
                        {{-- <a href="/reset/{{$user->username}}"><i class="fa-solid fa-arrows-rotate fa-spin-pulse" style="color: #ff0000;"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $users->links() }}
    </div>
</div>
@if (session('notify') == 'admin')
    <script>
        Swal.fire({
            title: 'Sign In Successful!',
            text: 'Welcome Back Admin.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
        })
    </script>
@endif
@if (session('notify') == 'resetSuccess')
    <script>
        Swal.fire({
            title: 'Reset Password Successful!',
            text: 'New Password: a123456',
            icon: 'success',
            allowOutsideClick: false,
        })
    </script>
@endif
@if (session('notify') == 'resetFail')
    <script>
        Swal.fire({
            title: 'Fail to Reset Password!',
            text: 'Admin Account can not reset password!',
            icon: 'error',
            allowOutsideClick: false,
        })
    </script>
@endif
<script>
    $('.show_reset').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: 'Are you want to Reset Password?',
            text: 'This operation will reset the password! Are you sure you want to proceed?',
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
<script>
    $(function() {
        $('#datatable').DataTable({
            dom: "<'row my-2'<'col-sm-12 col-md-6 mb-2'><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>",
            "responsive": true,
            "lengthChange": true,
        });
    });
</script>
@endsection
