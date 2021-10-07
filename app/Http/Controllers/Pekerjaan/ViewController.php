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
        $pekerjaan->update([
            'nama_pekerjaan' => $request->nama_pekerjaan
        ]);
        $pekerjaan->pekerjaan_kategori->update([
            'deskripsi' => $request->deskripsi
            // 'deskripsi' mengacu pada atribut yg ada di pekerjaan_kategori,
            // $request->deskripsi mengacu pada name yang dimasukan pada data form .blade
        ]);
        $pekerjaan->pekerjaan_meet->update([
            'meet_pengajuan_jadwal' => $request->meet_pengajuan_jadwal,
            'meet_pengajuan_link' => $request->meet_pengajuan_link,
            'meet_pelaporan_jadwal' => $request->meet_pelaporan_jadwal,
            'meet_pelaporan_link' => $request->meet_pelaporan_link
        ]);
        $pekerjaan->pekerjaan_pembayaran->update([
            'pembayaran_total' => $request->pembayaran_total,
            'pembayaran_dp' => $request->pembayaran_dp,
            'pembayaran_dp_bukti' => $request->bukti_dp,
            'pembayaran_sisa' => $request->pembayaran_sisa,
            'pembayaran_sisa_bukti' => $request->bukti_sisa
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

Schema::create('pekerjaan_meet', function (Blueprint $table) {
$table->id();
$table->date('meet_pengajuan_jadwal');
$table->string('meet_pengajuan_link');
$table->date('meet_pelaporan_jadwal');
$table->string('meet_pelaporan_link');
$table->bigInteger('pekerjaan_id')->nullable();
$table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
$table->timestamps();
});

$table->id();
$table->decimal('pembayaran_total',10,2);
$table->decimal('pembayaran_dp',10,2);
$table->string('pembayaran_dp_bukti');
$table->decimal('pembayaran_sisa',10,2);
$table->string('pembayaran_sisa_bukti');
$table->bigInteger('pekerjaan_id')->nullable();
$table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
$table->timestamps();
*/