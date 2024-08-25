<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usermodul extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users_modul';
    protected $primaryKey = 'id_umod';
    protected $fillable = ['id_umod', 'id_session', 'id_modul']; 

    public function user()
    {
        return $this->hasMany(User::class, 'id_session', 'id_session');
    }

    public function modul()
    {  
        return $this->belongsTo(Manajemenmodul::class, 'id_modul', 'id_modul');
    }
}
