<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdentitas extends Model
{
    use HasFactory;
    protected $table = "user_identitas";
    protected $fillable = [
        'no_telfon',
        'kota_domisili',
        'nama_ktp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'profesi',
        'nama_perusahaan',
        'foto_ktp',
        'nik',
        'user_id',
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
