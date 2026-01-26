<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'loaned_at',
        'returned_at',
        'status',
    ];

    protected $casts = [
        'loaned_at' => 'datetime',
        'returned_at' => 'datetime',
    ];

    /**
     * Un préstamo pertenece a un libro
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Un préstamo pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
