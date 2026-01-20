<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Novela',
                'slug' => Str::slug('Novela'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poesía',
                'slug' => Str::slug('Poesía'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ensayo',
                'slug' => Str::slug('Ensayo'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ciencia ficción',
                'slug' => Str::slug('Ciencia ficción'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fantasía',
                'slug' => Str::slug('Fantasía'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
