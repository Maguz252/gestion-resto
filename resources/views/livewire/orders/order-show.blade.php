<div>
    <div class="p-6 max-w-4xl mx-auto">

        {{-- Botón volver --}}
        <div class="mb-4">
            <a href="{{ route('orders.index') }}" wire:navigate class="text-blue-600 hover:text-blue-800 font-medium">
                &larr; Volver a pedidos
            </a>
            <a href="{{ route('orders.pdf', $order) }}"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium inline-block mb-4">
                Descargar Ticket PDF
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">

            {{-- Cabecera --}}
            <div class="border-b pb-4 mb-4 flex justify-between items-start">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Pedido #{{ $order->id }}</h2>
                    <p class="text-gray-500 mt-1">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500">Estado:</p>
                    @if ($order->status === 'pending')
                        <span class="text-yellow-600 font-bold text-lg">Pendiente</span>
                    @elseif($order->status === 'paid')
                        <span class="text-green-600 font-bold text-lg">Pagado</span>
                    @else
                        <span class="text-red-600 font-bold text-lg">Cancelado</span>
                    @endif
                </div>
            </div>

            {{-- Datos del cliente y empleado --}}
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-sm text-gray-500">Cliente:</p>
                    <p class="font-medium text-gray-800">{{ $order->customer->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Atendido por:</p>
                    <p class="font-medium text-gray-800">{{ $order->user->name }}</p>
                </div>
            </div>

            {{-- Tabla de productos (Items) --}}
            <h3 class="font-bold text-gray-700 mb-2">Productos</h3>
            <table class="w-full text-left mb-6 border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Producto</th>
                        <th class="p-2 text-center">Cantidad</th>
                        <th class="p-2 text-right">Precio Unit.</th>
                        <th class="p-2 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr class="border-t">
                            <td class="p-2">{{ $item->product->name }}</td>
                            <td class="p-2 text-center">{{ $item->quantity }}</td>
                            <td class="p-2 text-right">Bs. {{ $item->unit_price }}</td>
                            <td class="p-2 text-right font-medium">Bs. {{ $item->subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Total --}}
            <div class="flex justify-end text-xl font-bold border-t pt-4">
                <span class="mr-4">Total:</span>
                <span>Bs. {{ $order->total }}</span>
            </div>

        </div>
    </div>
</div>
