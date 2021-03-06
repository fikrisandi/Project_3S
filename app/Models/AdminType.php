<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminType extends Model
{
    use HasFactory;
    protected $table = "admin_type";
    protected $fillable = [
        'admin_type',
        'permissions'
    ];
    
    public function administrator () {
        return $this->hasMany(Administrator::class, 'type_id', 'id');
    }
}
