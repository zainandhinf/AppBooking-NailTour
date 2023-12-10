<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Sign Up | NailTour</title>
</head>

<body>
    <section class="side">
        <img src="assets/img/login.svg" alt="" class="img-side">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Sign Up</p>
            <div class="separator mt-0"></div>
            <p class="welcome-message">Register to continue and have access to all our services
            </p>

            @if (session()->has('logerror'))
                <div class="alert alert-danger alert-dimissible fade show" role="alert">
                    {{ session('logerror') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <form action="/signup" method="post" class="login-form" style="margin-top:-38px;">
                @csrf
                <div class="form-control">
                    <input class="@error('name') is-invalid @enderror" type="text" placeholder="Name" name="name"
                        value="{{ old('name') }}" required>
                    <i class="fas fa-user" style="@error('name') margin-top: -12px @enderror"></i>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top" id="name"
                        placeholder="Name">
                    <label for="name">
                        <i class="fas fa-user ms-2 me-3"></i>
                        Name</label>
                    <div class="invalid-feedback">
                        zz
                    </div>
                </div> --}}
                <div class="form-control">
                    <input class="@error('username') is-invalid @enderror" type="text" placeholder="Username"
                        name="username" value="{{ old('username') }}" required>
                    <i class="fas fa-user" style="@error('username') margin-top: -12px @enderror"></i>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-control">
                    <input class="@error('email') is-invalid @enderror" type="text" placeholder="Email"
                        name="email" value="{{ old('email') }}" required>
                    <i class="fa-solid fa-at" style="@error('email') margin-top: -12px @enderror"></i>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-control">
                    <input class="@error('password') is-invalid @enderror" type="password" placeholder="Password"
                        name="password" required>
                    <i class="fas fa-lock" style="@error('password') margin-top: -12px @enderror"></i>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="submit mt-0" type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a class="text-decoration-none" href="/login">Login</a></p>
        </div>
    </section>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
