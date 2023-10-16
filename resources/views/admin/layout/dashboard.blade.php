@extends('admin.main')

@section('content')
    <div>
        <h1>ini dashboard</h1>
        <table class="table" id="data-tables">
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
    </div>

    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable();
        });
    </script>
@endsection
