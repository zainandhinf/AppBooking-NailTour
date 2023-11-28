<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Provinces;
use App\Models\City;
use App\Models\Country;
use App\Models\Catalog;
use App\Models\ImageCatalog;
use App\Models\Transportation;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('admin.page.login');
    }

    public function index()
    {
        return view(
            'admin.main',
            [
                "title" => "Dashboard",
                "active" => "z"
            ]
        );
    }

    public function dashboard()
    {
        return view(
            'admin.layout.dashboard',
            [
                "title" => "Dashboard",
                "active" => "data"
            ]
        );
    }

    public function officer()
    {
        return view(
            'admin.layout.officer',
            [
                "title" => "Officer",
                "user" => User::all(),
                "active" => "data"

            ]
        );
    }

    public function UploadOfficer(Request $request)
    {

        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'username' => 'required|max:255|unique:user',
        //     'email' => 'required|email',
        //     'password' => 'required|min:5|max:255'
        // ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);
        // $validatedData['role'] = "Officer";

        // User::create($validatedData);

        // $request->session()->flash('success', 'New officer has been added!');

        // return redirect('officeradmin');

        $data = new User();
        $data->name = $request->input('name');
        $data->username = $request->input('username');
        $data->email = $request->input('email');
        $data->password = $request->input('password');
        $data->role = "officer";
        $data->save();
        $request->session()->flash('success', 'New officer has been added!');
        return redirect('/admin-officer');
    }

    public function UpdateOfficer(Request $request, User $user)
    {
        // $validateData = $request->validate([
        //     'name' => 'required|max:255',
        //     'username' => 'required|max:255|unique:user',
        //     'email' => 'required|email',
        //     'password' => 'required|min:5|max:255'
        // ]);

        // User::where('id', $request->id)
        //     ->update($validateData);

        // return redirect('/officeradmin')->with('succes', 'Data has been updated!');
        // $data = new User();
        // $data->name = $request->input('name');
        // $data->username = $request->input('username');
        // $data->email = $request->input('email');
        // $data->password = $request->input('password');
        // $data->role = "officer";
        // $data->save();
        // $request->session()->flash('success', 'New officer has been added!');    

        DB::table('users')
            ->where('id', $request->input('id_officer'))
            ->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email')
            ]);
        $request->session()->flash('success', 'Officer has been editted!');
        return redirect('/admin-officer');
    }

    public function DeleteOfficer(Request $request, User $user)
    {
        // User::destroy($user->id);
        DB::table('users')->where('id', $request->input('id_officer'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'officer has been deleted!');
        return redirect('/admin-officer');
    }

    public function provinces()
    {
        return view(
            'admin.layout.provinces',
            [
                "title" => "Provinces",
                "provinces" => Provinces::all(),
                "active" => "data"
            ]
        );
    }

    public function UploadProvinces(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Provinces::create($validatedData);

        $request->session()->flash('success', 'New province has been added!');

        return redirect('/admin-provinces');
    }

    public function UpdateProvinces(Request $request, Provinces $provinces)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        DB::table('provinces')
            ->where('id', $request->input('id_provinces'))
            ->update($validatedData);
        $request->session()->flash('success', 'Provinces has been editted!');
        return redirect('/admin-provinces');
    }

    public function DeleteProvinces(Request $request, Provinces $provinces)
    {
        // User::destroy($user->id);
        DB::table('provinces')->where('id', $request->input('id_provinces'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'Provinces has been deleted!');
        return redirect('/admin-provinces');
    }

    public function city()
    {
        $city = City::select('cities.id', 'cities.name', 'cities.id', 'provinces.id as id_provinces', 'provinces.name AS province')
            ->join('provinces', 'provinces.id', '=', 'cities.provinces_id');
        return view(
            'admin.layout.city',
            [
                "title" => "City",
                "citys" => $city->get(),
                "provices" => Provinces::all(),
                "active" => "data"

            ]
        );
    }

    public function UploadCity(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'provinces_id' => 'required'
        ]);

        // dd($validatedData);

        City::create($validatedData);

        $request->session()->flash('success', 'New city has been added!');

        return redirect('/admin-city');
    }

    public function UpdateCity(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'provinces_id' => 'required'
        ]);

        DB::table('cities')
            ->where('id', $request->input('id_city'))
            ->update($validatedData);
        $request->session()->flash('success', 'City has been editted!');
        return redirect('/admin-city');
    }

    public function DeleteCity(Request $request, City $city)
    {
        // User::destroy($user->id);
        DB::table('cities')->where('id', $request->input('id_city'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'City has been deleted!');
        return redirect('/admin-city');
    }

    public function country()
    {
        return view(
            'admin.layout.countries',
            [
                "title" => "Countries",
                "countries" => Country::all(),
                "active" => "data"
            ]
        );
    }

    public function UploadCountries(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Country::create($validatedData);

        $request->session()->flash('success', 'New country has been added!');

        return redirect('/admin-countries');
    }

    public function UpdateCountries(Request $request, Country $country)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        DB::table('countries')
            ->where('id', $request->input('id_countries'))
            ->update($validatedData);
        $request->session()->flash('success', 'Country has been editted!');
        return redirect('/admin-countries');
    }

    public function DeleteCountries(Request $request, Country $country)
    {
        // User::destroy($user->id);
        DB::table('countries')->where('id', $request->input('id_countries'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'Country has been deleted!');
        return redirect('/admin-countries');
    }

    public function catalog()
    {
        $catalogs = Catalog::all();
        $city = City::all();
        $country = Country::all();
        $imageCatalog = ImageCatalog::all();
        // $catalogs = Catalog::select('*')
        //     ->where('categories', '=', 'National');
        return view(
            'admin.layout.catalog',
            [
                "title" => "Catalog",
                "catalogs" => $catalogs,
                'catalogs2' => $catalogs,
                'cities' => $city,
                'countries' => $country,
                'imagecatalogs' => $imageCatalog,
                "active" => "data"
            ]
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Catalog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function checkSlug2(Request $request)
    {
        $slug = SlugService::createSlug(Catalog::class, 'slug', $request->title2);
        return response()->json(['slug2' => $slug]);
    }

    public function checkSlug3(Request $request)
    {
        $slug = SlugService::createSlug(Catalog::class, 'slug', $request->title3);
        return response()->json(['slug3' => $slug]);
    }

    // public function FileShow($filename)
    // {
    //     $path = public_path('imagecatalog/' . $filename);

    //     return response()->file($path);
    // }

    public function uploadimagecatalog(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '_' . $image->getClientOriginalName();
        // dd($imageName);
        $image->move(public_path('imagecatalog'), $imageName);

        $imageUpload = new ImageCatalog();
        $imageUpload->imagefile = $imageName;
        $imageUpload->catalogs_id = $request['id_catalog'];
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }

    public function deleteimagecatalog(Request $request)
    {
        // dd($request->input('id_image'));
        DB::table('image_catalogs')->where('id', $request->input('id_image'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'Image catalog has been deleted!');
        return redirect('/admin-catalog');
        // return response()->json(['success' => $imageName]);
    }

    public function catalog2()
    {
        $catalogs = Catalog::select('*')
            ->where('categories', '=', 'International');
        return view(
            'admin.layout.catalog2',
            [
                "title" => "Catalog",
                "catalogs" => $catalogs->get(),
                'catalogs2' => $catalogs
            ]
        );
    }

    // public function createCatalog()
    // {
    //     return view(
    //         'admin.layout.crud.catalog.create',
    //         [
    //             "title" => "Catalog"
    //         ]
    //     );
    // }

    public function UploadCatalogNational(Request $request)
    {
        // dd($request);
        // return $request->file('main_image')->store('mainimagecatalog');
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:catalogs',
            'location' => 'required',
            'price' => 'required',
            'description' => 'required',
            'main_image' => 'image|file|max:1024' //itu 1024 satuan dari kb atau kilobyte
        ]);

        if ($request->file('main_image')) {
            $validatedData['main_image'] = $request->file('main_image')->store('mainimagecatalog');
        }

        $validatedData['categories'] = "National";

        Catalog::create($validatedData);

        // $firstCatalog = DB::table('catalogs')
        //     ->select('*')
        //     ->groupBy('created_at')
        //     ->orderBy('created_at', 'asc')
        //     ->first();

        // $idCatalog = DB::table('catalogs')
        //     ->select('id')
        //     ->groupBy('created_at')
        //     ->orderByDesc('created_at')
        //     ->limit(1)
        //     ->get();

        // $result = DB::table('catalogs')
        //     ->selectRaw('MAX(id) as id')
        //     ->groupBy('created_at')
        //     ->orderByDesc('created_at')
        //     ->limit(1)
        //     ->get();

        // $id = $result[0]->id;
        // $idCatalog['catalogs_id'] = $id;

        // DB::table('image_catalogs')
        //     ->where('catalogs_id', 0)
        //     ->update($idCatalog);
        // // dd($idCatalog);

        $request->session()->flash('success', 'New catalog has been added!');

        return redirect('/admin-catalog');
    }

    public function UploadCatalogInternational(Request $request)
    {
        // dd($request);
        // dd($request->file('main_image'));
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:catalogs',
            'location' => 'required',
            'price' => 'required',
            'description' => 'required',
            'main_image' => 'image|file|max:1024' //itu 1024 satuan dari kb atau kilobyte
        ]);

        if ($request->file('main_image')) {
            $validatedData['main_image'] = $request->file('main_image')->store('mainimagecatalog');
        }

        $validatedData['categories'] = "International";

        Catalog::create($validatedData);

        $request->session()->flash('success', 'New catalog has been added!');

        return redirect('/admin-catalog');
    }

    public function UpdateCatalog(Request $request, Catalog $catalog)
    {

        $rules = [
            'title' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'main_image' => 'image|file|max:1024' //itu 1024 satuan dari kb atau kilobyte
        ];

        $slugold = DB::table('catalogs')
            ->select('slug')
            ->where('id', '=', $request->input('id_catalog'))
            ->get();

        $slugold2 = $slugold->first();
        $slugold3 = $slugold2->slug;

        // dd($slugold);
        if ($request->slug != $slugold3) {
            $rules['slug'] = 'required|unique:catalogs';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('main_image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['main_image'] = $request->file('main_image')->store('mainimagecatalog');
        }

        if ($request['location'] == null) {
            $validatedData['location'] = $request['locationold'];
        } else {
            $validatedData['location'] = $request['location'];
        }

        // dd($request->input('id_catalog'));
        // dd($validatedData['location']);
        DB::table('catalogs')
            ->where('id', $request->input('id_catalog'))
            ->update($validatedData);
        $request->session()->flash('success', 'Catalog has been editted!');
        return redirect('/admin-catalog');
    }

    // public function UpdateCatalogNational(Request $request, Catalog $catalog)
    // {

    //     $validatedData = $request->validate([
    //         'title' => 'required|max:255',
    //         'price' => 'required',
    //         'description' => 'required'
    //     ]);

    //     if ($request['location'] == null) {
    //         $validatedData['location'] = $request['locationold'];
    //     } else {
    //         $validatedData['location'] = $request['location'];
    //     }

    //     // dd($request->input('id_catalog'));
    //     // dd($validatedData['location']);
    //     DB::table('catalogs')
    //         ->where('id', $request->input('id_catalog'))
    //         ->update($validatedData);
    //     $request->session()->flash('success', 'Catalog has been editted!');
    //     return redirect('/admin-catalog');
    // }

    public function UpdateCatalogInternational(Request $request, Catalog $catalog)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'description' => 'required'
        ]);

        if ($request['location'] == null) {
            $validatedData['location'] = $request['locationold'];
        } else {
            $validatedData['location'] = $request['location'];
        }
        // dd($request->input('id_catalog'));

        DB::table('catalogs')
            ->where('id', $request->input('id_catalog'))
            ->update($validatedData);
        $request->session()->flash('success', 'Catalog has been editted!');
        return redirect('/admin-catalog');
    }

    public function DeleteCatalog(Request $request, Catalog $catalog)
    {
        $images = DB::table('catalogs')
            ->select('main_image')
            ->where('id', '=', $request->input('id_catalog'))
            ->get();
        $image = $images->first();
        $mainImage = $image->main_image;
        // ddd($mainImage);
        if ($mainImage) {
            Storage::delete($mainImage);
        }
        // User::destroy($user->id);
        DB::table('catalogs')->where('id', $request->input('id_catalog'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'Catalog has been deleted!');
        return redirect('/admin-catalog');
    }
    // public function DeleteCatalogNational(Request $request, Catalog $catalog)
    // {
    //     // User::destroy($user->id);
    //     DB::table('catalogs')->where('id', $request->input('id_catalog'))->delete();
    //     // dd($user->id);
    //     $request->session()->flash('success', 'Catalog has been deleted!');
    //     return redirect('/admin-catalog');
    // }

    public function DeleteCatalogInternational(Request $request, Catalog $catalog)
    {
        // User::destroy($user->id);
        DB::table('catalogs')->where('id', $request->input('id_catalog'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'Catalog has been deleted!');
        return redirect('/admin-catalog');
    }

    public function transportation()
    {
        return view(
            'admin.layout.transportation',
            [
                "title" => "Transportation",
                "transportations" => Transportation::all(),
                "active" => "data"
            ]
        );
    }

    public function UploadTransportation(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Transportation::create($validatedData);

        $request->session()->flash('success', 'New transportation has been added!');

        return redirect('/admin-transportations');
    }

    public function UpdateTransportation(Request $request, Transportation $transportations)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        DB::table('transportations')
            ->where('id', $request->input('id_transportation'))
            ->update($validatedData);
        $request->session()->flash('success', 'Transportation has been editted!');
        return redirect('/admin-transportations');
    }

    public function DeleteTransportation(Request $request, Transportation $transportations)
    {
        // User::destroy($user->id);
        DB::table('transportations')->where('id', $request->input('id_transportation'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'Transportation has been deleted!');
        return redirect('/admin-transportations');
    }

    public function payment()
    {
        return view(
            'admin.layout.payments',
            [
                "title" => "Payment Method",
                "payments" => Payment::all(),
                "active" => "data"

            ]
        );
    }

    public function UploadPayment(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        Payment::create($validatedData);

        $request->session()->flash('success', 'New payment has been added!');

        return redirect('/admin-payments');
    }

    public function UpdatePayment(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        DB::table('payments')
            ->where('id', $request->input('id_payments'))
            ->update($validatedData);
        $request->session()->flash('success', 'Payment has been editted!');
        return redirect('/admin-payments');
    }

    public function DeletePayment(Request $request, Payment $payment)
    {
        // User::destroy($user->id);
        DB::table('payments')->where('id', $request->input('id_payments'))->delete();
        // dd($user->id);
        $request->session()->flash('success', 'Payment has been deleted!');
        return redirect('/admin-payments');
    }

}