<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <title>Hello, world!</title>
</head>

<body>

    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15"
                            alt="MDB Logo" loading="lazy" />
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subjects') }}">Subject</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                        </li>
                        @if (Auth::user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('listUsers') }}">Students</a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('result') }}">Result</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('change.password') }}">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('search') }}" method="GET">
                                @csrf
                                <div class="input-group">
                                    <div class="form-outline">
                                        <input id="search-focus" name="search" type="search" placeholder="Search"
                                            aria-label="Search" id="form1" class="form-control" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search fa-lg me-3 fa-fw"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <!-- Right elements -->
                </div>
                <!-- Container wrapper -->
        </nav>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>Score</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Name : {{ $user->name }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Subject : {{ $subject->subject_name }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Score Process </label>
                                        <input name="score_process" type="number" class="form-control" value="">
                                    </div>
                                    <!-- Start -->
                                    <div class="col-md-6">
                                        <label class="form-label">Score Test *</label>
                                        <input name="score_test" type="number" class="form-control" value="">
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </div> <!-- Row END -->
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Update</button>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div>
</body>
