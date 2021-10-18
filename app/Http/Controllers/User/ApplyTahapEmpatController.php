<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\PekerjaanMeet;
use App\Models\PekerjaanPembayaran;
use Illuminate\Http\Request;

class ApplyTahapEmpatController extends Controller
{
    public function applyEmpat (int $pekerjaan_id) {
        return view('user.apply-4', compact(['pekerjaan_id']));
    }

    public function applyPutEmpat (Request $request) {
        // dd( PekerjaanPembayaran::where('pekerjaan_id', $request->pekerjaan_id)->first() );
        $pekerjaan_pembayaran = PekerjaanPembayaran::where('pekerjaan_id', $request->pekerjaan_id)->first();
        $pekerjaan_pembayaran->update([
            'pembayaran_sisa' => $request->pembayaran_sisa,
            'pembayaran_sisa_bukti' => $this->pembayaranSisaBukti($request)
        ]);

        $pekerjaan = Pekerjaan::findOrFail($request->pekerjaan_id);
        $pekerjaan->update([
            'file_laporan' => $this->fileLaporan($request)
        ]);

        $pekerjaan_meet = PekerjaanMeet::where('pekerjaan_id', $request->pekerjaan_id)->first();
        $pekerjaan_meet->update([
            'meet_pelaporan_jadwal' => $request->meet_pelaporan_jadwal,
            'meet_pelaporan_link' => $request->meet_pelaporan_link
        ]);

        $pekerjaan_meet->pekerjaan->update([
            'status_id' => 4
        ]);

        return redirect()->route('user.pekerjaan.index')->with('success', 'berhasil menambahkan data');
    }

    public function pembayaranSisaBukti (Request $request) {
        $pembayaran_sisa_bukti = $request->pembayaran_sisa_bukti; // typedata : file
        $pembayaran_sisa_bukti_name = ''; // typedata : string
        if ($pembayaran_sisa_bukti !== NULL){
            $pembayaran_sisa_bukti_name = 'pembayaran_sisa_bukti' . '-' . $request->pekerjaan_id . "." . $pembayaran_sisa_bukti->extension(); // typedata : string
            $pembayaran_sisa_bukti_name = str_replace(' ', '-', strtolower($pembayaran_sisa_bukti_name)); // typedata : string
            $pembayaran_sisa_bukti->storeAs('public', $pembayaran_sisa_bukti_name); // memanggil function untuk menaruh file di storage
        }
        return asset('storage') . '/' . $pembayaran_sisa_bukti_name; // me return path/to/file.ext
    }

    public function fileLaporan (Request $request) {
        $file_laporan = $request->file_laporan; // typedata: file
        $file_laporan_name = ''; // typedata : string
        if ($file_laporan !== NULL){
            $file_laporan_name = 'file_laporan' . '-' . $request->pekerjaan_id . "." . $file_laporan->extension(); // typedata : string
            $file_laporan_name = str_replace(' ', '-', strtolower($file_laporan_name)); // typedata : string
            $file_laporan->storeAs('public', $file_laporan_name); // memanggil function untuk menaruh file di storage
        }
        return asset('storage') . '/' . $file_laporan_name; // me return path/to/file.ext
    }
}

/**
 * tarif_sisa : pembayaran
 * pembayaran_sisa_bukti : pembayaran
 * file_laporan : pekerjaan
 * meet_pelaporan_jadwal : meet
 * meet_pelaporan_link : meet
 */