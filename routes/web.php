<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Models\Admin;

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
Route::get('/dashboardadmin', [AdminController::class, 'dashboard'])->middleware('auth');
Route::get('/catalogadmin', [AdminController::class, 'catalog'])->middleware('auth');
//

Route::get('/loginAdmin', [AdminController::class, 'loginAdmin'])->name('login')->middleware('guest');
Route::post('/loginAdmin', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


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