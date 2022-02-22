<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $casts = [
        'price' => 'float',
        'quantity' => 'integer'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
