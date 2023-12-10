@extends('admin.main')

@section('content')
    {{-- tabel --}}
    @if (session()->has('success'))
        <div class="alert alert-success mt-1 mb-1" role="alert">
            {{ session('success') }}
        </div>
    @endif

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
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($transactions as $transaction)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    {{-- <td>{{ $province->id }}</td> --}}
                    <td>{{ $transaction->no_trans }}</td>
                    <td>{{ $transaction->date_head }}</td>
                    <td>{{ $transaction->username }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->id_catalog_detail }}</td>
                    <td>{{ $transaction->date1 }} until {{ $transaction->date2 }}</td>
                    <td>{{ $transaction->adult_qty }}</td>
                    <td>{{ $transaction->child_qty }}</td>
                    <td>{{ $transaction->transportation }}</td>
                    <td>Rp. {{ number_format($transaction->total_payment, 0, ',', '.') }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>
                        <a href="/admin-transactions/{{ $transaction->no_trans }}" type="button" class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        {{-- <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1{{ $transaction->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a> --}}
                        {{-- <form action="/acceptbooking" class="d-flex d-inline" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="" name="id_transaction" value="{{ $transaction->id_head }}">
                            <button class="btn btn-success"
                                onclick="return confirm('Are you sure you want to accept booking?')">
                                <i class="fa-solid fa-check"></i>
                                <span class="ms-2 d-inline">Accept Booking</span>
                            </button>
                        </form> --}}
                        {{-- <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $users->id }}"
                            onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger"><i
                                class="fa-solid fa-trash"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{-- end tabel --}}



    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable();
        });
    </script>
@endsection
