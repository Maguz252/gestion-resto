<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\WithPagination;
use Livewire\Component;

class CustomerIndex extends Component
{
    use WithPagination;


    public string $search = '';

    public function delete($id)
    {
        Customer::findOrFail($id)->delete();
        session()->flash('success', 'Cliente eliminado correctamente.');
    }

    public function render()
    {
        $customers = Customer::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(10);
        return view('livewire.customers.customer-index', ['customers' => $customers]);
    }
}
