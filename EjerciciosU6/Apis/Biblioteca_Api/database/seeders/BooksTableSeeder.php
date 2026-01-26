<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'To Kill a Mockingbird',
                'isbn' => '978-0-06-112008-4',
                'author_id' => 1,
                'published_year' => 1960,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Go Set a Watchman',
                'isbn' => '978-0-06-240985-0',
                'author_id' => 1,
                'published_year' => 2015,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
