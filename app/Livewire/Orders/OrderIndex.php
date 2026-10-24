<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderIndex extends Component
{

    use WithPagination;

    public function render()
    {
        $orders = Order::with(['customer', 'user'])
            ->latest()
            ->paginate(10);
        return view('livewire.orders.order-index', ['orders' => $orders]);
    }
}
