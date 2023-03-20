<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.3.0/js/all.min.js"
        integrity="sha256-+rLIGHyZHBDebNqckORMwB+/ueJuy2RqFcYAYlhjkCs=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/enterprise.index.css">
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <title>@yield('title')</title>
</head>

<body class="d-flex flex-column h-100">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand d-flex align-items-center fw-bold" href="/flight"><img
                            src="/assets/img/GoGoLogo.svg" width="42px" height="42px" class="me-2"><span
                            class="h2 mb-0">GGT Enterprise</span></a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link headertext" href="/flight">Flight</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link headertext" href="/planes">Plane</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link headertext" href="/ticket">Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link headertext" href="/dashboard"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle headertext-right" data-bs-toggle="dropdown"><i
                                        class="fa-solid fa-user"></i> Hi,
                                    {{ Auth::user()->username }}</a>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a class="dropdown-item">Account</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a href="/sign-out" class="dropdown-item">Sign out</a></li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-fluid mb-4">
            @yield('content')
        </div>
    </main>

    <footer class="mt-auto p-4 text-bg-dark">
        <div class="row mb-2 text-center d-flex align-items-center">
            <span><img src="/assets/img/GoGoLogo.svg" width="48px" height="48px" class="me-2"><span
                    class="mb-0 h4">GoGo Travel</span></span>
        </div>
        <div class="row text-center">
            <span>2023 &copy; GoGo Travel</span>
        </div>
    </footer>
    <script src="/assets/js/enterprise.index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
