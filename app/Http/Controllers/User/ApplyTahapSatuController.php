<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyTahapSatuController extends Controller
{
    public function applySatu () {
        return view('user.apply-1');
    }

    public function applyPutSatu (Request $request) {
        $pekerjaan = Pekerjaan::create([
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'user_id' => Auth::guard('users')->user()->id,
        ]);

        $pekerjaan->update([
            'file_rab' => $this->fileRAB($request, $pekerjaan->id), // string
            'file_tor_sw' => $this->fileTOR($request, $pekerjaan->id), // string
        ]);

        $pekerjaan->update([
            'status_id' => 1
        ]);

        return redirect()->route('user.apply.2', ['pekerjaan_id' => $pekerjaan->id]);
    }

    /**
     * function ini digunakan untuk menyetorkan file rab
     * ke folder storage 
     * dan 
     * nama dari file tersebut diubah menjadi
    **/
    public function fileRAB (Request $request, $id) {
        $file_rab = $request->file_rab; // typedata : file
        $file_rab_name = ''; // typedata : string
        if ($file_rab !== NULL){
            $file_rab_name = 'file_rab' . '-' . $id . "." . $file_rab->extension(); // typedata : string
            $file_rab_name = str_replace(' ', '-', strtolower($file_rab_name)); // typedata : string
            $file_rab->storeAs('public', $file_rab_name); // memanggil function untuk menaruh file di storage
        }
        return asset('storage') . '/' . $file_rab; // me return path/to/file.ext
    }

    public function fileTOR (Request $request, $id) {
        $file_tor_sw = $request->file_tor_sw;
        $file_tor_sw_name = '';
        if ($file_tor_sw !== NULL){
            $file_tor_sw_name = 'file_tor_sw' . '-' . $id . "." . $file_tor_sw->extension();
            $file_tor_sw_name = str_replace(' ', '-', strtolower($file_tor_sw_name));
            $file_tor_sw->storeAs('public', $file_tor_sw_name);
        }
        return asset('storage') . '/' . $file_tor_sw;
    }


    //      'nama_pekerjaan',
    //     'file_rab',
    //     'file_tor_sw',
    //     'file_laporan'
    /* template */
    // public function storeBaju(Request $request) {
    //     $baju = Baju::create([
    //         'id_kategori' => $request->id_kategori,
    //         'nama' => $request->nama,
    //         'jenis_kelamin' => $request->jenis_kelamin,
    //         'deskripsi' => $request->deskripsi,
    //     ]);
    //     $baju->update([
    //         'foto' => $this->storeImage($request, $baju->id)
    //     ]);
    //     return redirect()->back()->with('success', 'berhasil ditambahkan');
    // }

    // /* image handler */
    // public function storeImage(Request $request, $id)
    // {
    //     $image = $request->image;
    //     $image_name = '';
    //     if ($image !== null) {
    //         $image_name = 'foto' . '-' . $id . "." . $image->extension();
    //         $image_name = str_replace(' ', '-', strtolower($image_name));
    //         $image->storeAs('public', $image_name);
    //     }

    //     return asset('storage') . '/' . $image_name;
    // }
}
