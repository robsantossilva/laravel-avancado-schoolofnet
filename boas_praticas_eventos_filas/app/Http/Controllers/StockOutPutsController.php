<?php

namespace App\Http\Controllers;

use App\Product;
use App\StockOutput;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class StockOutPutsController extends Controller
{
    public function index()
    {
        $movements = StockOutput::all();
        return view('stock-outputs.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::all()->pluck('name', 'id');
        return view('stock-outputs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = Arr::except($request->all(), '_token');
        StockOutput::forceCreate($data);
        return redirect()->route('stock_outputs.index');
    }
}
