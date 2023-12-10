@extends('admin.main')

@section('content')
    {{-- <div class="card mb-2">
        <div class="card-header p-3 pt-2">
            <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Bookings</p>
                <h4 class="mb-0">281</h4>
            </div>
        </div>

        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
        </div>
    </div> --}}
    {{-- <div class="card-dashboard work-dashboard">
        <div class="img-section-dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" height="77" width="76">
                <path fill-rule="nonzero" fill="#3F9CBB"
                    d="m60.91 71.846 12.314-19.892c3.317-5.36 3.78-13.818-2.31-19.908l-26.36-26.36c-4.457-4.457-12.586-6.843-19.908-2.31L4.753 15.69c-5.4 3.343-6.275 10.854-1.779 15.35a7.773 7.773 0 0 0 7.346 2.035l7.783-1.945a3.947 3.947 0 0 1 3.731 1.033l22.602 22.602c.97.97 1.367 2.4 1.033 3.732l-1.945 7.782a7.775 7.775 0 0 0 2.037 7.349c4.49 4.49 12.003 3.624 15.349-1.782Zm-24.227-46.12-1.891-1.892-1.892 1.892a2.342 2.342 0 0 1-3.312-3.312l1.892-1.892-1.892-1.891a2.342 2.342 0 0 1 3.312-3.312l1.892 1.891 1.891-1.891a2.342 2.342 0 0 1 3.312 3.312l-1.891 1.891 1.891 1.892a2.342 2.342 0 0 1-3.312 3.312Zm14.19 14.19a2.343 2.343 0 1 1 3.315-3.312 2.343 2.343 0 0 1-3.314 3.312Zm0 7.096a2.343 2.343 0 0 1 3.313-3.312 2.343 2.343 0 0 1-3.312 3.312Zm7.096-7.095a2.343 2.343 0 1 1 3.312 0 2.343 2.343 0 0 1-3.312 0Zm0 7.095a2.343 2.343 0 0 1 3.312-3.312 2.343 2.343 0 0 1-3.312 3.312Z">
                </path>
            </svg>
            <i class="fa-solid fa-user" style="font-size:50px; margin-left: 130px"></i>
        </div>
        <div class="card-desc-dashboard">
            <div class="card-header-dashboard">
                <div class="card-title-dashboard">Play</div>
                <div class="card-menu-dashboard">
                    <div class="dot-dashboard"></div>
                    <div class="dot-dashboard"></div>
                    <div class="dot-dashboard"></div>
                </div>
            </div>
            <div class="card-time-dashboard">32hrs</div>
            <p class="recent-dashboard">Last Week-36hrs</p>
        </div>
    </div>
    <div>
        <h1>ini dashboard</h1>
        <table class="display" id="data-tables">
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
    </div> --}}

    @php
        use Illuminate\Support\Carbon;

        $now = Carbon::now();
        $officer = DB::table('users')
            // ->select('count(*)')
            ->where('role', '=', 'officer')
            ->count();
        $officerInMonth = DB::table('users')
            ->where('role', '=', 'officer')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->count();
        $user = DB::table('users')
            // ->select('count(*)')
            ->where('role', '=', 'user')
            ->count();
        $userInMonth = DB::table('users')
            ->where('role', '=', 'user')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->count();
        $catalog = DB::table('catalogs')
            // ->select('count(*)')
            // ->where('role', '=', 'officer')
            ->count();
        $catalogInMonth = DB::table('catalogs')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->count();
        $transaction = DB::table('head_transactions')
            // ->select('count(*)')
            ->count();
        $transactionInMonth = DB::table('head_transactions')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->count();
        // dd($officerInMonth);
    @endphp
    <div class="dashboard-head">
        <div class="card-dashboard card-officer">
            <div>
                <h1>Officer</h1>
                <h2>{{ $officer }}</h2>
                <p>
                    @if ($officerInMonth == 0)
                    @else
                        ↑
                    @endif {{ $officerInMonth }} new officer <br>this month
                </p>
            </div>
            <div class="icon-dashboard">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
        <div class="card-dashboard card-user">
            <div>
                <h1>User</h1>
                <h2>{{ $user }}</h2>
                <p>
                    @if ($userInMonth == 0)
                    @else
                        ↑
                    @endif {{ $userInMonth }} new user <br>this month
                </p>
            </div>
            <div class="icon-dashboard">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
        <div class="card-dashboard card-catalog">
            <div>
                <h1>Catalog</h1>
                <h2>{{ $catalog }}</h2>
                <p>
                    @if ($catalogInMonth == 0)
                    @else
                        ↑
                    @endif {{ $catalogInMonth }} new catalogs <br>this month
                </p>
            </div>
            <div class="icon-dashboard">
                <i class="fa-solid fa-list"></i>
            </div>
        </div>
        <div class="card-dashboard card-transaction">
            <div>
                <h1>Transaction</h1>
                <h2>{{ $transaction }}</h2>
                <p>
                    @if ($transactionInMonth == 0)
                    @else
                        ↑
                    @endif {{ $transactionInMonth }} new transactions <br>this month
                </p>
            </div>
            <div class="icon-dashboard">
                <i class="fa-solid fa-cash-register"></i>
            </div>
        </div>
    </div>
    <div class="ms-2 mt-2 mb-3 d-flex">
        <div class="col-xl-8 col-xxl-9 shadow-sm ">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Monthly Transaction Chart</h5>
                </div>
                <div class="card-body">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-3 ms-2">
            <div class="card full-width">
                <div class="card-header">
                    <h5 class="card-title">Top Selling Catalogs</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-2">
                        <table class="table table-striped full-width" id="top-catalogs-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Total Transactions</th>
                                </tr>
                            </thead>
                            @php
                                $topCatalogs = DB::table('catalogs')
                                    ->select('catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'catalogs.created_at', 'catalogs.updated_at', DB::raw('COUNT(detail_transactions.id_catalog) as total_transactions'))
                                    ->join('detail_transactions', 'catalogs.id', '=', 'detail_transactions.id_catalog')
                                    ->groupBy('catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'catalogs.created_at', 'catalogs.updated_at')
                                    ->orderByDesc('total_transactions')
                                    ->take(5)
                                    ->get();
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($topCatalogs as $catalog)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $catalog->title }}</td>
                                        <td>{{ $catalog->total_transactions }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ms-2">
        <div class="col-xl-4 col-xxl-12 shadow-sm">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Recent Transactions</h5>
                </div>
                <div class="card-body">
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
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                                $transactions = DB::table('head_transactions')
                                    ->select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation', 'head_transactions.total_payment', 'head_transactions.status')
                                    ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
                                    ->join('users', 'detail_transactions.id_user', '=', 'users.id')
                                    ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
                                    ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
                                    ->latest('head_transactions.created_at')
                                    ->take(5)
                                    ->get();
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
                                    <td>Rp. {{ $transaction->total_payment }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    {{-- <td>
                                        <a href="/admin-transactions/{{ $transaction->no_trans }}" type="button"
                                            class="btn btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a> --}}
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
                                    {{-- </td> --}}
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    <script>
        $(document).ready(function() {
            $('#data-tables').DataTable();
        });
    </script>
@endsection
