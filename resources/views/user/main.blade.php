<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailTour | {{ $title }}</title>
    {{-- <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/user/css/style.css">
    <link rel="stylesheet" href="../assets/user/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/">
    <link rel="stylesheet" href="../assets/bootstrap/css/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="assets/DataTables/DataTables-1.13.6/css/jquery.dataTables.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

    {{-- JQuery --}}
    <script src="assets/jquery/jquery-3.7.1.min.js"></script>
    <script src="../assets/jquery/jquery-3.7.1.min.js"></script>
    <script src="assets/jquery/jquery-3.7.0.js"></script>
    <script src="../assets/jquery/jquery-3.7.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script> --}}
    {{-- end JQuery --}}

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    {{-- end Bootstrap --}}

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.min.css">
    {{-- end Font Awesome --}}

    {{-- DataTables --}}
    <link rel="stylesheet" href="assets/DataTables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js">
    <link rel="stylesheet" href="../assets/DataTables/dataTables.bootstrap5.min.css">
    <script src="assets/DataTables/jquery.dataTables.min.js"></script>
    <script src="../assets/DataTables/jquery.dataTables.min.js"></script>
    <script src="assets/DataTables/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/DataTables/dataTables.bootstrap5.min.js"></script>
    {{-- <link href="assets/DataTables/DataTables-1.13.6/css/jquery.dataTables.css" rel="stylesheet">
    <link href="../assets/DataTables/DataTables-1.13.6/css/jquery.dataTables.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" /> --}}
    {{-- end DataTables --}}

    {{-- Select2 --}}
    <link href="assets/select2/select2.min.css" rel="stylesheet" />
    <link href="../assets/select2/select2.min.css" rel="stylesheet" />
    <script src="assets/select2/select2.min.js"></script>
    <script src="../assets/select2/select2.min.js"></script>
    {{-- <link rel="stylesheet" href="assets/dselect-main/source/css/dselect.scss"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- end Select2 --}}

    {{-- Dropzone --}}
    <script src="assets/dropzone/min/dropzone.min.js"></script>
    <script src="../assets/dropzone/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="assets/dropzone/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="../assets/dropzone/min/dropzone.min.css" type="text/css" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"
    integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
    {{-- end Dropzone --}}

    {{-- Style --}}
    <link rel="stylesheet" href="assets/user/css/style.css">
    <link rel="stylesheet" href="../assets/user/css/style.css">
    {{-- end Style --}}
</head>

<body>

    @include('user.layout.partials.navbar')


    @yield('content')


    @include('user.layout.partials.footer')


    <script src="assets/user/js/main.js"></script>
    <script src="../assets/user/js/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.masknumber.js"></script>
    <script src="../assets/js/jquery.masknumber.js"></script>
    <script src="assets/DataTables/DataTables-1.13.6/js/jquery.dataTables.js"></script>
    <script src="../assets/DataTables/DataTables-1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</body>

</html>
