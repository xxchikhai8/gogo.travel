<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="application-name" content="GoGo Travel">
    <meta name="author" content="Le Chi Khai">
    <meta name="description" content="GoGo Travel - a website for booking flight ticket." />
    <meta name="keywords" content="GoGo Travel, Booking GoGo Travel, GoGo" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"
        integrity="sha256-5WYg3s9NxGKR2MpEBTy0QMT3Gvgxl3yKjbW4l0CfUUY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css"
        integrity="sha256-HtsXJanqjKTc8vVQjO4YMhiqFoXkfBsjBWcX91T1jr8=" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/enterprise.index.css">
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <title>GoGo Travel | @yield('title')</title>
</head>

<body class="d-flex flex-column h-100">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
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
                            <a class="nav-link headertext" href="/flight"><i class="fa-solid fa-plane-departure me-2"></i>Flight</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link headertext" href="/planes"><i class="fa-solid fa-plane me-2"></i>Plane</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link headertext" href="/ticket"><i class="fa-solid fa-ticket me-2"></i>Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{ Request::route()->getName() === 'dashboard' ? 'nav-link headertext active fw-bold' : 'nav-link headertext'}}" href="/dashboard?year={{$currentYear}}"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle headertext-right" data-bs-toggle="dropdown"><i class="fa-solid fa-user me-2"></i>Hi,
                                    {{ Auth::user()->username }}</a>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a href="/management/account/enterprise" class="dropdown-item">Account</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a href="/sign-out" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Sign out</a></li>
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
    <link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/fc-4.2.2/fh-3.3.2/r-2.4.1/sc-2.1.1/sp-2.1.2/datatables.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/fc-4.2.2/fh-3.3.2/r-2.4.1/sc-2.1.1/sp-2.1.2/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
