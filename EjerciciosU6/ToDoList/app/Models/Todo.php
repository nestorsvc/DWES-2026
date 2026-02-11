<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title','descripcion','completed','user_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
