<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderPdfController extends Controller
{
    public function download(Order $order)
    {
        // 1. Cargamos la vista 'pdf.order' y le pasamos el pedido
        $pdf = Pdf::loadView('pdf.order', compact('order'));

        // 2. Le decimos que descargue el archivo con un nombre específico
        return $pdf->download('Pedido-' . $order->id . '.pdf');
    }
}
