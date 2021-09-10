<?php

namespace App\Http\Controllers\Pemberkasan;

use App\Http\Controllers\Controller;
use App\Models\TahapBerkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function create (Request $request) {
        TahapBerkas::create([
            'pilihan_pekerjaan' => $request->pilihan_pekerjaan,
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'RAB' => $request->RAB,
            'TOR' => $request->TOR,
            'id_user' => Auth::user()->id
        ]);
    }
}
// $table->string('pilihan_pekerjaan');
// $table->string('nama_pekerjaan',25);
// $table->string('RAB');
// $table->string('TOR');
// $table->bigInteger('id_user');