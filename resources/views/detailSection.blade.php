<!DOCTYPE html>
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <section style="padding-left: 5%; padding-right: 5%; padding-top: 50px">
        <div style="display: flex; justify-content: center; align-content: center;">
            <iframe width="800" height="300" src="{{ $subjectSection->video_url }}" title="Vimeo video"
                allowfullscreen></iframe>

            <p class="lead" style="padding-left: 5% ">
                <span style="font-size: 30px; font-weight: 800">Description</span>
                <br>
                {{ $subjectSection->description }}
            </p>
        </div>
    </section>

    @if ($role == 1)
        <section style="background-color: #eee; margin-top: 30px; margin-bottom: 30px;">
            <div style="padding-left: 5%">
                <a href="{{ url('/add-document' . '/' . $subjectSection->id) }}" class="btn btn-success">Thêm tài
                    liệu</a>
            </div>
        </section>
    @endif

    <section style="padding-left: 5%; padding-right: 5%; display: flex; justify-content: center;">
        <table class="table" style="margin-right: 50px">
            <thead>
                <tr>
                    <th scope="col">Tài liệu</th>
                    @if ($role == 1)
                        <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <form action="{{ url('/delete-document' . '/' . $document->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if ($document->type == 1)
                            <tr>
                                <td><a href="{{ $document->link_document }}">{{ $document->name_document }}</a></td>
                                @if ($role == 1)
                                    <td>
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    </form>
                @endforeach
            </tbody>
        </table>
        <table class="table" style="margin-right: 50px">
            <thead>
                <tr>
                    <th scope="col">Bài viết tham khảo</th>
                    @if ($role == 1)
                        <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <form action="{{ url('/delete-document' . '/' . $document->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if ($document->type == 2)
                            <tr>
                                <td><a href="{{ $document->link_document }}">{{ $document->name_document }}</a></td>
                                @if ($role == 1)
                                    <td>
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    </form>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- Navbar -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
