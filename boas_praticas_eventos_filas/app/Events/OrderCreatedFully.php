<?php

namespace App\Events;

use App\Order;

class OrderCreatedFully
{
    /**
     * @var Order
     */
    private $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
    }
}
