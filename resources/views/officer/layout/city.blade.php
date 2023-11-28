@extends('admin.main')

@section('content')
    <!-- Modal -->
    <!-- Button trigger modal -->
    <button onclick="ShowModal1()" type="button" class="btn btn-primary mt-2 ms-4" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        Add City Data
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input City Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadcity" method="POST">
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
                        <div class="">
                            {{-- <span class="input-group-text" id="basic-addon1">Province</span> --}}
                            {{-- <input type="text"
                                class="form-control @error('province')
                            is-invalid
                        @enderror"
                                placeholder="Province" aria-label="Province" aria-describedby="basic-addon1" name="province"
                                required> --}}

                            <select style="width: 100%;"
                                class="js-example-basic-single select1 col-9 form-select @error('provinces_id')
                            is-invalid
                        @enderror"
                                id="inputGroupSelect01" name="provinces_id">
                                <option value="">Choose...</option>
                                @foreach ($provices as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>

                            @error('provinces_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- tabel --}}
    <div class="ms-4 mt-2 me-4 table-responsive">
        <table class="display" id="data-tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Province</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($citys as $city)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    {{-- <td>{{ $city->id }}</td> --}}
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->province }}</td>
                    <td>
                        <a onclick="ShowModal2('{{ $city->id }}')" type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#editModal{{ $city->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/deletecity" class="d-inline" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" id="" name="id_city" value="{{ $city->id }}">
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
    @foreach ($citys as $city)
        <!-- Modal -->
        <div class="modal fade" id="editModal{{ $city->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update City Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updatecity" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="" name="id_city" value="{{ $city->id }}">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" name="name"
                                    value="{{ old('name', $city->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="">
                                {{-- <span class="input-group-text" id="basic-addon1">Province</span> --}}
                                <select style="width: 100%;"
                                    class="js-example-basic-single select2{{ $city->id }} col-9 form-select @error('provinces_id')
                            is-invalid
                        @enderror"
                                    id="inputGroupSelect01" name="provinces_id">
                                    <option value="">Choose...</option>
                                    @foreach ($provices as $province)
                                        @if (old('province', $city->province) == $province->name)
                                            <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                                        @else
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control @error('province') is-invalid @enderror"
                                    placeholder="Province" aria-label="Province" aria-describedby="basic-addon1"
                                    name="province" value="{{ old('province', $city->provinces_id) }}"> --}}
                                @error('province_id')
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
            $('#data-tables').DataTable(
                //     {
                //     // "lengthMenu": [
                //     //     [4, 10, 25, 50, -1],
                //     //     [4, 10, 25, 50, "All"]
                //     // ],
                //     "pageLength": 4,
                //     "lengthChange": false
                // }
            );
        });

        function ShowModal1() {
            $('#exampleModal').ready(function() {
                $('.select1').select2({
                    placeholder: 'Select an province...',
                    dropdownParent: '#exampleModal'
                });
            });
        }

        function ShowModal2(catalogId) {

            // Temukan elemen input dengan id "Modal2"
            var modalInput = "#editModal" + catalogId;
            var select = ".select2" + catalogId;
            console.log(modalInput);

            $(modalInput).ready(function() {
                $(select).select2({
                    placeholder: 'Select an new province...',
                    dropdownParent: modalInput
                });
            });
        }
    </script>
@endsection
