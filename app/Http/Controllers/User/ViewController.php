<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pekerjaan;
use App\Models\User;
use App\Models\UserIdentitas;

class ViewController extends Controller
{
    public function index() {
        $pekerjaan = Pekerjaan::where("user_id", Auth::guard('users')->user()->id)->get();
        
        return view('user.dashboard', compact(['pekerjaan']));
    }

    // menampilkan halaman isi profil
    public function profile(){
        return view('user.profile');
    }

    public function updatePut(Request $request){
        $user = User::findOrFail($request->id);
        // dd($request->all());

        // misal belum punya, maka create
        if (!$user->user_identitas) {
            UserIdentitas::create([
                'no_telfon' => $request->no_telfon,
                'kota_domisili' => $request->kota_domisili,
                'nama_ktp' => $request->nama_ktp,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'profesi' => $request->profesi,
                'nama_perusahaan' => $request->nama_perusahaan,
                'foto_ktp' => $request->foto_ktp,
                'nik' => $request->nik,
                'user_id' => $user->id,
            ]);
        } else { // update misal sudah punya
            $user->user_identitas->update([
                'no_telfon' => $request->no_telfon,
                'kota_domisili' => $request->kota_domisili,
                'nama_ktp' => $request->nama_ktp,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'profesi' => $request->profesi,
                'nama_perusahaan' => $request->nama_perusahaan,
                'foto_ktp' => $request->foto_ktp,
                'nik' => $request->nik,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('user.pekerjaan.index');
    }
}

// Schema::create('user_identitas', function (Blueprint $table) {
//     $table->id();
//     $table->string('no_telfon'); // masih rancu
//     $table->string('kota_domisili');
//     $table->string('nama_ktp');
//     $table->string('tempat_lahir');
//     $table->date('tanggal_lahir');
//     $table->boolean('jenis_kelamin'); // masih rancu
//     $table->string('pendidikan_terakhir');
//     $table->string('profesi');
//     $table->string('nama_perusahaan');
//     $table->string('foto_ktp');
//     $table->string('nik'); // masih rancu
//     $table->bigInteger('user_id');
//     $table->foreign('user_id')->references('id')->on('users');
//     $table->timestamps();
// });

// 'no_telfon' => $request->no_telfon,
// 'kota_domisili' => $request->kota_domisili,
// 'nama_ktp' => $request->nama_ktp,
// 'tempat_lahir' => $request->tempat_lahir,
// 'tanggal_lahir' => $request->tanggal_lahir,
// 'jenis_kelamin' => $request->jenis_kelamin,
// 'pendidikan_terakhir' => $request->pendidikan_terakhir,
// 'profesi' => $request->profesi,
// 'nama_perusahaan' => $request->nama_perusahan,
// 'foto_ktp' => $request->foto_ktp,
// 'nik' => $request->nik,
// 'user_id' => $user->id
