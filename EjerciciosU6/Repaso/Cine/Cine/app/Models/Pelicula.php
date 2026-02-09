<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $fillable = ["titulo","director","duracion","clasificacion","sinopsis","fecha_estreno","sala_id"];

    protected $casts = [
        "fecha_estreno"=>"date"
    ];

    public function salas(){
        return $this->belongsToMany(Sala::class);
    }

}
