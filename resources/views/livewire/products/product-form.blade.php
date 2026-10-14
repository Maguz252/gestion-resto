<div>
    <div class="p-6 max-w-3xl mx-auto">
        <h2 class="text-xl font-semibold mb-6">
            {{ $productId ? 'Editar producto' : 'Nuevo producto' }}
        </h2>

        <div class="bg-white rounded-lg shadow p-6">
            <form wire:submit="save">

                <!-- 1. Nombre -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">Nombre</label>
                    <input type="text" wire:model="name"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    @error('name')
                        <span class="text-red-500 text-sm mt-1">tiene que agregar un nombre</span>
                    @enderror
                </div>

                <!-- 2. Descripción -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">Descripción</label>
                    <textarea wire:model="description" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>

                </div>

                <!-- 3. Precio -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">Precio</label>
                    <input type="number" step="0.01" wire:model="price"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    @error('price')
                        <span class="text-red-500 text-sm mt-1">debe de agregar un valor</span>
                    @enderror
                </div>

                <!-- 4. Stock -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">Stock</label>
                    <input type="number" wire:model="stock"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    @error('stock')
                        <span class="text-red-500 text-sm mt-1">debe de agregar una cantidad</span>
                    @enderror
                </div>

                <!-- 5. Activo -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        <input type="checkbox" wire:model="active" class="orm-check-input position-static">
                        Activo
                    </label>
                </div>

                <!-- Botones -->
                <div class="flex gap-2">

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Guardar</button>
                    <a href="{{ route('products.index') }}" wire:navigate
                        class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
