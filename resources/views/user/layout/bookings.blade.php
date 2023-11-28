@extends('user.main')

@section('content')
    <section class="home" id="home">
        <div class="content">
            <div class="shop-custom">
                <div class="link-head">
                    <a href="#">Bookings</a>
                    <span></span>
                    <a href="/deals">Deal</a>
                </div>
                @php
                    $no = 1;
                    // $id = auth()->user()->id;
                    // dd($transaction[0]->id_head);
                    $transactionsData = DB::table('head_transactions')
                        ->select('head_transactions.id', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.status', 'head_transactions.date as date_tour')
                        // ->where('user_id', '=', $id)
                        ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
                        ->join('users', 'detail_transactions.id_user', '=', 'users.id')
                        ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
                        ->where('status', '=', 'On Process')
                        ->get();
                @endphp
                <h3 class="text-center">On Process</h3>
                <hr>
                @if ($transactionsData->isEmpty())
                    <h3 class="text-center">You Don't Have A Bookings</h3>
                @else
                    @foreach ($transactionsData as $transaction)
                        <div class="box-custom">
                            <img src="{{ asset('storage/' . $transaction->main_image) }}">
                            <div class="content-custom">
                                <h3>{{ $transaction->title }}</h3>
                                <h4>Name Client : {{ $transaction->name }}</h4>
                                <p>Status : {{ $transaction->status }}</p>
                                <p class="unit-custom">Adult Quantity: {{ $transaction->adult_qty }}</p>
                                <p class="unit-custom">Child Quantity: {{ $transaction->child_qty }}</p>
                                <a class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                            </div>
                            <a href="/booking/{{ $transaction->no_trans }}" class="btn btn-primary btn-preview-booking"
                                style="height: 30px"><i class="fa-solid fa-eye"
                                    style="font-size: 20px; color: #fff"></i></a>
                        </div>
                    @endforeach
                @endif
                <br>
                <br>
                <br>
                <br>
                <br>
                @php
                    $no = 1;
                    // $id = auth()->user()->id;
                    // dd($transaction[0]->id_head);
                    $transactionsData = DB::table('head_transactions')
                        ->select('head_transactions.id', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.status', 'head_transactions.date as date_tour')
                        // ->where('user_id', '=', $id)
                        ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
                        ->join('users', 'detail_transactions.id_user', '=', 'users.id')
                        ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
                        ->where('status', '=', 'Offer')
                        ->get();
                @endphp
                <h3 class="text-center">Offer</h3>
                <hr>
                @if ($transactionsData->isEmpty())
                    <h3 class="text-center">You Don't Have A Bookings</h3>
                @else
                    @foreach ($transactionsData as $transaction)
                        <div class="box-custom">
                            <img src="{{ asset('storage/' . $transaction->main_image) }}">
                            <div class="content-custom">
                                <h3>{{ $transaction->title }}</h3>
                                <h4>Name Client : {{ $transaction->name }}</h4>
                                <p>Status : {{ $transaction->status }}</p>
                                <p class="unit-custom">Adult Quantity: {{ $transaction->adult_qty }}</p>
                                <p class="unit-custom">Child Quantity: {{ $transaction->child_qty }}</p>
                                <a class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                            </div>
                            <a href="/booking/{{ $transaction->no_trans }}" class="btn btn-primary btn-preview-booking"
                                style="height: 30px"><i class="fa-solid fa-eye"
                                    style="font-size: 20px; color: #fff"></i></a>
                        </div>
                    @endforeach
                @endif
                {{-- <div class="box-custom">
                    <img src="2.jpg">
                    <div class="content-custom">
                        <h3>Man's Watches</h3>
                        <h4>Price: $40</h4>
                        <p class="unit-custom">Quantity: <input name="" value="1"></p>
                        <p class="btn-area-custom"><i aria-hidden="true" class="fa fa-trash"></i> <span
                                class="btn2">Remove</span></p>
                    </div>
                </div>
                <div class="box-custom">
                    <img src="3.jpg">
                    <div class="content-custom">
                        <h3>Samsung Mobile</h3>
                        <h4>Price: $250</h4>
                        <p class="unit-custom">Quantity: <input name="" value="0"></p>
                        <p class="btn-area-custom"><i aria-hidden="true" class="fa fa-trash"></i> <span
                                class="btn2">Remove</span></p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
