<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | MyLibrary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-xs-4 col-md-4 py-5">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error Message:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login MyLibrary</h3>
                        <hr>
                        <form action="/auth/login/post" method="POST">
                            @csrf
                            <div class="form-group mb-1">
                                <strong>Username</strong>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Input Username Here...">
                            </div>
                            <div class="form-group mb-1">
                                <strong>Password</strong>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Input Password Here...">
                            </div>
                            <hr>
                            <div class="form-group mb-1">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>