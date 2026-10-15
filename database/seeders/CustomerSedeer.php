<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Customer::create([
            'name' => 'juan diego',
            'email' => 'diego@test',
            'phone' => '1111',
            'address' => 'santa fe',
            'notes' => 'buscar cemento',
        ]);
        Customer::create([
            'name' => 'Edman',
            'email' => 'edman@test',
            'phone' => '2222',


        ]);
        Customer::create([
            'name' => 'Edwuard',
            'email' => 'edwuard@test',
            'phone' => '3333',
            'address' => 'la paz',

        ]);
        Customer::create([
            'name' => 'josue',
            'email' => 'josue@test',
            'phone' => '4444',

            'notes' => 'ganaderia',
        ]);
        Customer::create([
            'name' => 'mike',

            'phone' => '5555',
            'address' => 'santa fe',
            'notes' => 'madera',
        ]);
    }
}
