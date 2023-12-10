@extends('user.main')

@section('content')
    @php
        $userData = DB::table('users')
            ->select('*')
            ->where('id', '=', auth()->user()->id)
            ->get();
        // dd($userData);
    @endphp
    <section class="home" id="home">
        <div class="content">
            @if (session()->has('success'))
                <div class="alert alert-success mt-1 mb-1 col-3" role="alert"
                    style="position: fixed; top: 90px; right: 10px;">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-user shadow-lg">
                <div class="card-border-top-user">
                </div>
                <div class="img-user">
                    {{-- <img class="img-fluid rounded-circle" src="assets/img/user.jpg" alt=""> --}}
                    @if (auth()->user()->photo_profile == 'photoprofile/user.png')
                        <img src="assets/img/user.png" class="img-fluid rounded-circle" alt="">
                    @else
                        <img src="{{ asset('storage/' . auth()->user()->photo_profile) }}" class="img-fluid rounded-circle"
                            alt="">
                    @endif
                </div>
                <span>{{ $userData[0]->username }}</span>
                <h2 class="text-center text-black">{{ $userData[0]->name }}</h2>
                <h2 class="text-center text-black">{{ $userData[0]->email }}
                    @if (auth()->user()->no_phone == null)
                    @else
                        | {{ $userData[0]->no_phone }}
                    @endif
                </h2>
                {{-- <p class="job-user"> Job Title</p> --}}
                {{-- <a href="/logout" class="text-center text-decoration-none">Edit Profile</a> --}}
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit Profile
                </button>
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#editpassword">
                    Changes Password
                </button>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="" type="submit">
                        {{-- <i class="fa-solid fa-right-from-bracket me-1"></i> --}}
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </section>

    <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="exampleModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/editprofile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $userData[0]->id }}" name="id_user">
                        <div class="input-group mb-3">
                            <span class="input-group-text fs-5" id="basic-addon1">Name</span>
                            <input type="text"
                                class="form-control fs-5 @error('name')
                            is-invalid
                        @enderror"
                                placeholder="Name" aria-label="Locatioon" aria-describedby="basic-addon1" name="name"
                                value="{{ old('name', $userData[0]->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1 fs-5">Username</span>
                            <input type="text"
                                class="form-control fs-5 @error('username')
                            is-invalid
                        @enderror"
                                placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username"
                                value="{{ old('username', $userData[0]->username) }}" required>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text fs-5" id="basic-addon1">Email</span>
                            <input type="text"
                                class="form-control fs-5 @error('email')
                            is-invalid
                        @enderror"
                                placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email"
                                value="{{ old('email', $userData[0]->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text fs-5" id="basic-addon1">No Phone</span>
                            <input type="text" class="form-control fs-5 @error('no_phone') is-invalid @enderror"
                                placeholder="No Phone..." aria-label="No Phone" aria-describedby="basic-addon1"
                                name="no_phone" value="{{ old('no_phone', $userData[0]->no_phone) }}">
                            @error('no_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <span
                            class="fs-5 @error('photo_profile')
                            mt-3
                        @enderror"
                            id="basic-addon1">Photo Profile : </span>
                        <input type="hidden" name="oldImage" value="{{ $userData[0]->photo_profile }}">
                        @if ($userData[0]->photo_profile)
                            {{-- <img src="{{ asset('storage/' . $userData[0]->photo_profile) }}" alt=""
                                style="width: 200px;" class="d-block mb-3"> --}}
                            @if (auth()->user()->photo_profile == 'photoprofile/user.png')
                                <img src="assets/img/user.png" style="width: 200px;" class="d-block mb-3" alt="">
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->photo_profile) }}" style="width: 200px;"
                                    class="d-block mb-3" alt="">
                            @endif
                        @else
                            <img src="" alt="">
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text fs-5" id="basic-addon1">New Photo Profile</span>
                            <input id="photo_profile" type="file"
                                class="form-control fs-5 @error('photo_profile')
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
                        {{-- <div class="input-group mb-3">
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
                        </div> --}}
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
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary fs-5"
                        onclick="return confirm('Are you sure you want to edit profile?')">Edit Profile</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Changes Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/editpassworduser" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="" name="id_user" value="{{ $userData[0]->id }}">
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
                    <button onclick="return confirm('Are you sure you want to edit password?')" type="submit"
                        class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
