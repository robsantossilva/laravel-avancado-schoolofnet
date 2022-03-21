<?php

namespace App\Events;

use App\OrderProduct;

class OrderProductCreated
{
    /**
     * @var OrderProduct
     */
    public $orderProduct;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(OrderProduct $orderProduct)
    {
        //
        $this->orderProduct = $orderProduct;
    }
}
