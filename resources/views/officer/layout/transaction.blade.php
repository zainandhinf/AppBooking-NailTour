@extends('officer.main')

@section('content')
    <div class="table-responsive mt-2">
        {{-- <h1>{{ $transaction[0]->no_trans_head }}</h1>
        <h3>Offer Officer</h3> --}}
        <a type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#offer">
            {{-- <i class="fa-solid fa-pen-to-square"></i> --}}
            <span>Add Offer</span>
        </a>
        <a type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#offeruser">
            <span>Offer User</span>
        </a>
        <a type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#proof">
            <span>Proof Of Payment</span>
        </a>
        <table class="table table-striped" style="width:100%" id="data-tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Description</th>
                    {{-- <th>Image</th> --}}
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
                $no = 1;
                $id = auth()->user()->id;
                // dd($transaction[0]->id_head);
                $offerDatas1 = DB::table('offers')
                    ->select('*')
                    ->where('user_id', '=', $id)
                    ->where('transaction_id', '=', $transaction[0]->id_head)
                    ->get();
            @endphp
            @foreach ($offerDatas1 as $offerData)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    {{-- <td>{{ $province->id }}</td> --}}
                    <td>{{ $offerData->description }}</td>
                    {{-- <td>{{ $offerData->image_id }}</td> --}}
                    <td><a href="{{ asset('storage/' . $offerData->file) }}"
                            target="_blank">{{ basename($offerData->file) }}</a></td>
                    {{-- <td><a href="{{ url('' . $offerData->file) }}">Nama File</a></td> --}}
                    {{-- <td>{{ $offerData->file }}</td> --}}
                    <td>
                        <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#offeredit{{ $offerData->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/deleteoffer" class="d-flex d-inline mt-1" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" id="" name="id_offer" value="{{ $offerData->id }}">
                            <button class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete booking?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        {{-- <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $users->id }}"
                            onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger"><i
                                class="fa-solid fa-trash"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </table>
        <hr>
        {{-- <h3>Offer User</h3> --}}

    </div>

    {{-- edit --}}
    {{-- @foreach ($offerDatas as $offerData) --}}
    <!-- Modal -->
    <div class="modal fade" id="offer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Offer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/addoffer" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" id="" name="id_provinces" value="{{ $offerData->id }}"> --}}
                        {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Description</span>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                                    description="description">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                        <input type="hidden" name="transaction_id" value="{{ $transaction[0]->id_head }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="no_trans" value="{{ $transaction[0]->no_trans_head }}">
                        <div class="form-floating mb-3">
                            <textarea
                                class="form-control @error('description')
                                is-invalid
                                @enderror"
                                placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 100px" required></textarea>
                            <label for="floatingTextarea2">Description</label>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <span class="@error('file')
                            mt-3
                        @enderror"
                            id="basic-addon1">File : </span>
                        <div class="input-group mb-3">
                            {{-- <img class="img-preview img-fluid"> --}}
                            <input id="file" type="file"
                                class="form-control @error('file')
                            is-invalid
                        @enderror @error('file')
                        mt-3
                    @enderror"
                                placeholder=" Choose file..." aria-label="file" aria-describedby="basic-addon1"
                                name="file" required>
                            @error('file')
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

    <div class="modal fade modal-lg" id="offeruser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Offer User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" style="width:100%" id="data-tables-2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Description</th>
                                {{-- <th>Image</th>
                                <th>File</th> --}}
                                <th>Date</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;
                            $offerDatas = DB::table('offers')
                                ->select('*')
                                ->where('transaction_id', '=', $transaction[0]->id_head)
                                ->where('user_id', '=', $transaction[0]->id_user_detail)
                                ->get();
                        @endphp
                        @foreach ($offerDatas as $offerData)
                            <tr>
                                <td scope="row">{{ $no++ }}</td>
                                {{-- <td>{{ $province->id }}</td> --}}
                                <td>{{ $offerData->description }}</td>
                                <td>{{ $offerData->date }}</td>
                                {{-- <td>{{ $offerData->image_id }}</td>
                                <td>{{ $offerData->file }}</td> --}}
                                {{-- <td> --}}
                                {{-- <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#offer{{ $offerData->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Add Offer</span>
                                    </a> --}}
                                {{-- <form action="/deleteoffer" class="d-flex d-inline" method="POST">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" id="" name="id_transaction" value="{{ $offerData->id }}">
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete booking?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form> --}}
                                {{-- <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $users->id }}"
                                        onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></a> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="modal fade" id="proof" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Proof Of Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @php
                        $no = 1;
                        $id = auth()->user()->id;
                        // dd($transaction[0]->id_head);
                        $offerDatas3 = DB::table('offers')
                            ->select('*')
                            ->where('user_id', '=', $id)
                            ->where('transaction_id', '=', $transaction[0]->id_head)
                            ->get();
                    @endphp
                    {{-- {{ $transaction[0]->proof }} --}}
                    <img src="{{ asset('storage/' . $transaction[0]->proof) }}" alt="" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $no = 1;
        $id = auth()->user()->id;
        // dd($transaction[0]->id_head);
        $offerDatas2 = DB::table('offers')
            ->select('*')
            ->where('user_id', '=', $id)
            ->where('transaction_id', '=', $transaction[0]->id_head)
            ->get();
    @endphp
    @foreach ($offerDatas2 as $offerData2)
        <div class="modal fade" id="offeredit{{ $offerData2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Offer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/editoffer" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <input type="hidden" id="" name="id_provinces" value="{{ $offerData->id }}"> --}}
                            {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Description</span>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                                    description="description">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <input type="hidden" name="transaction_id" value="{{ $transaction[0]->id_head }}">
                            <input type="hidden" name="offer_id" value="{{ $offerData2->id }}">
                            <input type="hidden" name="oldFile" value="{{ $offerData2->file }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="no_trans" value="{{ $transaction[0]->no_trans_head }}">
                            <div class="form-floating mb-3">
                                <textarea
                                    class="form-control @error('description')
                                is-invalid
                                @enderror"
                                    placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 100px" required>{{ old('description', $offerData2->description) }}</textarea>
                                <label for="floatingTextarea2">Description</label>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <span class="@error('file')
                            mt-3
                        @enderror"
                                id="basic-addon1">New File : </span>
                            <div class="input-group mb-3">
                                {{-- <img class="img-preview img-fluid"> --}}
                                <input id="file" type="file"
                                    class="form-control @error('file')
                            is-invalid
                        @enderror @error('file')
                        mt-3
                    @enderror"
                                    placeholder=" Choose file..." aria-label="file" aria-describedby="basic-addon1"
                                    name="file">
                                @error('file')
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
    {{-- @endforeach --}}
    {{-- end edit --}}



    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable();
        });
        $(document).ready(function() {
            $('#data-tables-2').DataTable();
        });
    </script>
@endsection
