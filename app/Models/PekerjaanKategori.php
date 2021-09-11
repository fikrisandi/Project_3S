<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanKategori extends Model
{
    use HasFactory;
    protected $table = "pekerjaan_kategori";
    protected $fillable = [
        'kategori',
        'deskripsi'
    ];

    public function pekerjaan_kategori () {
        return $this->hasMany(PekerjaanKategori::class, 'pekerjaan_id', 'id');
    }
}
