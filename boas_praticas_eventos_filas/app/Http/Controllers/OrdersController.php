<?php

namespace App\Http\Controllers;

use App\Events\OrderProductsSaveCompleted;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function index()
    {
        $order = Order::find(1);
        return response()->json($order->products);
    }

    public function create()
    {
        $products = Product::all()->random(rand(3, 9));
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $order = Order::forceCreate([
            'user_id' => Auth::user()->id
        ]);

        foreach ($request->get('products') as $orderProduct) {
            $product = Product::find($orderProduct['product_id']);
            OrderProduct::forceCreate([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'price' => $product->price_sale,
                'quantity' => $orderProduct['quantity']
            ]);
        }

        event(new OrderProductsSaveCompleted($order));

        return view('orders.successfully', compact('order'));
    }
}
