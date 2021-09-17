<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = "pekerjaan";
    protected $fillable = [
        'nama_pekerjaan',
        'file_rab',
        'file_tor_sw',
        'file_laporan'
    ];
    public function pekerjaan_kategori () {
        return $this->belongsTo(PekerjaanKategori::class, 'kategori_id', 'id');
    }
    public function pekerjaan_status () {
        return $this->belongsTo(PekerjaanStatus::class, 'status_id', 'id');
    }
    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function pekerjaan_meet () {
        return $this->hasMany(PekerjaanMeet::class, 'pekerjaan_id', 'id');
    }
    public function pekerjaan_pembayaran () {
        return $this->hasMany(PekerjaanPembayaran::class, 'pekerjaan_id', 'id');
    }
}
