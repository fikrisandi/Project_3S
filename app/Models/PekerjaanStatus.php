<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanStatus extends Model
{
    use HasFactory;
    protected $table = "pekerjaan_status";
    protected $fillable = [
        'status'
    ];

    public function pekerjaan_status () {
        return $this->hasMany(PekerjaanStatus::class, 'pekerjaan_id', 'id');
    }
}
