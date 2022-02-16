<?php

namespace App\Listeners;

use App\Events\StockEntryCreated;

class IncrementStockListener
{
    /**
     * Handle the event.
     *
     * @param  StockEntryCreated  $event
     * @return void
     */
    public function handle(StockEntryCreated $event)
    {
        echo 'handle';
        $entry = $event->entry;
        $product = $entry->product;
        $product->stock = $product->stock + $entry->quantity;
        $product->save();
    }
}
