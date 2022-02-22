<?php

namespace App\Listeners;

use App\Events\OrderProductsSaveCompleted;

class CalculateTotalOrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderProductsSaveCompleted  $event
     * @return void
     */
    public function handle(OrderProductsSaveCompleted $event)
    {
        $order = $event->order;
        $sum = 0;

        foreach ($order->products as $orderProduct) {
            $sum += ($orderProduct->price * $orderProduct->quantity);
        }
        $order->total = $sum;
        $order->save();
    }
}
