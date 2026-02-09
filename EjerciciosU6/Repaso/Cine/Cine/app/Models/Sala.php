<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = ["nombre","capacidad","tipo","activa"];

    public function peliculas(){
        return $this->hasMany(Pelicula::class);
    }
}
