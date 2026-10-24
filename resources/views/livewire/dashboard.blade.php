<div>
    <div class="p-6 max-w-7xl mx-auto">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Panel de Control</h2>

        {{-- Grid de Tarjetas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            {{-- Tarjeta 1: Ventas Hoy --}}
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                <p class="text-sm text-gray-500 font-medium mb-1">Ventas de Hoy</p>
                <p class="text-3xl font-bold text-gray-800">Bs. {{ number_format($ventasHoy, 2) }}</p>
            </div>

            {{-- Tarjeta 2: Ventas del Mes --}}
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                <p class="text-sm text-gray-500 font-medium mb-1">Ventas del Mes</p>
                <p class="text-3xl font-bold text-gray-800">Bs. {{ number_format($ventasMes, 2) }}</p>
            </div>

            {{-- Tarjeta 3: Pedidos Hoy --}}
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
                <p class="text-sm text-gray-500 font-medium mb-1">Pedidos Atendidos Hoy</p>
                <p class="text-3xl font-bold text-gray-800">{{ $pedidosHoy }}</p>
            </div>

        </div>

        {{-- Alerta de Bajo Stock --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <span class="text-red-500 mr-2">⚠️</span> Alerta de Stock Bajo
            </h3>

            @if ($bajoStock->isEmpty())
                <p class="text-gray-500">Todos los productos tienen stock suficiente.</p>
            @else
                <table class="w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">Producto</th>
                            <th class="p-3">Stock Restante</th>
                            <th class="p-3">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bajoStock as $product)
                            <tr class="border-b">
                                <td class="p-3 font-medium">{{ $product->name }}</td>
                                <td class="p-3 text-red-600 font-bold">{{ $product->stock }}</td>
                                <td class="p-3">
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="text-blue-600 hover:underline">
                                        Reponer stock
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
</div>
