<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'customer_id',
        'user_id',
        'total',
        'status',
    ];
    protected function casts(): array
    {
        return [
            'total' => 'decimal:2',
        ];
    }


    //relaciones 
    //de order a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    //de order a user
    public function  user()
    {
        return $this->belongsTo(User::class);
    }
    //de item a order 
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
