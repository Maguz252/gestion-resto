<div>
    <div>
        <div class="p-6 max-w-7xl mx-auto">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-6">
                Productos
            </h2>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <input type="text" wire:model.live="search" placeholder="Buscar producto..."
                    class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white mb-4">

                <table class="w-full text-left">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Descripción</th>
                            <th class="p-3">Precio</th>
                            <th class="p-3">Stock</th>
                            <th class="p-3">Estado</th>
                            <th class="p-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="border-b dark:border-gray-700">
                                <td class="p-3">{{ $product->name }}</td>
                                <td class="p-3">{{ $product->description }}</td>
                                <td class="p-3">{{ $product->price }}</td>
                                <td class="p-3">{{ $product->stock }}</td>
                                <td class="p-3">
                                    @if ($product->active)
                                        <span class="text-green-600 font-semibold">Activo</span>
                                    @else
                                        <span class="text-red-600 font-semibold">Inactivo</span>
                                    @endif
                                </td>
                                <td class="p-3">
                                    {{-- Botones editar/eliminar en la próxima misión --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-3 text-center text-gray-500">
                                    No hay productos.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
