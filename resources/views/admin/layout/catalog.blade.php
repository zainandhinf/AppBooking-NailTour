@extends('admin.main')

@section('content')
    <!-- Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($nis as $index => $n) --}}
            @php
                $no = 1;
            @endphp
            {{-- @foreach (\App\Models\siswa::query()->get() as $siswas) --}}
            {{-- @foreach ($siswa as $siswas) --}}
            <tr>
                <td scope="row">{{ $no++ }}</th>
                <td>haha</td>
                <td>haha</td>
                <td>haha</td>
                {{-- <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $n }}</td>
                    <td>{{ $nama[$index] }}</td>
                    <td>{{ $jk[$index] }}</td> --}}
                {{-- <th scope="row">{{ $no++ }}</th>
                <td>{{ $siswas->nis }}</td>
                <td>{{ $siswas->nama }}</td>
                <td>{{ $siswas->jenis_kelamin }}</td>
                <td>
                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal1{{ $siswas->id }}">
                        Edit
                    </a>
                    <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $siswas->id }}"
                        onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger">Hapus</a>
                </td> --}}
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
    {{-- end tabel --}}
@endsection
