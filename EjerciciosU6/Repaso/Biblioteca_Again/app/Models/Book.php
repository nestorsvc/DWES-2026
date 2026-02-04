<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title","isbn","author_id","published_at","pages","price"];

    protected $casts = [
        "published_at"=>"date"
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
