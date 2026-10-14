<?php

namespace App\Livewire\Products;


use App\Models\Product;
use Livewire\Component;

class ProductForm extends Component
{
    public string $name = '';
    public ?string $description = '';
    public $price = '';
    public int $stock = 0;
    public bool $active = true;



    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|numeric',
            'active' => 'boolean',
        ];
    }


    public function save()
    {
        $validated = $this->validate();
        Product::create($validated);

        session()->flash('success', '¡Producto guardado!');
        return $this->redirect(route('products.index'), navigate: true);
    }
    public function render()
    {
        return view('livewire.products.product-form');
    }
}
