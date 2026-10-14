<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductForm extends Component
{
    public ?int $productId = null;
    public string $name = '';
    public ?string $description = '';
    public $price = '';
    public int $stock = 0;
    public bool $active = true;

    public function mount(?Product $product = null)
    {
        if ($product && $product->exists) {
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->active = $product->active;
        }
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'active' => 'boolean',
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->productId) {
            Product::findOrFail($this->productId)->update($validated);
            $message = '¡Producto actualizado!';
        } else {
            Product::create($validated);
            $message = '¡Producto guardado!';
        }

        session()->flash('success', $message);
        return $this->redirect(route('products.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.products.product-form');
    }
}
