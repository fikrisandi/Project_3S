<?php

use App\Http\Controllers\Admin\ViewController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pekerjaan\ViewController as PekerjaanViewController;
use App\Http\Controllers\User\ViewController as UserViewController;
use App\Models\Administrator;
use App\Models\Pekerjaan;
use App\Models\PekerjaanPembayaran;
use App\Models\PekerjaanMeet;
use App\Models\User;
use App\Models\UserIdentitas;
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

//untuk cek 
Route::get('/test', function () {
    return dd( UserIdentitas::all() );
});

// admin
Route::group(['prefix' => '', 'middleware' => 'admin'], function () {
    Route::get('/admin-dashboard', [ViewController::class, 'index'])->name('admin.view');
    Route::post('/admin-dashboard', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});

// user
Route::group(['prefix' => '', 'middleware' => 'user'], function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/user/pekerjaan', [UserViewController::class, 'index'])->name('user.pekerjaan.index');
    Route::get('/user/profil', [UserViewController::class, 'profile'])->name('user.profile');
    Route::put('/user/profil', [UserViewController::class, 'updatePut'])->name('user.updatePut');
});

// Route::get('/pekerjaan/create', [PekerjaanViewController::class, 'create'])->name('pekerjaan.create');
// Route::post('/pekerjaan/create', [PekerjaanViewController::class, 'store'])->name('pekerjaan.store');
// Route::get('/pekerjaan/update/{id}', [PekerjaanViewController::class, 'update'])->name('pekerjaan.update');
// Route::put('/pekerjaan/update', [PekerjaanViewController::class, 'updatePut'])->name('pekerjaan.updatePut');
// Route::delete('/pekerjaan/destroy/{id}', [PekerjaanViewController::class, 'destroy'])->name('pekerjaan.destroy');
// Route::get('/pekerjaan/detail/{id}', [PekerjaanViewController::class, 'detail'])->name('pekerjaan.detail');
    

// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');
Route::get('/pekerjaan', [PekerjaanViewController::class, 'index'])->name('pekerjaan.index');
Route::get('/pekerjaan/create', [PekerjaanViewController::class, 'create'])->name('pekerjaan.create');
Route::post('/pekerjaan/create', [PekerjaanViewController::class, 'store'])->name('pekerjaan.store');
Route::get('/pekerjaan/update/{id}', [PekerjaanViewController::class, 'update'])->name('pekerjaan.update');
Route::put('/pekerjaan/update', [PekerjaanViewController::class, 'updatePut'])->name('pekerjaan.updatePut');
Route::delete('/pekerjaan/destroy/{id}', [PekerjaanViewController::class, 'destroy'])->name('pekerjaan.destroy');
Route::get('/pekerjaan/detail/{id}', [PekerjaanViewController::class, 'detail'])->name('pekerjaan.detail');
    
