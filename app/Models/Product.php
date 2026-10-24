<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{

    protected function casts(): array
    {
        return
            [
                'price' => 'decimal:2',
                'active' => 'boolean',
            ];
    }
    //
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'active'
    ];

    public function orderItems()
    {
        return $this->HasMany(OrderItem::class);
    }
}
