<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Leche entera',
            'precio' => 1.20,
            'categoria_id' => 1,
            'activo' => true
        ]);

        Producto::create([
            'nombre' => 'Queso curado',
            'precio' => 3.50,
            'categoria_id' => 1,
            'activo' => true
        ]);

        Producto::create([
            'nombre' => 'Yogur natural',
            'precio' => 0.80,
            'categoria_id' => 1,
            'activo' => true
        ]);

        // FRUTOS SECOS (id = 2)
        Producto::create([
            'nombre' => 'Almendras',
            'precio' => 2.50,
            'categoria_id' => 2,
            'activo' => true
        ]);

        Producto::create([
            'nombre' => 'Nueces',
            'precio' => 3.00,
            'categoria_id' => 2,
            'activo' => true
        ]);

        Producto::create([
            'nombre' => 'Anacardos',
            'precio' => 2.80,
            'categoria_id' => 2,
            'activo' => true
        ]);

        // BEBIDA (id = 3)
        Producto::create([
            'nombre' => 'Agua mineral',
            'precio' => 0.60,
            'categoria_id' => 3,
            'activo' => true
        ]);

        Producto::create([
            'nombre' => 'Refresco cola',
            'precio' => 1.30,
            'categoria_id' => 3,
            'activo' => true
        ]);

        Producto::create([
            'nombre' => 'Zumo de naranja',
            'precio' => 1.10,
            'categoria_id' => 3,
            'activo' => true
        ]);

        // CARNE (id = 4)
        Producto::create([
            'nombre' => 'Pechuga de pollo',
            'precio' => 5.50,
            'categoria_id' => 4,
            'activo' => true
        ]);

        Producto::create([
            'nombre' => 'Carne picada',
            'precio' => 4.20,
            'categoria_id' => 4,
            'activo' => true
        ]);

        Producto::create([
            'nombre' => 'Filete de ternera',
            'precio' => 7.80,
            'categoria_id' => 4,
            'activo' => true
        ]);
    }
}
