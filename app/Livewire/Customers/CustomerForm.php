<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;

class CustomerForm extends Component
{
    //valores publicas declaradas
    public ?int $customerId = null;
    public string $name = '';
    public ?string $email = '';
    public ?string $phone = '';
    public ?string $address = '';
    public string $notes = '';


    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'notes' => 'nullable|string|max:255',
        ];
    }
    //Funcion para editar y crear
    public function mount(?Customer $customer = null)
    {
        if ($customer &&  $customer->exists) {

            $this->customerId = $customer->id;
            $this->name = $customer->name;
            $this->email = $customer->email;
            $this->phone = $customer->phone;
            $this->address = $customer->address;
            $this->notes = $customer->notes;
        }
    }

    public function save()
    {
        $validated = $this->validate();


        //nuevo
        if ($this->customerId) {
            Customer::findOrFail($this->customerId)->update($validated);
            $message = '¡Cliente actualizado!';
        } else {
            Customer::create($validated);
            $message = '¡Cliente guardado!';
        }
        //nuevofin



        session()->flash('success', $message);
        return $this->redirect(route('customer.index'));
    }

    public function render()
    {
        return view('livewire.customers.customer-form');
    }
}
