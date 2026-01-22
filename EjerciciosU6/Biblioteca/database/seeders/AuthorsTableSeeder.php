<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('authors')->insert([
            [
                'name' => 'Gabriel García Márquez',
                'country' => 'Colombia',
                'birth_date' => '1927-03-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Miguel de Cervantes',
                'country' => 'España',
                'birth_date' => '1547-09-29',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Jane Austen',
                'country' => 'Reino Unido',
                'birth_date' => '1775-12-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Haruki Murakami',
                'country' => 'Japón',
                'birth_date' => '1949-01-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
