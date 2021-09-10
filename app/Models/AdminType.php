<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminType extends Model
{
    use HasFactory;
    protected $table = "admin_types";
    protected $fillable = [
        'admin_type',
        'permissions'
    ];
    
    public function administrators () {
        return $this->hasMany(Administrator::class, 'type_id', 'id');
    }
}
