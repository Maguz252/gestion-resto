<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Repetimos 5 veces para crear 5 pedidos diferentes
        for ($i = 0; $i < 5; $i++) {

            // PASO 1: Traer datos aleatorios de la DB
            $customer = Customer::inRandomOrder()->first();
            $user = User::inRandomOrder()->first();
            $products = Product::inRandomOrder()->take(3)->get();

            // PASO 2: Crear el pedido SIN items, total en 0
            $order = Order::create([
                'customer_id' => $customer->id,
                'user_id'     => $user->id,
                'total'       => 0,
                'status'      => 'pending',
            ]);

            // PASO 3: Crear los items del pedido, uno por producto
            foreach ($products as $product) {
                $quantity = rand(1, 4);                          // cantidad random 1-4
                $subtotal = $quantity * $product->price;         // subtotal = cantidad × precio

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'quantity'   => $quantity,
                    'unit_price' => $product->price,
                    'subtotal'   => $subtotal,
                ]);
            }

            // PASO 4: Actualizar el total del pedido sumando los subtotales
            // $order->items es la relación que definiste en el modelo Order
            // ->sum('subtotal') suma todos los subtotales
            $order->update([
                'total' => $order->items->sum('subtotal'),
            ]);
        }
    }
}
