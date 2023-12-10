<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proof Transaction</title>
    <style>
        html {
            font-size: 50%;
        }

        /* h1 {
            text-align: center;
        } */

        /* DataTables Styling */
        #data-tables {
            width: 100%;
            margin-top: 1em;
            border-collapse: collapse;
        }

        #data-tables th,
        #data-tables td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #data-tables th {
            background-color: #f2f2f2;
        }

        #data-tables tbody tr:hover {
            background-color: #f5f5f5;
        }

        /* Optional: Add styling for odd and even rows */
        #data-tables tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        #data-tables tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Optional: Style the header cells */
        #data-tables th {
            background-color: #4CAF50;
            color: white;
        }

        /* Optional: Style for No column */
        #data-tables td:first-child {
            text-align: center;
        }

        .head {
            display: flex;
            /* background-color: #4CAF50; */
        }

        .no_trans {
            /* background-color: aqua; */
            position: absolute;
            top: 0px;
            right: 0px;
        }
    </style>
</head>

<body>
    @php
        $imagePath = public_path('assets/img/logonailtour.png');
    @endphp
    <div class="head">
        <div>
            <h1>Proof of Booking</h1>
            <h3>NailTour</h3>
            <p>Sidorejo RT.02 RW.04 Kajoran Klaten Selatan Kabupaten Klaten 57426</p>
        </div>
        <div class="no_trans">
            @foreach ($data as $data2)
                <p>No Trans : {{ $data2->no_trans }}</p>
            @endforeach
        </div>
    </div>
    <hr>
    {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents($imagePath)) }}" alt=""> --}}
    {{-- <img src="../assets/img/logonailtour.png" alt=""> --}}
    <h3>Detail Transaction</h3>
    <table class="display" id="data-tables">
        <thead>
            <tr>
                <th>No</th>
                {{-- <th>No Transaction</th> --}}
                <th>Date Transaction</th>
                <th>Name User</th>
                <th>Client Name</th>
                {{-- <th>Id Catalog</th> --}}
                <th>Tour Date</th>
                <th>Adult Qty</th>
                <th>Child Qty</th>
                <th>Transportation</th>
                <th>Status</th>
                <th>Payment</th>
            </tr>
        </thead>
        @php
            $no = 1;
            // $transaction = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
            //     ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            //     ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            //     ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            //     ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            //     ->where('head_transactions.status', '=', 'Deals')
            //     ->get();
        @endphp
        <tbody>
            @foreach ($data as $data1)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    {{-- <td>{{ $province->id }}</td> --}}
                    {{-- <td>{{ $data1->no_trans }}</td> --}}
                    <td>{{ $data1->date_head }}</td>
                    <td>{{ $data1->username }}</td>
                    <td>{{ $data1->name }}</td>
                    {{-- <td>{{ $data1->id_catalog_detail }}</td> --}}
                    <td>{{ $data1->date1 }} until {{ $data1->date2 }}</td>
                    <td>{{ $data1->adult_qty }}</td>
                    <td>{{ $data1->child_qty }}</td>
                    <td>{{ $data1->transportation }}</td>
                    <td>Deal</td>
                    <td>Finished</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="9">Total Payment</th>
                <th>Rp. {{ number_format($data1->total_payment, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>
