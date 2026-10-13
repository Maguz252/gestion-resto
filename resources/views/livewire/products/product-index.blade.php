<div>

    <x-app-layout>
        <x-slot name="header">
            <h2>Productos</h2>
        </x-slot>
        <!-- Contenido -->

        <input class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white  type="text"
            wire:model.live="search" placeholder="Buscar producto....">

        @forelse ($products as $product)
        @empty
        @endforelse


    </x-app-layout>

</div>
