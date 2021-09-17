<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\PekerjaanKategori;
use App\Models\PekerjaanMeet;
use App\Models\PekerjaanPembayaran;
use App\Models\PekerjaanStatus;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    // - menampilkan semua data pekerjaan 
    // - menampilkan semua data meet
    // - menampilkan semua data pembayaran
    // index ( )
    public function index () {
        $pekerjaan = Pekerjaan::all();
        $meet = PekerjaanMeet::all();
        $status = PekerjaanStatus::all();
        $kategori = PekerjaanKategori::all();
        $pembayaran = PekerjaanPembayaran::all();

        return view('admin.dashboard.content', compact(['pekerjaan', 'meet', 'status', 'kategori', 'pembayaran']));
    }
}
