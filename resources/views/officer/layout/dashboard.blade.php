@extends('admin.main')

@section('content')
    <div>
        {{-- <h1>ini dashboard</h1>
        <table class="display" id="data-tables">
            <thead>
                <tr>
                    <th>nama</th>
                    <th>kelas</th>
                    <th>jurusan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Zainandhi</td>
                    <td>11 RPL A</td>
                    <td>Rekayasa Perangkat Lunak</td>
                </tr>
                <tr>
                    <td>Arya</td>
                    <td>11 RPL A</td>
                    <td>Rekayasa Perangkat Lunak</td>
                </tr>
                <tr>
                    <td>Ridho</td>
                    <td>11 RPL A</td>
                    <td>Rekayasa Perangkat Lunak</td>
                </tr>
            </tbody>
        </table>
    </div> --}}

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" id="dropdown-data">
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdown-data">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>




        <script>
            $(document).ready(function() {
                $('#data-tables').DataTable();
            });
        </script>
    @endsection
