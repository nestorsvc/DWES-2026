<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            "title"=>"Hit them up",
            "isbn"=>"12319388923",
            "author_id"=>1,
            "published_at"=>"1996",
            "pages"=>345,
            "price"=>12.5
        ]);
    }
}
