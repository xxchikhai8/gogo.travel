<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoGoTravel - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.3.0/js/all.min.js"
        integrity="sha256-+rLIGHyZHBDebNqckORMwB+/ueJuy2RqFcYAYlhjkCs=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
</head>

<body class="h-100 d-flex align-items-center justify-content-center text-dark">
    <div class="text-center">
        <div class="display-1"><i class="fa-solid fa-triangle-exclamation text-danger text-muted"></i></div>
        <span class="border-end border-dark pe-2 h3 text-muted">@yield('code')</span>
        <span class="ms-2 h3 text-uppercase text-muted">@yield('message')</span>
        @if (Auth::check()== false)
            <div class="d-block text-center mt-3">
                <a type="button" href="/" class="btn btn-primary text-uppercase"><i class="fa-solid fa-chevron-left me-2"></i>Go to home</a>
            </div>
        @elseif (Auth::user()->role == 'admin')
            <div class="d-block text-center mt-3">
                <a type="button" href="/user" class="btn btn-primary text-uppercase"><i class="fa-solid fa-chevron-left me-2"></i>Go to home</a>
            </div>
        @elseif (Auth::user()->role == 'enterprise')
            <div class="d-block text-center mt-3">
                <a type="button" href="/flight" class="btn btn-primary text-uppercase"><i class="fa-solid fa-chevron-left me-2"></i>Go to home</a>
            </div>
        @elseif (Auth::user()->role == 'user')
            <div class="d-block text-center mt-3">
                <a type="button" href="/" class="btn btn-primary text-uppercase"><i class="fa-solid fa-chevron-left me-2"></i>Go to home</a>
            </div>
        @endif

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
