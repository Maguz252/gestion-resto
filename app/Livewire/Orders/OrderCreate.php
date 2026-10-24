<?php

namespace App\Livewire\Orders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class OrderCreate extends Component
{

    public $products;
    public $customer_id = '';
    public $items = [

        [
            'product_id' => '',
            'quantity' => 1,
        ]
    ];

    protected function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ];
    }

    public function addItem()
    {
        $this->items[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }
    public function getTotalProperty()
    {
        $total = 0;
        foreach ($this->items as $item) {
            if (!empty($item['product_id']) && !empty($item['quantity'])) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $total += $product->price * $item['quantity'];
                }
            }
        }
        return $total;
    }

    public function mount()
    {
        $this->products = Product::all();
    }




    public function render()
    {
        return view(
            'livewire.orders.order-create',
            [
                'customers' => Customer::all(),
                'products' => $this->products,

            ]
        );
    }

    public function save()
    {

        $this->validate();


        DB::transaction(function () {


            $order = Order::create([
                'customer_id' => $this->customer_id,
                'user_id'     => auth()->id(),
                'total'       => 0,
                'status'      => 'pending',
            ]);


            $totalOrder = 0;


            foreach ($this->items as $item) {

                // Busca el producto en la base de datos para saber su precio
                $product = Product::find($item['product_id']);

                // Si el producto existe, hace los cálculos
                if ($product) {
                    $subtotal = $product->price * $item['quantity'];
                    $totalOrder = $totalOrder + $subtotal;


                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $product->id,
                        'quantity'   => $item['quantity'],
                        'unit_price' => $product->price,
                        'subtotal'   => $subtotal,
                    ]);
                }
            }

            // 7. Actualiza el pedido principal con la suma total de todos los productos
            $order->update(['total' => $totalOrder]);
        });

        // 8. Muestra mensaje verde y redirige a la tabla de pedidos
        session()->flash('success', '¡Pedido creado correctamente!');
        return $this->redirect(route('orders.index'));
    }
}
