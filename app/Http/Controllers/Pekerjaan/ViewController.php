<?php

namespace App\Http\Controllers\Pekerjaan;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\PekerjaanMeet;
use App\Models\PekerjaanKategori;
use App\Models\PekerjaanPembayaran;
use App\Models\PekerjaanStatus;
use App\Models\User;
use Exception;
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

        // handle foreign key
        $this->setToNullMeet($pekerjaan->id);
        $this->setToNullPembayaran($pekerjaan->id);
        $pekerjaan->delete(); // delete

        return redirect()->back();
    }

    public function setToNullMeet($id) {
        $pekerjaan_meet = PekerjaanMeet::where('pekerjaan_id', $id);
        try {
            $pekerjaan_meet->update(array('pekerjaan_id' => null));
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', 'gagal delete meet');
        }
    }

    public function setToNullPembayaran($id) {
        $pekerjaan_pembayaran = PekerjaanPembayaran::where('pekerjaan_id', $id);
        try {
            $pekerjaan_pembayaran->update(array('pekerjaan_id' => null));
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', 'gagal delete pembayaran');
        }
    }

    // menampilkan halaman update
    public function update($id) {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $users = User::all();
        $pekerjaan_kategori = PekerjaanKategori::all();
        $pekerjaan_status = PekerjaanStatus::all();
        return view('admin.pekerjaan.update', compact(['pekerjaan', 'users', 'pekerjaan_kategori', 'pekerjaan_status']));
    }

    //menerima data update dan mengupdate data
    public function updatePut(Request $request) {
        $pekerjaan = Pekerjaan::findOrFail($request->id);
        $pekerjaan->update($request->all());
        $pekerjaan->pekerjaan_kategori->update([
            'deskripsi' => $request->deskripsi
            // 'deskripsi' mengacu pada atribut yg ada di pekerjaan_kategori,
            // $request->deskripsi mengacu pada name yang dimasukan pada data form .blade
        ]);
        return redirect()->back();
    }

    // detail
    public function detail($id) {
        $pekerjaan = Pekerjaan::findOrFail($id); //mencari berdasarkan id
        $pekerjaan_kategori = PekerjaanKategori::all();
        $pekerjaan_status = PekerjaanStatus::all();
        return view('admin.pekerjaan.detail', compact(['pekerjaan', 'pekerjaan_kategori', 'pekerjaan_status']));
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