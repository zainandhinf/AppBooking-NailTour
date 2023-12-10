@extends('officer.main')

@section('content')
    {{-- <button id="check-all" onclick="toggleCheckAll()" class="btn btn-success check-all">Check All</button> --}}
    <a type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#reports">
        {{-- <i class="fa-solid fa-pen-to-square"></i> --}}
        <span>Print Reports</span>
    </a>
    {{-- tabel --}}

    <div class="table-responsive mt-2">
        <table class="table table-striped" style="width:100%" id="data-tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaction</th>
                    <th>Date Transaction</th>
                    <th>Name User</th>
                    <th>Client Name</th>
                    <th>Id Catalog</th>
                    <th>Tour Date</th>
                    <th>Adult Qty</th>
                    <th>Child Qty</th>
                    <th>Transportation</th>
                    <th>Total Payment</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($transactions4 as $transaction4)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    {{-- <td>{{ $province->id }}</td> --}}
                    <td>{{ $transaction4->no_trans }}</td>
                    <td>{{ $transaction4->date_head }}</td>
                    <td>{{ $transaction4->username }}</td>
                    <td>{{ $transaction4->name }}</td>
                    <td>{{ $transaction4->id_catalog_detail }}</td>
                    <td>{{ $transaction4->date1 }} until {{ $transaction4->date2 }}</td>
                    <td>{{ $transaction4->adult_qty }}</td>
                    <td>{{ $transaction4->child_qty }}</td>
                    <td>{{ $transaction4->transportation }}</td>
                    <td>Rp. {{ number_format($transaction4->total_payment, 0, ',', '.') }}</td>
                    <td>
                        {{-- <a href="/officer-transactions/{{ $transaction4->no_trans }}" type="button"
                            class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a> --}}
                        <a href="/print-report/{{ $transaction4->no_trans }}" type="button" class="btn btn-primary mt-1"
                            target="_blank">
                            <i class="fa-solid fa-print"></i>
                        </a>
                        {{-- <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1{{ $transaction2->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a> --}}
                        {{-- <form action="/acceptpayment" class="d-flex d-inline mt-1" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="" name="id_transaction"
                                value="{{ $transaction4->id_head }}">
                            <button class="btn btn-success"
                                onclick="return confirm('Are you sure you want to accept payment?')">
                                <i class="fa-solid fa-check"></i>
                                <span class="ms-2 d-inline">Accept Payment</span>
                            </button>
                        </form> --}}
                        {{-- <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $users->id }}"
                            onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger"><i
                                class="fa-solid fa-trash"></i></a> --}}
                        {{-- <input class="form-check-input mt-0 checkbox" type="checkbox" value=""
                            aria-label="Checkbox for following text input"> --}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{-- end tabel --}}

    <div class="modal fade" id="reports" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Print Reports</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/print-reports" method="POST" enctype="multipart/form-data" target="_blank">
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
                        {{-- <input type="hidden" name="transaction_id" value="{{ $transaction[0]->id_head }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="no_trans" value="{{ $transaction[0]->no_trans_head }}"> --}}
                        {{-- <div class="form-floating mb-3">
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
                            <span
                                class="@error('file')
                                mt-3
                            @enderror"
                                id="basic-addon1">File : </span>
                            <div class="input-group mb-3">
                                <img class="img-preview img-fluid">
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
                            </div> --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Date</span>
                            <input type="date"
                                class="form-control @error('date')
                    is-invalid
                @enderror"
                                placeholder="Date..." aria-label="Date" aria-describedby="basic-addon1" name="date"
                                required>
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <p class="mb-3">Until</p>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Date</span>
                            <input type="date"
                                class="form-control @error('date2')
                    is-invalid
                @enderror"
                                placeholder="Date2..." aria-label="Date2" aria-describedby="basic-addon1" name="date2"
                                required>
                            @error('date2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="table-responsive mt-2">
                            <table class="table table-striped" style="width:100%" id="data-tables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Transaction</th>
                                        <th>Date Transaction</th>
                                        <th>Name User</th>
                                        <th>Client Name</th>
                                        <th>Id Catalog</th>
                                        <th>Tour Date</th>
                                        <th>Adult Qty</th>
                                        <th>Child Qty</th>
                                        <th>Transportation</th>
                                        <th>Total Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $transactionsmodal = 0;
                                    $no = 1;
                                @endphp
                                @foreach ($transactionsmodal as $transactionmodal)
                                    <tr>
                                        <td scope="row">{{ $no++ }}</td> --}}
                        {{-- <td>{{ $province->id }}</td> --}}
                        {{-- <td>{{ $transactionmodal->no_trans }}</td>
                                        <td>{{ $transactionmodal->date_head }}</td>
                                        <td>{{ $transactionmodal->username }}</td>
                                        <td>{{ $transactionmodal->name }}</td>
                                        <td>{{ $transactionmodal->id_catalog_detail }}</td>
                                        <td>{{ $transactionmodal->date1 }} until {{ $transactionmodal->date2 }}</td>
                                        <td>{{ $transactionmodal->adult_qty }}</td>
                                        <td>{{ $transactionmodal->child_qty }}</td>
                                        <td>{{ $transactionmodal->transportation }}</td>
                                        <td>{{ $transactionmodal->total_payment }}</td>
                                        <td> --}}
                        {{-- <a href="/officer-transactions/{{ $transaction4->no_trans }}" type="button"
                            class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a> --}}
                        {{-- <a href="/print-report/{{ $transaction4->no_trans }}" type="button"
                                                class="btn btn-primary mt-1" target="_blank">
                                                <i class="fa-solid fa-print"></i>
                                            </a> --}}
                        {{-- <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1{{ $transaction2->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a> --}}
                        {{-- <form action="/acceptpayment" class="d-flex d-inline mt-1" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="" name="id_transaction"
                                value="{{ $transaction4->id_head }}">
                            <button class="btn btn-success"
                                onclick="return confirm('Are you sure you want to accept payment?')">
                                <i class="fa-solid fa-check"></i>
                                <span class="ms-2 d-inline">Accept Payment</span>
                            </button>
                        </form> --}}
                        {{-- <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $users->id }}"
                            onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger"><i
                                class="fa-solid fa-trash"></i></a> --}}
                        {{-- <input class="form-check-input mt-0 checkbox" type="checkbox" value=""
                            aria-label="Checkbox for following text input"> --}}
                        {{-- </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Print</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable();
        });

        // function toggleCheckAll() {
        //     console.log("jajaja");
        //     $(".checkbox").prop('checked', $("#check-all").prop('checked'));
        // }
    </script>
@endsection
