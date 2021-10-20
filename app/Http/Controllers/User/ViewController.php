<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pekerjaan;
use App\Models\User;
use App\Models\UserIdentitas;
use Illuminate\Support\Facades\Storage;

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

    public function updatepekerjaan($pekerjaan_id){
        $pekerjaan = Pekerjaan::findOrFail($pekerjaan_id);
        return view('user.update-pekerjaan', compact(['pekerjaan']));
    }

    public function updatePutPekerjaan(Request $request) {
        $pekerjaan = Pekerjaan::findOrFail($request->id_pekerjaan);
        
        if ($request->input_del_file_rab == '1') {
            Storage::delete($pekerjaan->file_rab);
            $pekerjaan->update([
                'file_rab' => '', // string
            ]);
        }

        if ($request->file_rab) {
            $pekerjaan->update([
                'file_rab' => $this->fileRAB($request, $pekerjaan->id), // string
            ]);
        }

        if ($request->input_del_file_tor == '1') {
            Storage::delete($pekerjaan->file_tor);
            $pekerjaan->update([
                'file_tor_sw' => '', // string
            ]);
            // dd($pekerjaan->file_tor);
        }

        if ($request->file_tor) {
            $pekerjaan->update([
                'file_tor_sw' => $this->fileTOR($request, $pekerjaan->id), // string
            ]);
        }

        if ($request->input_del_file_dp_bukti == '1') {
            Storage::delete($pekerjaan->file_dp_bukti);
            $pekerjaan->update([
                'pembayaran_dp_bukti' => '', // string
            ]);
            // dd($pekerjaan->file_tor);
        }

        if ($request->file_dp_bukti) {
            $pekerjaan->update([
                'pembayaran_dp_bukti' => $this->fileDPBukti($request, $pekerjaan->id), // string
            ]);
        }

        if ($request->input_del_file_report_pekerjaan == '1') {
            Storage::delete($pekerjaan->file_report_pekerjaan);
            $pekerjaan->update([
                'file_laporan' => '', // string
            ]);
            // dd($pekerjaan->file_tor);
        }

        if ($request->file_report_pekerjaan) {
            $pekerjaan->update([
                'file_laporan' => $this->fileLaporan($request, $pekerjaan->id), // string
            ]);
        }

        if ($request->input_del_file_sisa_bukti == '1') {
            Storage::delete($pekerjaan->file_sisa_bukti);
            $pekerjaan->update([
                'pembayaran_sisa_bukti' => '', // string
            ]);
            // dd($pekerjaan->file_tor);
        }

        if ($request->file_sisa_bukti) {
            $pekerjaan->update([
                'pembayaran_sisa_bukti' => $this->fileSisaBukti($request, $pekerjaan->id), // string
            ]);
        }

        return redirect()->back();
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

    public function fileRAB (Request $request, $id) {
        $file_rab = $request->file_rab; // typedata : file
        $file_rab_name = ''; // typedata : string
        if ($file_rab !== NULL){
            $file_rab_name = 'file_rab' . '-' . $id . "." . $file_rab->extension(); // typedata : string
            $file_rab_name = str_replace(' ', '-', strtolower($file_rab_name)); // typedata : string
            $file_rab->storeAs('public', $file_rab_name); // memanggil function untuk menaruh file di storage
        }
        return asset('storage') . '/' . $file_rab_name; // me return path/to/file.ext
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
