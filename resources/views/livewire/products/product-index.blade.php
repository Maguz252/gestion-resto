<div>
    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Productos
            </h2>
            <a href="{{ route('products.create') }}" wire:navigate
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Nuevo Producto
            </a>
        </div>

        {{-- Contenedor blanco --}}

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            @if (session()->has('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <input type="text" wire:model.live="search" placeholder="Buscar producto..."
                class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white mb-4">

            <table class="w-full text-left">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="p-3">#</th>
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
                            {{-- Contador correlativo considerando la paginación --}}
                            <td class="p-3">
                                {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>

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
                            {{-- Acciones --}}

                            <td class="p-3">
                                <a href="{{ route('products.edit', $product) }}" wire:navigate
                                    class="text-blue-600 hover:text-blue-800 font-medium me-3">
                                    Editar
                                </a>

                                <button wire:click="delete({{ $product->id }})"
                                    wire:confirm="¿Estás seguro de eliminar este producto?"
                                    class="text-red-600 hover:text-red-800 font-medium">
                                    Eliminar
                                </button>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-3 text-center text-gray-500">
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
