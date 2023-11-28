<!-- navbar sectio  ns starts  -->
<header class="header z-1">
    <div class="logo">
        {{-- <img src="assets/user/images/logo-bookmark.svg" alt="logo-bookmark"> --}}
        <h1>NailTour</h1>
    </div>

    <nav class="navbar">
        <a href="/home">Home</a>
        <a href="/catalogs">Catalogs</a>
        <a href="#download">About</a>
        <a href="#footer">Contact</a>
        <a href="#" class="btn">Acount</a>
        {{-- <a href="/bookings" style="font-size: 20px;" class="booking"><i class="fa-solid fa-calendar-days"></i></a> --}}
        @php
            // $bookings = DB::table('detail_transactions')
            //     ->join()
            //     ->where('id_user', '=', auth()->user()->id)
            //     ->count();
            // $bookings = DB::table('head_transactions')
            //     ->select('*')
            //     ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            //     ->where('head_transactions.status', '=', 'On Process')
            //     ->where('head_transactions.status', '=', 'Offer')
            //     ->where('detail_transactions.id_user', '=', auth()->user()->id)
            //     ->get();
            $bookings = DB::table('head_transactions')
                ->select('*')
                ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
                ->whereIn('head_transactions.status', ['On Process', 'Offer'])
                ->where('detail_transactions.id_user', '=', auth()->user()->id)
                ->count();
        @endphp
        <a href="/bookings" type="button" class="btn position-relative ps-3 pe-3" id="bookings"
            style="font-size: 16px;">
            <i class="fa-solid fa-calendar-days"></i>
            @if ($bookings == 0)
            @else
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{ $bookings }}
                    <span class="visually-hidden">unread messages</span>
                </span>
            @endif
        </a>
    </nav>
    <div class="fas fa-bars" id="menu-btn"></div>



    {{-- <div style="font-size: 20px;"></i></div> --}}
</header>
<!-- navbar sections starts  -->
