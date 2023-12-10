@extends('admin.main')

@section('content')
    <!-- Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Officer Data
    </button>

    @if (session()->has('success'))
        <div class="alert alert-success mt-1 mb-1" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Officer Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadofficer" method="POST" enctype="multipart/form-data">
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
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                            <input type="text"
                                class="form-control @error('username')
                            is-invalid
                        @enderror"
                                placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username"
                                required>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="text"
                                class="form-control @error('email')
                            is-invalid
                        @enderror"
                                placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email"
                                required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                            <input type="password"
                                class="form-control @error('password')
                            is-invalid
                        @enderror"
                                placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password"
                                required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">No Phone</span>
                            <input type="text"
                                class="form-control @error('no_phone')
                            is-invalid
                        @enderror"
                                placeholder="No Phone..." aria-label="no_phone" aria-describedby="basic-addon1"
                                name="no_phone" required>
                            @error('no_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Photo Profile</span>
                            <input type="file"
                                class="form-control @error('photo_profile')
                            is-invalid
                        @enderror"
                                placeholder="Photo Profile..." aria-label="photo_profile" aria-describedby="basic-addon1"
                                name="photo_profile" required>
                            @error('photo_profile')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                </div>
                </form>
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
                    <th>Photo Profile</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($user as $users)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td><img src="{{ asset('storage/' . $users->photo_profile) }}" alt="" style="width: 70px;"></td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->username }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->no_phone }}</td>
                    <td>{{ $users->role }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editpassword{{ $users->id }}">
                            <i class="fa-solid fa-lock"></i>
                        </a>
                        <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1{{ $users->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/deleteofficer" class="d-inline" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" id="" name="id_officer" value="{{ $users->id }}">
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
    @foreach ($user as $users)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1{{ $users->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Officer Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updateofficer" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="" name="id_officer" value="{{ $users->id }}">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" aria-label="Username" aria-describedby="basic-addon1"
                                    name="name" value="{{ old('name', $users->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                    name="username" value="{{ old('username', $users->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email" aria-label="Username" aria-describedby="basic-addon1"
                                    name="email" value="{{ old('email', $users->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">No Phone</span>
                                <input type="text" class="form-control @error('no_phone') is-invalid @enderror"
                                    placeholder="No Phone..." aria-label="No Phone" aria-describedby="basic-addon1"
                                    name="no_phone" value="{{ old('no_phone', $users->no_phone) }}">
                                @error('no_phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <span
                                class="@error('photo_profile')
                            mt-3
                        @enderror"
                                id="basic-addon1">Photo Profile : </span>
                            <input type="hidden" name="oldImage" value="{{ $users->photo_profile }}">
                            @if ($users->photo_profile)
                                <img src="{{ asset('storage/' . $users->photo_profile) }}" alt=""
                                    style="width: 200px;" class="d-block mb-3">
                            @else
                                <img src="" alt="">
                            @endif
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">New Photo Profile</span>
                                <input id="photo_profile" type="file"
                                    class="form-control @error('photo_profile')
                            is-invalid
                        @enderror @error('photo_profile')
                        mt-3
                    @enderror"
                                    placeholder=" Choose Photo Profile..." aria-label="photo_profile"
                                    aria-describedby="basic-addon1" name="photo_profile">
                                @error('photo_profile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="input-gr
                            {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password" aria-label="Username" aria-describedby="basic-addon1"
                                    name="password" value="{{ old('password', $users->password) }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            {{-- <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                                <select class="form-select" id="inputGroupSelect01" name="jk">
                                    @if ($siswas->jenis_kelamin == 'L')
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    @elseif($siswas->jenis_kelamin == 'P')
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-laki</option>
                                    @endif

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
    @endforeach
    {{-- end edit --}}

    {{-- edit password --}}
    @foreach ($user as $users)
        <!-- Modal -->
        <div class="modal fade" id="editpassword{{ $users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/editpassword" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="" name="id_officer" value="{{ $users->id }}">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">New password</span>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="New password..." aria-label="Password" aria-describedby="basic-addon1"
                                    name="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                    name="username" value="{{ old('username', $users->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email" aria-label="Username" aria-describedby="basic-addon1"
                                    name="email" value="{{ old('email', $users->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password" aria-label="Username" aria-describedby="basic-addon1"
                                    name="password" value="{{ old('password', $users->password) }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            {{-- <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                                <select class="form-select" id="inputGroupSelect01" name="jk">
                                    @if ($siswas->jenis_kelamin == 'L')
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    @elseif($siswas->jenis_kelamin == 'P')
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-laki</option>
                                    @endif

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
    @endforeach
    {{-- end edit --}}


    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable();
        });
    </script>
@endsection
