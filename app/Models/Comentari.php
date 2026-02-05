<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentari extends Model
{
    use HasFactory;

    public function usuari(){
        return $this->belongsTo(Usuari::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function pelicula(){
        return $this->belongsTo(Pelicula::class);
    }
}
