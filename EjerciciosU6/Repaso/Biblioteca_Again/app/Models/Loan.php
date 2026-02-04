<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ["book_id","user_id","loaned_at","returned_at","status"];
    protected $casts = [
        "loaned_at"=>"date",
        "returned_at"=>"date"
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
