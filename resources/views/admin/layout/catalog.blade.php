@extends('admin.main')

@section('content')
    <!-- Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-4 ms-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Catalog Data
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadsiswa" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">NIS</span>
                            <input type="text" class="form-control" placeholder="NIS" aria-label="Username"
                                aria-describedby="basic-addon1" name="nis">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nama</span>
                            <input type="text" class="form-control" placeholder="Nama" aria-label="Username"
                                aria-describedby="basic-addon1" name="nama">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                            <select class="form-select" id="inputGroupSelect01" name="jk">
                                <option selected>Choose...</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- tabel --}}
    <div class="ms-4 mt-2">
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
    {{-- end tabel --}}


    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable();
        });
    </script>
@endsection
