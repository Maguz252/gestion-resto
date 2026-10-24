<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class Dashboard extends Component
{
    public function render()
    {
        // 1. Obtenemos la fecha de hoy y el inicio del mes
        $hoy = Carbon::today();
        $inicioMes = Carbon::now()->startOfMonth();

        // 2. Hacemos las consultas (Queries)
        $ventasHoy = Order::whereDate('created_at', $hoy)->sum('total');
        $ventasMes = Order::where('created_at', '>=', $inicioMes)->sum('total');
        $pedidosHoy = Order::whereDate('created_at', $hoy)->count();

        // 3. Buscamos productos con stock bajo (ej: menor o igual a 5)
        $bajoStock = Product::where('stock', '<=', 5)->get();

        // 4. Enviamos todo a la vista
        return view('livewire.dashboard', [
            'ventasHoy' => $ventasHoy,
            'ventasMes' => $ventasMes,
            'pedidosHoy' => $pedidosHoy,
            'bajoStock' => $bajoStock,
        ]);
    }
}
