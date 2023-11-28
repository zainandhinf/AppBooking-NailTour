<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HeadTransaction;
use App\Models\Transportation;
use App\Models\Offer;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class OfficerController extends Controller
{
    public function index()
    {
        return view(
            'officer.main',
            [
                "title" => "Dashboard"

            ]
        );
    }

    public function dashboard()
    {
        return view(
            'officer.layout.dashboard',
            [
                "title" => "Dashboard"

            ]
        );
    }

    public function transactions()
    {
        // ddd($no_trans);
        $transaction1 = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.status', '=', 'On Process')
            ->get();
        $transaction2 = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.status', '=', 'Offer')
            ->get();
        $transaction3 = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.status', '=', 'Waiting Payments')
            ->get();
        $transaction4 = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.status', '=', 'Deals')
            ->get();
        // ddd($transaction[0]->no_trans);
        return view(
            'officer.layout.transactions',
            [
                'title' => "Transaction",
                "transactions1" => $transaction1,
                "transactions2" => $transaction2,
                "transactions3" => $transaction3,
                "transactions4" => $transaction4,
                'transportations' => Transportation::all()
                // "user" => User::all()
            ]
        );
    }

    public function acceptbooking(Request $request, HeadTransaction $headTransaction)
    {
        // dd($request->input('id_transaction'));
        $validatedData['status'] = "Offer";

        DB::table('head_transactions')
            ->where('id', $request->input('id_transaction'))
            ->update($validatedData);
        $request->session()->flash('success', 'Booking has been accepted!');
        return redirect('/officer-transactions');
    }

    public function acceptpayment(Request $request, HeadTransaction $headTransaction)
    {
        // dd($request->input('id_transaction'));
        $validatedData['status'] = "Deals";

        DB::table('head_transactions')
            ->where('id', $request->input('id_transaction'))
            ->update($validatedData);
        $request->session()->flash('success', 'Payment has been accepted!');
        return redirect('/officer-transactions');
    }

    public function transaction($no_trans)
    {
        // ddd($no_trans);

        $transaction = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans as no_trans_head', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation', 'detail_transactions.proof')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.no_trans', '=', $no_trans)
            ->get();
        // ddd($transaction[0]->no_trans);
        return view(
            'officer.layout.transaction',
            [
                'title' => "Transaction",
                "transaction" => $transaction,
                'transportations' => Transportation::all()
                // "user" => User::all()
            ]
        );
    }

    public function addoffer(Request $request)
    {
        // dd($request);
        // $validatedData = $request->validate([
        //     'description' => 'required|max:255',
        //     'file' => 'required'
        // ]);

        // Offer::create($validatedData);

        // $request->session()->flash('success', 'New city has been added!');

        // return redirect('/admin-city');

        // Validasi formulir
        $validatedData = $request->validate([
            'description' => 'required|string',
            'file' => 'file|max:10240'
        ]);

        $today = now()->format('Y-m-d');


        $validatedData['file'] = $request->file('file')->store('fileoffer');
        $validatedData['transaction_id'] = $request->input('transaction_id');
        $validatedData['user_id'] = $request->input('user_id');
        $validatedData['date'] = $today;

        Offer::create($validatedData);
        // Ambil data file
        // $file = $request->file('file');
        // $binaryData = file_get_contents($file->getRealPath());

        // Simpan data ke database
        // Offer::create([
        //     'description' => $request->input('description'),
        //     'file' => $binaryData,
        //     'transaction_id' => $request->input('transaction_id'), // Sesuaikan dengan kolom lain yang diperlukan
        //     'user_id' => $request->input('user_id'), // Sesuaikan dengan kolom lain yang diperlukan
        // ]);

        $slug = $request->input('no_trans');

        $request->session()->flash('success', 'Offer added successfully!');

        return redirect(url('/officer-transactions/' . $slug));

        // return redirect('/')->with('success', 'Offer added successfully');
    }

    public function editoffer(Request $request, Offer $offer)
    {

        $rules = [
            'description' => 'required|string',
            'file' => 'file|max:10240'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('file')) {
            if ($request->file) {
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('fileoffer');
        }

        $slug = $request->input('no_trans');

        DB::table('offers')
            ->where('id', $request->input('offer_id'))
            ->update($validatedData);
        $request->session()->flash('success', 'Offer has been editted!');
        return redirect(url('/officer-transactions/' . $slug));
    }

    public function deleteoffer(Request $request, Offer $offer)
    {
        $files = DB::table('offers')
            ->select('file')
            ->where('id', '=', $request->input('id_offer'))
            ->get();
        $file = $files->first();
        $mainfile = $file->file;
        // ddd($mainImage);
        if ($mainfile) {
            Storage::delete($mainfile);
        }

        $slug = $request->input('no_trans');

        // User::destroy($user->id);
        DB::table('offers')->where('id', $request->input('id_offer'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'Offer has been deleted!');
        return redirect(url('/officer-transactions/' . $slug));
    }

    public function reports()
    {
        // ddd($no_trans);
        // $transaction1 = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
        //     ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
        //     ->join('users', 'detail_transactions.id_user', '=', 'users.id')
        //     ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
        //     ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
        //     ->where('head_transactions.status', '=', 'On Process')
        //     ->get();
        // $transaction2 = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
        //     ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
        //     ->join('users', 'detail_transactions.id_user', '=', 'users.id')
        //     ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
        //     ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
        //     ->where('head_transactions.status', '=', 'Offer')
        //     ->get();
        // $transaction3 = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
        //     ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
        //     ->join('users', 'detail_transactions.id_user', '=', 'users.id')
        //     ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
        //     ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
        //     ->where('head_transactions.status', '=', 'Waiting Payments')
        //     ->get();
        $transaction4 = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.status', '=', 'Deals')
            ->get();
        // ddd($transaction[0]->no_trans);
        return view(
            'officer.layout.reports',
            [
                'title' => "Reports",
                // "transactions1" => $transaction1,
                // "transactions2" => $transaction2,
                // "transactions3" => $transaction3,
                "transactions4" => $transaction4,
                'transportations' => Transportation::all()
                // "user" => User::all()
            ]
        );
    }

    public function printreports(Request $request)
    {
        $data = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status as status_head', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.status', '=', 'Deals')
            // ->whereIn('head_transactions.id', explode(',', $request))
            ->whereBetween('head_transactions.date', [$request->input('date'), $request->input('date2')])
            ->get();
        $pdf = PDF::loadView('officer.layout.reports-pdf', compact('data'));
        // $pdf->addImage('assets/img/logo-nailtour.png', 'L', 0, 0, '50%');
        // $imagePath = public_path('assets/img/logonailtour.png');
        $pdf->setPaper('A6', 'landscape');
        return $pdf->stream('reports-transaction.pdf');

    }   
    public function printreport($no_trans)
    {
        $data = HeadTransaction::select('head_transactions.id as id_head', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'detail_transactions.date as date1', 'detail_transactions.date2 as date2', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.date', 'head_transactions.status as status_head', 'transportations.name as transportation')
            ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
            ->join('users', 'detail_transactions.id_user', '=', 'users.id')
            ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id')
            ->join('transportations', 'detail_transactions.transportation_id', '=', 'transportations.id')
            ->where('head_transactions.no_trans', '=', $no_trans)
            // ->whereIn('head_transactions.id', explode(',', $request))
            // ->whereBetween('head_transactions.date', [$request->input('date'), $request->input('date2')])
            ->get();
        $pdf = PDF::loadView('officer.layout.reports-pdf', compact('data'));
        // $pdf->addImage('assets/img/logo-nailtour.png', 'L', 0, 0, '50%');
        // $imagePath = public_path('assets/img/logonailtour.png');
        $pdf->setPaper('A6', 'landscape');
        return $pdf->stream('reports-transaction.pdf');

    }

}