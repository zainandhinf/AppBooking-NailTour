<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="assets/DataTables/DataTables-1.13.6/css/jquery.dataTables.css" rel="stylesheet">
    <script src="assets/js/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
</head>

<body>
    @include('admin.layout.partials.sidebar')

    <div class="content">
        <nav>
            @include('admin.layout.partials.navbar')
        </nav>
        <main>
            @yield('content')
        </main>
    </div>


    <script src="assets/js/admin.js"></script>
    <script src="assets/js/sidebar.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/DataTables/DataTables-1.13.6/js/jquery.dataTables.js"></script>
    {{-- <script src="assets/js/jquery-3.7.1.min.js"></script> --}}
</body>

</html>
