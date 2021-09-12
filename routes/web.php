<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $semua = Auth::guard('administrators')->check();
    return dd($semua);
});

// admin
Route::group(['prefix' => '', 'middleware' => 'admin'], function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard.content');
    });
    Route::post('/admin-dashboard', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});

// user
Route::group(['prefix' => '', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {return view('dashboard');});
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


