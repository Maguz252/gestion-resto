<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
}
