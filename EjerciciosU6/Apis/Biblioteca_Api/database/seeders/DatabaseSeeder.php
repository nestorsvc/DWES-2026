<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Usuario de Prueba',
            'email' => 'dwes@educantabria.es',
            'password' => bcrypt('laravel'),
        ]);

        // $this->call(AuthorsTableSeeder::class);
        // $this->call(BooksTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);

    }
}
