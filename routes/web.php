<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

Route::get('/loginAdmin', [AdminController::class, 'loginAdmin']);
Route::post('/loginAdmin', [LoginController::class, 'authenticate']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/catalog', [AdminController::class, 'catalog']);


Route::group(['middleware' => 'admin'], function () {
    // Rute-rute yang perlu dilindungi
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    // Tambahkan rute lainnya yang perlu dilindungi
});

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/loginAdmin', 'AdminController@loginAdmin')->name('admin.page.login');
//     Route::post('/login', 'AdminAuthController@authenticate');
//     // Route::post('/logout', 'AdminAuthController@logout')->name('admin.logout');
//     // Tambahkan rute lainnya sesuai kebutuhan Anda.
// });