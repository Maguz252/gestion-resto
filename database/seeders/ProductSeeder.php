<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([

            'name' => 'pizza',
            'description' => 'es cuadrada con queso',
            'price' => 40.30,
            'stock' => 6,
            'active' => false,

        ]);
        Product::create([

            'name' => 'hamburguesa',
            'description' => 'es con doble carne',
            'price' => 20.30,
            'stock' => 4,


        ]);

        Product::create([

            'name' => 'salteñas',
            'description' => 'es picante',
            'price' => 8,
            'stock' => 2,


        ]);

        Product::create([

            'name' => 'cuñape',
            'description' => 'es para toda la familia',
            'price' =>  2,
            'stock' => 6,
            'active' => false,

        ]);

        Product::create([

            'name' => 'empanada',
            'description' => 'es acida',
            'price' => 3.5,
            'stock' => 6,


        ]);
    }
}
