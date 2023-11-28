@extends('admin.main')

@section('content')
    <!-- Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Countries Data
    </button>

    @if (session()->has('success'))
        <div class="alert alert-success mt-1 mb-1" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Provinces Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadprovinces" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Name</span>
                            <input type="text"
                                class="form-control @error('name')
                            is-invalid
                        @enderror"
                                placeholder="Name" aria-label="Locatioon" aria-describedby="basic-addon1" name="name"
                                required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Countries Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" ari a-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadcountries" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Name</span>
                            <input type="text"
                                class="form-control @error('name')
                            is-invalid
                        @enderror"
                                placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" name="name"
                                required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                {{-- <button onclick="zzz()" type="button" class="btn btn-primary mt-4 ms-4 me-4" id="myButton">
                    zzzz
                </button> --}}
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- tabel --}}
    <div class="mt-2 table-responsive">
        <table class="table table-striped" style="width:100%" id="data-tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($countries as $country)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    {{-- <td>{{ $province->id }}</td> --}}
                    <td>{{ $country->name }}</td>
                    <td>
                        <a type="button" class="btn btn-primary mb-1 mt-1" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1{{ $country->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/deletecountries" class="d-inline" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" id="" name="id_countries" value="{{ $country->id }}">
                            <button class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete data?')">
                                <i class="fa-solid fa-trash "></i>
                            </button>
                        </form>
                        {{-- <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $users->id }}"
                            onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger"><i
                                class="fa-solid fa-trash"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{-- end tabel --}}

    {{-- edit --}}
    @foreach ($countries as $country)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1{{ $country->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Countries Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updatecountries" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="" name="id_countries" value="{{ $country->id }}">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" name="name"
                                    value="{{ old('name', $country->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    @endforeach
    {{-- end edit --}}


    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable();
        });
    </script>
@endsection
