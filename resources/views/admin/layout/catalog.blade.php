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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Catalog Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadcatalog" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Title</span>
                            <input type="text" class="form-control" placeholder="Title" aria-label="Title"
                                aria-describedby="basic-addon1" name="title">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Location</span>
                            <input type="text" class="form-control" placeholder="Location"
                                aria-label="Locatioon
                                aria-describedby="basic-addon1"
                                name="location">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Price</span>
                            <input type="text" class="form-control" placeholder="Price" aria-label="Price"
                                aria-describedby="basic-addon1" name="price">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Includes</span>
                            <input type="text" class="form-control" placeholder="Includes" aria-label="Includes"
                                aria-describedby="basic-addon1" name="include">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Description</span>
                            <input type="text" class="form-control" placeholder="Description" aria-label="Description"
                                aria-describedby="basic-addon1" name="description">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Pictures</span>
                            <input type="file" class="form-control" placeholder="Pictures" aria-label="Pictures"
                                aria-describedby="basic-addon1" name="pictures">
                        </div>
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Price</span>
                            <input type="text" class="form-control" placeholder="Nama" aria-label="Username"
                                aria-describedby="basic-addon1" name="nama">
                        </div> --}}
                        {{-- <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                            <select class="form-select" id="inputGroupSelect01" name="jk">
                                <option selected>Choose...</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div> --}}
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
    <div class="ms-4 mt-2 me-4">
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
