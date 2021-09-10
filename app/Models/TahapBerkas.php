<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapBerkas extends Model
{
    use HasFactory;
    protected $table = "tahap_berkas";
    protected $fillable = [
        'pilihan_pekerjaan',
        'nama_pekerjaan',
        'RAB',
        'TOR'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function tahap_pengajuan () {
        return $this->hasMany(TahapPengajuan::class, 'id_tahap_berkas', 'id');
    }
}
