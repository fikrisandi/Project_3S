<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanMeet extends Model
{
    use HasFactory;
    protected $table = "pekerjaan_meet";
    protected $fillable = [
        'meet_pengajuan_jadwal',
        'meet_pengajuan_link',
        'meet_pelaporan_jadwal',
        'meet_pelaporan_link'
    ];

    public function pekerjaan () {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id', 'id');
    }
}
