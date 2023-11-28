@extends('admin.main')

@section('content')
    <!-- Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Payments Method
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input payments Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadpayments" method="post">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Payments Method</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" ari a-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadpayments" method="POST">
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
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Description</span>
                            <input type="text"
                                class="form-control @error('description')
                            is-invalid
                        @enderror"
                                placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"n
                                name="description" required>
                            @error('description')
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
                    <th>Descrition</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($payments as $payment)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    {{-- <td>{{ $payment->id }}</td> --}}
                    <td>{{ $payment->name }}</td>
                    <td>{{ $payment->description }}</td>
                    <td>
                        <a type="button" class="btn btn-primary mb-1 mt-1" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1{{ $payment->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/deletepayments" class="d-inline" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" id="" name="id_payments" value="{{ $payment->id }}">
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
    @foreach ($payments as $payment)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1{{ $payment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update payment Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updatepayments" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="" name="id_payments" value="{{ $payment->id }}">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" name="name"
                                    value="{{ old('name', $payment->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Description</span>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                                    name="description" value="{{ old('description', $payment->description) }}">
                                @error('description')
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
