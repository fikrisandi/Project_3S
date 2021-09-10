<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapFiksasi extends Model
{
    use HasFactory;
    protected $table = "tahap_pengajuan";
    protected $fillable = [
        'meet_pelaporan_jadwal',
        'meet_pelaporan_link',
        'tarif_sisa',
        'pembayaran_sisa_bukti'
    ];
    public function tahap_pembayaran () {
        return $this->belongsTo(TahapPembayaran::class, 'id_tahap_pembayaran', 'id');
    }
}
