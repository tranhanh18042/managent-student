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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>Register</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form action="{{ route('register.create') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <!--Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Name *</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email *</label>
                                        <input name="email" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone *</label>
                                        <input name="phone" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Address *</label>
                                        <input name="address" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Role *</label>
                                        <input name="role" type="number" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Password *</label>
                                        <input name="password" type="password" class="form-control">
                                    </div>


                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </div> <!-- Row END -->
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div>
</body>
