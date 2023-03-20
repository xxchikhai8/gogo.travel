<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"
        integrity="sha256-5WYg3s9NxGKR2MpEBTy0QMT3Gvgxl3yKjbW4l0CfUUY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.3.0/js/all.min.js"
        integrity="sha256-+rLIGHyZHBDebNqckORMwB+/ueJuy2RqFcYAYlhjkCs=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
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
                    <a class="navbar-brand d-flex align-items-center fw-bold" href="/"><img
                            src="/assets/img/GoGoLogo.svg" width="42px" height="42px" class="me-2"><span
                            class="h2 mb-0">GoGo Travel</span></a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link headertext" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link headertext" href="/history">History</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item ">
                                <a class="nav-link headertext-right" data-bs-toggle="modal" data-bs-target="#sign-in-modal"
                                    type="button">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link headertext-right" data-bs-toggle="modal" data-bs-target="#sign-up-modal"
                                    type="button">Sign Up</a>
                            </li>
                        @endguest
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
            <div class="modal fade" id="sign-in-modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="ModalLabel">Sign In to GoGo Travel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="/" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="username" class="form-control border border-dark"
                                        id="signinInput" placeholder="Username">
                                    <label for="signinInput"><i class="fa-solid fa-user"></i> Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control border border-dark"
                                        id="signinPassword" placeholder="Password">
                                    <label for="signinPassword"><i class="fa-solid fa-unlock-keyhole"></i> Password</label>
                                </div>
                                <div>
                                    <h6>New to GoGo Travel! <a role="button" data-bs-toggle="modal"
                                            data-bs-target="#sign-up-modal" class="text-underline"> Create an
                                            account.</a></h6>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary buttons"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary button">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="sign-up-modal" tabindex="-1" aria-labelledby="ModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="ModalLabel">Sign Up to GoGo Travel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="/sign-up" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="center">
                                    <div class="btn-group rolebutton" role="group"
                                        aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="role" value="user"
                                            id="btnradio1" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="btnradio1">Customer</label>
                                        <input type="radio" class="btn-check" name="role" value="enterprise"
                                            id="btnradio2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio2">Enterprise</label>
                                    </div>
                                </div>
                                <div class="layouts divider">
                                </div>
                                <div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="username" class="form-control border border-dark"
                                            id="floatingInput" placeholder="Username">
                                        <label for="floatingInput"><i class="fa-solid fa-user"></i> Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password"
                                            class="form-control border border-dark" id="floatingPassword"
                                            placeholder="Password">
                                        <label for="floatingPassword"><i class="fa-solid fa-unlock-keyhole"></i> Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="confpassword"
                                            class="form-control border border-dark" id="floatingPassword"
                                            placeholder="Confirm Password">
                                        <label for="floatingPassword"><i class="fa-solid fa-unlock-keyhole"></i> Confirm Password</label>
                                    </div>
                                    <div class="form-floating mb-3" id="enterprise">
                                        <input type="text" name="enterpriseNum"
                                            class="form-control border border-dark" id="enterpriseNumber"
                                            placeholder="Enterprise Number">
                                        <label id="enterpriseNumber" for="enterprise"><i class="fa-solid fa-building"></i> Enterprise Number</label>
                                    </div>
                                    <div class="form-floating mb-3" id="enterprise">
                                        <input type="text" name="airlineName"
                                            class="form-control border border-dark" id="enterpriseName"
                                            placeholder="Airline Name">
                                        <label id="enterpriseName" for="enterprise"><i class="fa-solid fa-plane"></i> Airline Name</label>
                                    </div>
                                    <div class="form-floating mb-3" id="enterprise">
                                        <input type="text" name="airlineCode"
                                            class="form-control border border-dark" id="enterpriseCode"
                                            placeholder="Airline Code">
                                        <label id="enterpriseCode" for="enterprise"><i class="fa-solid fa-barcode"></i> Airline Code</label>
                                    </div>
                                    <div class="form-floating mb-3" id="enterprise">
                                        <input type="text" name="nation"
                                            class="form-control border border-dark" id="Nation"
                                            placeholder="Nation">
                                        <label id="Nation" for="enterprise"><i class="fa-solid fa-globe"></i> Nation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary buttons"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-secondary button" data-bs-toggle="modal"
                                    data-bs-target="#sign-in-modal">Sign In</button>
                                <button type="submit" class="btn btn-primary button">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0">
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
    <script src="/assets/js/index.js"></script>
</body>
</html>
