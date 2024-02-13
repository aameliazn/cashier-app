<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Login | Cashy</title>
</head>

<body>
    <section class="vh-100" style="background-color: #4e73df;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('login.action') }}" method="POST">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('assets/img/sugar-cubes.png') }}" height="50px"
                                                class="me-3" style="Logo">
                                            <span class="h1 fw-bold mb-0">Cashy</span>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>
                                        <div class="form-floating mb-4">
                                            <input type="email" name="email" id="floatingInput" class="form-control"
                                                placeholder="name@example.com" />
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="password" name="password" id="floatingPassword"
                                                class="form-control" placeholder="example" />
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                        <div class="d-grid gap-2 pt-1 mb-4">
                                            <button class="btn btn-lg text-light" style="background-color: #4e73df"
                                                type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</body>

</html>
