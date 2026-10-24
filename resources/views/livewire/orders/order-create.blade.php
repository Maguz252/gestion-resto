<div>
    <div class="p-6 max-w-4xl mx-auto">
        <h2 class="text-xl font-semibold mb-6">Nuevo Pedido</h2>

        <div class="bg-white rounded-lg shadow p-6">
            {{-- ACÁ EMPIEZA EL FORMULARIO --}}
            <form wire:submit="save">

                {{-- 1. Cliente --}}
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700">Cliente</label>
                    <select wire:model="customer_id" class="w-full rounded-lg border-gray-300">
                        <option value="">Seleccione un cliente...</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- 2. Lista de Productos --}}
                <div class="mb-6 border-t pt-4">
                    <h3 class="font-medium text-gray-700 mb-3">Productos</h3>

                    @foreach ($items as $index => $item)
                        <div class="flex gap-3 mb-3 items-end" wire:key="item-{{ $index }}">
                            <div class="flex-1">
                                <label class="block text-sm text-gray-500 mb-1">Producto</label>
                                <select wire:model.live="items.{{ $index }}.product_id"
                                    class="w-full rounded-lg border-gray-300">
                                    <option value="">Seleccione producto...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} (Bs.
                                            {{ $product->price }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-32">
                                <label class="block text-sm text-gray-500 mb-1">Cant.</label>
                                <input type="number" wire:model.live="items.{{ $index }}.quantity"
                                    min="1" class="w-full rounded-lg border-gray-300">
                            </div>

                            @if (count($items) > 1)
                                <button type="button" wire:click="removeItem({{ $index }})"
                                    class="bg-red-100 text-red-600 hover:bg-red-200 px-3 py-2 rounded-lg mb-0.5">
                                    X
                                </button>
                            @endif
                        </div>
                    @endforeach

                    <button type="button" wire:click="addItem"
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium mt-2">
                        + Agregar otro producto
                    </button>
                </div>


                <div class="border-t pt-4 mb-6">
                    <div class="flex justify-between items-center text-lg font-bold">
                        <span>Total:</span>
                        <span>Bs. {{ number_format($this->total, 2) }}</span>
                    </div>
                </div>


                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                        Guardar Pedido
                    </button>
                    <a href="{{ route('orders.index') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded-lg">
                        Cancelar
                    </a>
                </div>

            </form>
            {{-- ACÁ TERMINA EL FORMULARIO --}}
        </div>
    </div>
</div>
