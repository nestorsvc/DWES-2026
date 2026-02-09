<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = ['title', 'isbn', 'published_year', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

     public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function isAvailable()
    {
        return !$this->loans()->whereNull('returned_at')->exists();
    }
}
