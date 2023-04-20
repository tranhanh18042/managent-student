<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                            <form action="{{route('search')}}" method="GET">
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

    <section style="background-color: #eee;">
        <div style="padding-left: 16.5%">
            <a class="btn btn-primary" href="{{ route('subjects') }}"> <--- Back</a>

        </div>
    </section>

    <section style="background-color: #eee;">
        <div class="container py-5" style="width: 80%; padding-top: 300px;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset($user->avatar) }}" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 140px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">{{ $user->email }}</p>
                            <p class="text-muted mb-1">{{ $user->phone }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row" style="padding-bottom: 15px;">
                                <span style="font-size: 30px; padding-bottom: 20px; text-align: center">Information
                                    Subject</span>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Subject Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $subject->subject_name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">End Date</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $subject->start_date }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Start Date</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $subject->end_date }}</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #eee;">
        <div style="padding-left: 16.5%">
            @if ($role_user_login == 1)
                <form action="{{ url('/add-student' . '/' . $subject->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <label class="form-label">ID *</label>
                    <input name="id" type="number" value="">
                    <button type="submit" class="btn btn-success">Add Student</button>
                </form>
            @endif
        </div>
    </section>
    <section class="w-100 p-4 table-responsive" style="display: flex; justify-content: center; background-color: #eee;">
        @if ($role_user_login == 1)
            <table class="table  table-striped mb-0 bg-white" style="width: 69%; ">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Score Process</th>
                        <th scope="col">Score Test</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $student)
                        <form action="{{ url('remove-student' . '/' . $student->id . '/' . $subject->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($student->avatar) }}" alt=""
                                            style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">{{ $student->name }}</p>
                                            <p class="text-muted mb-0">{{ $student->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $student->address }}</td>
                                @foreach ($user_subject as $rs)
                                    @if ($student->id == $rs->user_id)
                                        <td>{{ $rs->score_process }}</td>
                                        <td>{{ $rs->score_test }}</td>
                                    @endif
                                @endforeach

                                <td>
                                    <a href="{{ url('/score' . '/' . $student->id . '/' . $subject->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-danger">Xóa</button>

                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        @endif
    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
