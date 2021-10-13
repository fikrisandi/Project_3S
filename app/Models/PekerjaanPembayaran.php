<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanPembayaran extends Model
{
    use HasFactory;
    protected $table = "pekerjaan_pembayaran";
    protected $fillable = [
        'pembayaran_total',
        'pembayaran_dp',
        'pembayaran_dp_bukti',
        'pembayaran_sisa',
        'pembayaran_sisa_bukti',
        'pekerjaan_id'
    ];

    public function pekerjaan () {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id', 'id');
    }
}
