<div>
    <div class="p-6 max-w-3xl mx-auto">

        {{-- Título --}}
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            {{ $customerId ? 'Editar producto' : 'Nuevo producto' }}
        </h2>

        {{-- Tarjeta --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">

            <form wire:submit="save" class="space-y-5">

                {{-- Nombre --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nombre
                    </label>
                    <input type="text" wire:model="name"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                    @error('name')
                        <span class="text-red-500 text-sm mt-1">tiene que agregar un nombre</span>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="email" wire:model="email"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">tiene que agregar un correo</span>
                    @enderror
                </div>

                {{-- Telefono --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Numero telofonico
                    </label>
                    <input type="number" wire:model="phone"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                    @error('phone')
                        <span class="text-red-500 text-sm mt-1">tiene que ser numero porfavor no texto
                            {{ $message }}</span>
                    @enderror
                </div>

                {{-- Dirrecion y notes(dos columnas) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Dirreccion
                        </label>
                        <input type="text" wire:model="address"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">

                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Notas
                        </label>
                        <input type="text" wire:model="notes"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                    </div>
                </div>



                {{-- Botón --}}
                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition">
                        Guardar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
