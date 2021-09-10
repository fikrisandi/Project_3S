<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapPengajuan extends Model
{
    use HasFactory;
    protected $table = "tahap_pengajuan";
    protected $fillable = [
        'meet_pengajuan_jadwal',
        'meet_pengajuan_link',
    ];

    public function tahap_berkas () {
        return $this->belongsTo(TahapBerkas::class, 'id_tahap_berkas', 'id');
    }
    public function tahap_pembayaran () {
        return $this->hasMany(TahapPembayaran::class, 'id_tahap_pembayaran', 'id');
    }
}

