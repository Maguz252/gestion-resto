<div>
    <div class="p-6 max-w-7xl mx-auto">

        {{-- Título y Botón de Crear --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Clientes
            </h2>
            <a href="{{ route('customers.create') }}" wire:navigate
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Nuevo Cliente
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">

            {{-- Mensaje de éxito (Flash) --}}
            @if (session()->has('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Buscador --}}
            <input type="text" wire:model.live="search" placeholder="Buscar cliente por nombre..."
                class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white mb-4">

            {{-- Tabla --}}
            <table class="w-full text-left">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Teléfono</th>
                        <th class="p-3">Dirección</th>
                        <th class="p-3">Notas</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr class="border-b dark:border-gray-700">
                            <td class="p-3">
                                {{ $loop->iteration }}
                            </td>
                            <td class="p-3">{{ $customer->name }}</td>
                            <td class="p-3">{{ $customer->email ?? 'No tiene' }}</td>
                            <td class="p-3">{{ $customer->phone ?? 'No tiene' }}</td>
                            <td class="p-3">{{ $customer->address ?? 'No tiene' }}</td>
                            <td class="p-3">{{ $customer->notes ?? 'No tiene' }}</td>
                            <td class="p-3">
                                <a href="{{ route('customers.edit', $customer) }}" wire:navigate
                                    class="text-blue-600 hover:text-blue-800 font-medium me-3">
                                    Editar
                                </a>
                                <button wire:click="delete({{ $customer->id }})"
                                    wire:confirm="¿Estás seguro de eliminar este cliente?"
                                    class="text-red-600 hover:text-red-800 font-medium">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-3 text-center text-gray-500">
                                No hay clientes registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Paginación --}}
            <div class="mt-4">
                {{ $customers->links() }}
            </div>

        </div>
    </div>
</div>
