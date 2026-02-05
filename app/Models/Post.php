<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /*protected $hidden = [
        'created_at',
        'updated_at'
    ];*/

    public $fillable = [
        'titol',
        'contingut',
        'usuari_id'
    ];


    public function usuari(){
        return $this->belongsTo(Usuari::class);
    }

    public function comentaris(){
        return $this->hasMany(Comentari::class);
    }
}
