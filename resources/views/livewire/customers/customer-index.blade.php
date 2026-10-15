<div>

    <div class="p-6 max-w-7xl mx-auto">
        <h2 class= "font-semibold text-xl text-gray-800
     dark:text-gray-200 leading-tight mb-6">Cliente</h2>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            {{-- contenido --}}

            <div class="w-full">
                <h3 class="text-lg font-semibold ml-3 text-slate-800">Lista de clientes</h3>

            </div>
            <input type="text" wire:model.live="search" placeholder="Buscar cliente por nombre..."
                class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white mb-4">
            <div
                class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    #
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    nombre
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    Email
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    telefono
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    dirreccion
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    notas
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    acciones
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                            <tr class="hover:bg-slate-50">
                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $loop->iteration }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $customer->name }}
                                    </p>
                                </td>

                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">

                                        {{ $customer->email ?? 'no tiene datos' }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $customer->phone ?? 'no tiene datos' }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $customer->address ?? 'no tiene datos' }}
                                    </p>
                                </td>

                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $customer->notes ?? 'no tiene datos' }}
                                    </p>
                                </td>

                                <td class="p-3">
                                    <a href="{{ route('customer.edit', $customer) }}" wire:navigate
                                        class="text-blue-600 hover:text-blue-800 font-medium me-3">
                                        Editar
                                    </a>

                                    <button wire:click="delete({{ $customer->id }})"
                                        wire:confirm="¿Estás seguro de eliminar este producto?"
                                        class="text-red-600 hover:text-red-800 font-medium">
                                        Eliminar
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-3 text-center text-gray-500">
                                    No hay clientes
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            {{-- fin contenido --}}
        </div>
    </div>
</div>
