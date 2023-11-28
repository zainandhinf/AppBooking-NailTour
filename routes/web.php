<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficerController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Models\Admin;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// page admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->middleware('auth');
Route::get('/admin-officer', [AdminController::class, 'officer'])->middleware('auth');
Route::get('/admin-provinces', [AdminController::class, 'provinces'])->middleware('auth');
Route::get('/admin-city', [AdminController::class, 'city'])->middleware('auth');
Route::get('/admin-countries', [AdminController::class, 'country'])->middleware('auth');
Route::get('/admin-catalog', [AdminController::class, 'catalog'])->middleware('auth');
Route::get('/admin-transportations', [AdminController::class, 'transportation'])->middleware('auth');
Route::get('/admin-payments', [AdminController::class, 'payment'])->middleware('auth');
// Route::get('/admin-catalognational', [AdminController::class, 'catalog'])->middleware('auth');
// Route::get('/admin-cataloginternational', [AdminController::class, 'catalog2'])->middleware('auth');
//

//page crud admin
// Route::get('/admin-catalog/create', [AdminController::class, 'createCatalog'])->middleware('auth');
//

// crud admin
Route::post('/uploadofficer', [AdminController::class, 'UploadOfficer']);
Route::put('/updateofficer', [AdminController::class, 'UpdateOfficer']);
Route::delete('/deleteofficer', [AdminController::class, 'DeleteOfficer']);

Route::post('/uploadprovinces', [AdminController::class, 'UploadProvinces']);
Route::put('/updateprovinces', [AdminController::class, 'UpdateProvinces']);
Route::delete('/deleteprovinces', [AdminController::class, 'DeleteProvinces']);

Route::post('/uploadcity', [AdminController::class, 'UploadCity']);
Route::put('/updatecity', [AdminController::class, 'UpdateCity']);
Route::delete('/deletecity', [AdminController::class, 'DeleteCity']);

Route::post('/uploadcountries', [AdminController::class, 'UploadCountries']);
Route::put('/updatecountries', [AdminController::class, 'UpdateCountries']);
Route::delete('/deletecountries', [AdminController::class, 'DeleteCountries']);

Route::post('/uploadcatalognational', [AdminController::class, 'UploadCatalogNational']);
// Route::put('/updatecatalognational', [AdminController::class, 'UpdateCatalogNational']);
Route::put('/updatecatalog', [AdminController::class, 'UpdateCatalog']);
// Route::delete('/deletecatalognational', [AdminController::class, 'DeleteCatalogNational']);
Route::delete('/deletecatalog', [AdminController::class, 'DeleteCatalog']);
Route::get('/admin-catalog/checkSlug', [AdminController::class, 'checkSlug']);
Route::get('/admin-catalog/checkSlug2', [AdminController::class, 'checkSlug2']);
Route::get('/admin-catalog/checkSlug3', [AdminController::class, 'checkSlug3']);

Route::post('/uploadcataloginternational', [AdminController::class, 'UploadCatalogInternational']);
Route::put('/updatecataloginternational', [AdminController::class, 'UpdateCatalogInternational']);
Route::delete('/deletecataloginternational', [AdminController::class, 'DeleteCatalogInternational']);

Route::post('/uploadimagecatalog', [AdminController::class, 'uploadimagecatalog']);
Route::delete('/deleteimagecatalog', [AdminController::class, 'deleteimagecatalog']);

Route::post('/uploadtransportation', [AdminController::class, 'UploadTransportation']);
Route::put('/updatetransportation', [AdminController::class, 'UpdateTransportation']);
Route::delete('/deletetransportation', [AdminController::class, 'DeleteTransportation']);

Route::post('/uploadpayments', [AdminController::class, 'UploadPayment']);
Route::put('/updatepayments', [AdminController::class, 'UpdatePayment']);
Route::delete('/deletepayments', [AdminController::class, 'DeletePayment']);
//

// Route::get('/file/{filename}', [AdminController::class, 'FileShow']);


Route::get('/login', [AdminController::class, 'loginAdmin'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// login
Route::group(['middleware' => 'admin'], function () {
    // Rute-rute yang perlu dilindungi
    Route::get('/admin/dashboard', 'AdminController@dashboard')->middleware('auth');
    // Tambahkan rute lainnya yang perlu dilindungi
});

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/loginAdmin', 'AdminController@loginAdmin')->name('admin.page.login');
//     Route::post('/login', 'AdminAuthController@authenticate');
//     // Route::post('/logout', 'AdminAuthController@logout')->name('admin.logout');
//     // Tambahkan rute lainnya sesuai kebutuhan Anda.
// });
// 


//page user
Route::get('/home', [UserController::class, 'home'])->middleware('auth');
Route::get('/catalogs', [UserController::class, 'catalogs'])->middleware('auth');
Route::get('/catalog/{slug}', [UserController::class, 'preview'])->middleware('auth');
Route::get('/bookings', [UserController::class, 'bookings'])->middleware('auth');
Route::get('/booking/{no_trans}', [UserController::class, 'booking'])->middleware('auth');
Route::get('/deals', [UserController::class, 'deals'])->middleware('auth');
Route::get('/deal/{no_trans}', [UserController::class, 'deal'])->middleware('auth');
Route::get('/print-proof/{no_trans}', [UserController::class, 'printproof'])->middleware('auth');

//crud user
Route::post('/createbooking', [UserController::class, 'createbooking']);
Route::put('/updatebooking', [UserController::class, 'updatebooking']);
Route::put('/addpaymentuser', [UserController::class, 'addpaymentuser']);
Route::put('/addproof', [UserController::class, 'addproof']);
Route::post('/addofferuser', [UserController::class, 'addoffer']);

//page officer
Route::get('/officer', [OfficerController::class, 'index'])->middleware('auth');
Route::get('/officer-dashboard', [OfficerController::class, 'dashboard'])->middleware('auth');
Route::get('/officer-transactions', [OfficerController::class, 'transactions'])->middleware('auth');
Route::get('/officer-transactions/{no_trans}', [OfficerController::class, 'transaction'])->middleware('auth');
Route::get('/officer-reports', [OfficerController::class, 'reports'])->middleware('auth');
Route::post('/print-reports', [OfficerController::class, 'printreports'])->middleware('auth');
Route::get('/print-report/{no_trans}', [OfficerController::class, 'printreport'])->middleware('auth');

//crud officer
Route::put('/acceptbooking', [OfficerController::class, 'acceptbooking']);
Route::put('/acceptpayment', [OfficerController::class, 'acceptpayment']);
Route::post('/addoffer', [OfficerController::class, 'addoffer']);
Route::put('/editoffer', [OfficerController::class, 'editoffer']);
Route::delete('/deleteoffer', [OfficerController::class, 'deleteoffer']);