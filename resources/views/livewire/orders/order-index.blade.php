<div>
    <div class="p-6 max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Pedidos
            </h2>
            {{-- Botón para crear pedido (ruta que haremos después) --}}
            <a href="{{ route('orders.create') }}" wire:navigate
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Nuevo Pedido
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <table class="w-full text-left">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="p-3"># Pedido</th>
                        <th class="p-3">Cliente</th>
                        <th class="p-3">Atendido por</th>
                        <th class="p-3">Fecha</th>
                        <th class="p-3">Total</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="border-b dark:border-gray-700">
                            <td class="p-3">
                                {{ $loop->iteration }}</td>


                            {{-- ACÁ USAMOS LAS RELACIONES --}}
                            <td class="p-3">{{ $order->customer->name }}</td>
                            <td class="p-3">{{ $order->user->name }}</td>

                            <td class="p-3">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="p-3 font-bold">Bs. {{ $order->total }}</td>
                            <td class="p-3">
                                @if ($order->status === 'pending')
                                    <span class="text-yellow-600 font-semibold">Pendiente</span>
                                @elseif($order->status === 'paid')
                                    <span class="text-green-600 font-semibold">Pagado</span>
                                @else
                                    <span class="text-red-600 font-semibold">Cancelado</span>
                                @endif
                            </td>
                            <td class="p-3">
                                <button class="text-blue-600 hover:text-blue-800 font-medium">
                                    <a href="{{ route('orders.show', $order) }}" wire:navigate
                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                        Ver detalle
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-3 text-center text-gray-500">
                                No hay pedidos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
