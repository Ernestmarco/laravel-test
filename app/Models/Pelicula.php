<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    public $fillable = [
        'titulo',
        'descripcion'
    ];

    public function comentaris(){
        return $this->hasMany(Comentari::class);
    }
}
