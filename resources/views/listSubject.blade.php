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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('change.password') }}">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
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
    <div style="padding-left: 200px;">
        @if ($user->role == 1)
            <a href="{{ url('/subject') }}" class="btn btn-success">Thêm</a>
        @endif
        @if ($user->role == 0)
            <a href="{{ route('list.subject.student') }}" class="btn btn-success">My Subject</a>
        @endif
    </div>
    <section class="w-100 p-4 table-responsive" style="display: flex; justify-content: center;">
        @if ($user->role == 1)
            <table class="table  table-striped mb-0 bg-white" style="width: 80%; ">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Subject name</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_subject_teacher as $subject)
                        <form action="{{ url('/delete-subject/' . $subject->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <tr>
                                <td>{{ $subject->subject_name }}</td>
                                <td>{{ $subject->start_date }}</td>
                                <td>{{ $subject->end_date }}</td>

                                @if ($user->role == 1)
                                    <td>
                                        <a href="{{ url('/subject-detail/' . $subject->id) }}" role="button"
                                            type="button" class="btn btn-light">Chi tiết</a>
                                        <a href="{{ url('/update-subject/' . $subject->id) }}"
                                            class="btn btn-info">Sửa</a>
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </td>
                                @endif
                            </tr>
                        </form>
                    @endforeach
            </table>
        @endif
        @if ($user->role == 0)
            <table class="table  table-striped mb-0 bg-white" style="width: 80%;">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Subject name</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_subject as $subject)
                        <form action="{{ url('/join-subject/' . $subject->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <tr>
                                <td>{{ $subject->subject_name }}</td>
                                <td>{{ $subject->start_date }}</td>
                                <td>{{ $subject->end_date }}</td>
                                <td>
                                    <a href="{{ url('/subject-detail/' . $subject->id) }}" role="button"
                                        type="button" class="btn btn-light">Chi tiết</a>
                                    <button type="submit" class="btn btn-info">Tham gia</button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
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
