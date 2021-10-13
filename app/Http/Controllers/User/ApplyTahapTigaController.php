<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PekerjaanPembayaran;
use Illuminate\Http\Request;

class ApplyTahapTigaController extends Controller
{
    public function applyTiga ($pekerjaan_id) {
        return view('user.apply-3', compact(['pekerjaan_id']));
    }

    public function applyPutTiga (Request $request) {
        $pekerjaan = PekerjaanPembayaran::create([
            'pembayaran_total' => $request->pembayaran_total,
            'pembayaran_dp' => $request->pembayaran_dp,
            'pekerjaan_id' => $request->pekerjaan_id,
            // 'pembayaran_dp_bukti' => $request->pembayaran_dp_bukti
        ]);

        $pekerjaan->update([
            'pembayaran_dp_bukti' => $this->pembayaranDpBukti($request)
        ]);

        return redirect()->route('user.apply.4', ['pekerjaan_id' => $request->pekerjaan_id])->with('success', 'berhasil ditambahkan');
    }

    public function pembayaranDpBukti (Request $request) {
        $pembayaran_dp_bukti = $request->pembayaran_dp_bukti; // typedata : file
        $pembayaran_dp_bukti_name = ''; // typedata : string
        if ($pembayaran_dp_bukti !== NULL){
            $pembayaran_dp_bukti_name = 'pembayaran_dp_bukti' . '-' . $request->pekerjaan_id . "." . $pembayaran_dp_bukti->extension(); // typedata : string
            $pembayaran_dp_bukti_name = str_replace(' ', '-', strtolower($pembayaran_dp_bukti_name)); // typedata : string
            $pembayaran_dp_bukti->storeAs('public', $pembayaran_dp_bukti_name); // memanggil function untuk menaruh file di storage
        }
        return asset('storage') . '/' . $pembayaran_dp_bukti; // me return path/to/file.ext
    }
}
