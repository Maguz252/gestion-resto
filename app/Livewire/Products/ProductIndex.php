<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductIndex extends Component
{
    use WithPagination;

    public string $search = '';



    public function render()
    {
        $products = Product::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))->latest()->paginete(10);
        return view('livewire.products.product-index', ['product' => $products]);
    }

    public function updating($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
