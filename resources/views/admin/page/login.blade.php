<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Login | NailTour</title>
</head>

<body>
    <section class="side">
        <img src="assets/img/login.svg" alt="" class="img-side">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">LOGIN</p>
            <div class="separator mt-0"></div>
            <p class="welcome-message">Please, provide login credential to proceed and have access to all our services
            </p>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dimissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('logerror'))
                <div class="alert alert-danger alert-dimissible fade show" role="alert">
                    {{ session('logerror') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="/login" method="post" class="login-form">
                @csrf
                <div class="form-control">
                    <input type="text" placeholder="Username" name="username" required>
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" placeholder="Password" name="password" required>
                    <i class="fas fa-lock"></i>
                </div>

                <button class="submit" type="submit">Login</button>
            </form>
            <p>Don't have an account yet? <a class="text-decoration-none" href="/signup">Sign Up</a></p>
        </div>
    </section>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
