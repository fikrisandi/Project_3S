<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PekerjaanMeet;
use Illuminate\Http\Request;

class ApplyTahapDuaController extends Controller
{
    public function applyDua ($pekerjaan_id) {
        return view('user.apply-2', compact(['pekerjaan_id']));
    }

    public function applyPutDua (Request $request) {
        $pekerjaan_meet = PekerjaanMeet::create([
            'meet_pengajuan_jadwal' => $request->meet_pengajuan_jadwal,
            'meet_pengajuan_link' => $request->meet_pengajuan_link,
            'pekerjaan_id' => $request->pekerjaan_id
        ]);

        $pekerjaan_meet->pekerjaan->update([
            'status_id' => 2
        ]);


        return redirect()->route('user.apply.3', ['pekerjaan_id' => $request->pekerjaan_id])->with('success', 'berhasil ditambahkan');
    }

    /**
     * 
        'meet_pengajuan_jadwal',
        'meet_pengajuan_link',
        // 'meet_pelaporan_jadwal',
        // 'meet_pelaporan_link'
     */
}
