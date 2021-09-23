<?php

namespace App\Http\Controllers\Pekerjaan;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function index () {
        $pekerjaan = Pekerjaan::all();
        
        return view('admin.pekerjaan.index', compact(['pekerjaan']));
    }

    public function create() {
        return view('admin.pekerjaan.create');
    }

    public function store (Request $request) {
        $pekerjaan = Pekerjaan::findOrFail($request->id);
        $pekerjaan->create($request->all());
        return redirect()->back();
    }

    // menghapus
    public function destroy ($id) {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return redirect()->back();
    }

    // menampilkan halaman update
    public function update($id) {
        $pekerjaan = Pekerjaan::findOrFail($id);
        return view('admin.pekerjaan.update', compact(['pekerjaan']));
    }

    //menerima data update dan mengupdate data
    public function updatePut(Request $request) {
        $pekerjaan = Pekerjaan::findOrFail($request->id);
        $pekerjaan->update($request->all());
        return redirect()->back();
    }
}

/*
$table->string('nama_pekerjaan');
$table->string('file_rab');
$table->string('file_tor_sw');
$table->string('file_laporan');
$table->bigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');
$table->bigInteger('kategori_id');
$table->foreign('kategori_id')->references('id')->on('pekerjaan_kategori');
$table->bigInteger('status_id');
$table->foreign('status_id')->references('id')->on('pekerjaan_status');
*/