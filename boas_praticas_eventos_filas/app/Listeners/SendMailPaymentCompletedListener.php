<?php

namespace App\Listeners;

use App\Events\PaymentCompleted;
use App\Mail\PaymentCompleted as MailPaymentCompleted;

class SendMailPaymentCompletedListener
{

    /**
     * Handle the event.
     *
     * @param  PaymentCompleted  $event
     * @return void
     */
    public function handle(PaymentCompleted $event)
    {
        $order = $event->getOrder();
        \Mail::to($order->user)->queue(new MailPaymentCompleted($order, $order->user));
    }
}
