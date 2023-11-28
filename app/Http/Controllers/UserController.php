<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use App\Models\ViewCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catalog;
use App\Models\ImageCatalog;
use App\Models\HeadTransaction;
use App\Models\DetailTransactions;
use App\Models\Transportation;
use App\Models\Offer;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

// use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function home()
    {
        return view(
            'user.layout.home',
            [
                'title' => "Home",
                // "user" => User::all()

            ]
        );
    }

    public function catalogs()
    {
        return view(
            'user.layout.catalog',
            [
                'title' => "Catalogs",
                'catalogs' => Catalog::all()
            ]
        );
    }

    public function preview($slug)
    {
        return view(
            'user.layout.preview',
            [
                'title' => "Catalog",
                // "user" => User::all()
                'catalog' => Catalog::find($slug),
                'transportations' => Transportation::all()
            ]
        );
    }

    public function createbooking(Request $request)
    {
        $data = DB::table('head_transactions')->select(DB::raw('RIGHT(no_trans, 4) + 1 as noUrut'))
            ->orderBy('no_trans', 'DESC')->limit(1)->get();

        $today = now()->format('Ymd');
        $today2 = now()->format('Y-m-d');
        $noTrans = "";

        if (!$data->isEmpty()) {
            $noUrut = $data[0]->noUrut;
            $floatValue = floatval($noUrut);
        }

        if ($data->isEmpty()) {
            $noTrans = $today . "0001";
        } else {
            // $noTrans = $today . str_pad($noUrut, 4, '0', STR_PAD_LEFT);
            if ($noUrut < 10) {
                $noTrans = $today . "000" . $noUrut;
            } else if ($noUrut < 100) {
                $noTrans = $today . "00" . $noUrut;
            } else if ($noUrut < 1000) {
                $noTrans = $today . "0" . $noUrut;
            } else if ($noUrut < 10000) {
                $noTrans = $today . $noUrut;
            } else {
                $noTrans = $today . "0001";
            }
        }

        // ddd($noTrans);
        $validatedDataHead['no_trans'] = $noTrans;
        $validatedDataHead['date'] = $today2;
        $validatedDataHead['status'] = "On Process";


        $result = DB::table('head_transactions')
            ->select('*')
            ->get();

        if (!$result->isEmpty()) {
            // $result = DB::table('head_transactions')
            //     ->select('*')
            //     ->groupBy('created_at')
            //     ->orderByDesc('created_at')
            //     ->limit(1)
            //     ->get();
            // $result = DB::table('head_transactions')
            //     ->groupBy('created_at')
            //     ->orderBy('created_at', 'desc')
            //     ->limit(1)
            //     ->get();
            $result = DB::table('head_transactions')
                ->groupBy('created_at')
                ->select('created_at', DB::raw('MAX(id) as id'))
                ->orderBy('created_at', 'desc')
                ->get();
        }

        if ($result->isEmpty()) {
            $validatedDataDetail['head_transaction_id'] = 1;
        } else {
            $validatedDataDetail['head_transaction_id'] = $result[0]->id + 1;
        }

        $validatedDataDetail['no_trans'] = $noTrans;
        $validatedDataDetail['id_user'] = $request->input('id_user');
        $validatedDataDetail['name'] = $request->input('name');
        $validatedDataDetail['id_catalog'] = $request->input('id_catalog');
        $validatedDataDetail['date'] = $request->input('date');
        $validatedDataDetail['date2'] = $request->input('date2');
        $validatedDataDetail['adult_qty'] = $request->input('qty');
        $validatedDataDetail['child_qty'] = $request->input('qty2');
        $validatedDataDetail['transportation_id'] = $request->input('transportation');

        $validatedDataOffer['description'] = "make the first offer";
        $validatedDataOffer['transaction_id'] = $validatedDataDetail['head_transaction_id'];
        $validatedDataOffer['user_id'] = $request->input('id_user');
        $validatedDataOffer['date'] = $today2;

        // dd($validatedDataDetail['transportation_id']);

        $slug = $request->input('slug');

        HeadTransaction::create($validatedDataHead);
        DetailTransactions::create($validatedDataDetail);
        Offer::create($validatedDataOffer);
        // dd($today2);
        // $validatedDataHead = $request->validate([
        //     'name' => 'required|max:255',
        //     'provinces_id' => 'required'
        // ]);


        // City::create($validatedData);

        $request->session()->flash('success', 'Booking has been added!');

        return redirect(url('/catalog/' . $slug));

        // return redirect()->route('/catalog/' . ['slug' => $slug]);

        // return redirect('/catalog/{{ $slug }}');
    }

    public function updatebooking(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required',
            'date2' => 'required',
            'adult_qty' => 'required',
            'child_qty' => 'required',
            'transportation_id' => 'required',
        ]);

        $no_trans = $request->input('no_trans');

        DB::table('detail_transactions')
            ->where('id', $request->input('id_booking'))
            ->update($validatedData);
        // dd($today2);
        // $validatedDataHead = $request->validate([
        //     'name' => 'required|max:255',
        //     'provinces_id' => 'required'
        // ]);


        // City::create($validatedData);

        $request->session()->flash('success', 'Booking has been editted!');

        return redirect(url('/booking/' . $no_trans));

        // return redirect()->route('/catalog/' . ['slug' => $slug]);

        // return redirect('/catalog/{{ $slug }}');
    }

    public function bookings()
    {
        // $transaction = HeadTransaction::select('head_transactions.id', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.status', 'head_transactions.date as date_tour')
        //     ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
        //     ->join('users', 'detail_transactions.id_user', '=', 'users.id')
        //     ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id');
        $transaction = ViewCart::all();
        return view(
            'user.layout.bookings',
            [
                'title' => "Booking",
                "transactions" => $transaction
                // "user" => User::all()
            ]
        );
    }

    public function booking($no_trans)
    {
        // ddd($no_trans);
        $transaction = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans as no_trans_head', 'head_transactions.date as date_head', 'head_transactions.status as status_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.no_trans', '=', $no_trans)
            ->get();
        // ddd($transaction[0]->no_trans);
        return view(
            'user.layout.booking',
            [
                'title' => "Booking",
                "transaction" => $transaction,
                'transportations' => Transportation::all(),
                'payments' => Payment::all()
                // "user" => User::all()
            ]
        );
    }

    public function deals()
    {
        $transaction = HeadTransaction::select('head_transactions.id', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id');
        return view(
            'user.layout.deals',
            [
                'title' => "Deals",
                "transactions" => $transaction->get()
                // "user" => User::all()
            ]
        );
    }

    public function deal($no_trans)
    {
        // ddd($no_trans);
        $transaction = HeadTransaction::select('head_transactions.id', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.qty as qty_head', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'detail_transactions.qty')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->where('head_transactions.no_trans', '=', $no_trans)
            ->get();
        // ddd($transaction[0]->no_trans);
        return view(
            'user.layout.deal',
            [
                'title' => "Booking",
                "transaction" => $transaction
                // "user" => User::all()
            ]
        );
    }

    public function addpaymentuser(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'payment_id' => 'required'
        ]);

        $validatedDataHead['status'] = "Waiting Payments";

        DB::table('detail_transactions')
            ->where('id', $request->input('transaction_id'))
            ->update($validatedData);

        DB::table('head_transactions')
            ->where('id', $request->input('transaction_id'))
            ->update($validatedDataHead);

        $request->session()->flash('success', 'Payments has been added!');

        return redirect('/bookings');
    }

    public function addproof(Request $request)
    {
        // dd($request);

        if ($request->file('proof')) {
            $validatedData['proof'] = $request->file('proof')->store('imageproof');
        }
        // $validatedDataHead['status'] = "Deals";

        $no_trans = $request->input('no_trans');

        DB::table('detail_transactions')
            ->where('id', $request->input('id_transaction'))
            ->update($validatedData);
        // DB::table('head_transactions')
        //     ->where('id', $request->input('id_transaction'))
        //     ->update($validatedDataHead);
        // dd($today2);
        // $validatedDataHead = $request->validate([
        //     'name' => 'required|max:255',
        //     'provinces_id' => 'required'
        // ]);


        // City::create($validatedData);

        $request->session()->flash('success', 'Proof has been add!');

        // return redirect(url('/booking/' . $no_trans));

        // return redirect()->route('/catalog/' . ['slug' => $slug]);

        return redirect('/deals');
    }

    public function printproof($no_trans)
    {
        $data = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status as status_head', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.no_trans', '=', $no_trans)
            ->get();
        $pdf = PDF::loadView('user.layout.proof-pdf', compact('data'));
        // $pdf->addImage('assets/img/logo-nailtour.png', 'L', 0, 0, '50%');
        // $imagePath = public_path('assets/img/logonailtour.png');
        $pdf->setPaper('A6', 'landscape');
        return $pdf->stream('proof-transaction.pdf');

    }

    public function addoffer(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string'
        ]);

        $today = now()->format('Y-m-d');


        $validatedData['transaction_id'] = $request->input('transaction_id');
        $validatedData['user_id'] = $request->input('user_id');
        $validatedData['date'] = $today;

        Offer::create($validatedData);

        $slug = $request->input('no_trans');
        // dd($slug);

        $request->session()->flash('success', 'Offer added successfully!');

        return redirect(url('/booking/' . $slug));
    }

}