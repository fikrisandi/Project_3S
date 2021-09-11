<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pemberkasan\ViewController as PemberkasanViewController;
use App\Http\Controllers\Pemberkasan\UpdateController as PemberkasanUpdateController;
use App\Http\Controllers\Pemberkasan\CreateController as PemberkasanCreateController;
use App\Http\Controllers\Pemberkasan\DeleteController as PemberkasanDeleteController;
use App\Models\Administrator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => '', 'middleware' => ''], function () {
    Route::get('/admin-dashboard', function () {
        return view('dashboard');
    });
});

Route::get('/fikri',[Controller :: class, 'showFikri'] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// tahap-berkas: getView, postData
Route::group(['prefix' => 'tahap-berkas'], function () {
    Route::get('', [PemberkasanViewController::class, 'view'])->name('pemberkasan.view');
    Route::post('', [PemberkasanCreateController::class, 'create'])->name('pemberkasan.create');
    Route::put('', [PemberkasanUpdateController::class, 'update'])->name('pemberkasan.update');
    Route::delete('', [PemberkasanDeleteController::class, 'delete'])->name('pemberkasan.delete');
});




// tahap-pengajuan: getView, postData
// tahap-pembayaran: getView, postData
// tahap-fiksasi: getView, postData

// Pemberkasan
//     ViewController
//     UpdateController
//     DeleteController
//     CreateController

// php artisan make:controller Pemberkasan/ViewController
// php artisan make:controller Pemberkasan/UpdateController
// php artisan make:controller Pemberkasan/DeleteController
// php artisan make:controller Pemberkasan/CreateController
