<?php

namespace App\Events;

use App\Product;

class ProductUpdated
{
    /**
     * @var Product
     */
    public $product;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        //
        $this->product = $product;
    }
}
