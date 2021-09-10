<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapPembayaran extends Model
{
    use HasFactory;
    protected $table = "tahap_pengajuan";
    protected $fillable = [
        'pembayaran_total',
        'pembayaran_dp',
        'pembayaran_dp_bukti'
    ];

    public function tahap_pengajuan () {
        return $this->belongsTo(TahapPengajuan::class, 'id_tahap_pengajuan', 'id');
    }
    public function tahap_fiksasi () {
        return $this->hasMany(TahapFiksasi::class, 'id_tahap_fiksasi', 'id');
    }
}
