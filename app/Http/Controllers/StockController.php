<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Product;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::with('product', 'kopdes')->get();
        $products = Product::get(['id', 'name']);
        $fields = ['product.name', 'product.price', 'total'];
        $kopdesId = auth()->user()->admins()->value('kopdes_id');
        $stockedProductIds = Stock::where('kopdes_id', $kopdesId)->pluck('product_id');
        
        return view('stock', compact('stocks', 'fields', 'products', 'stockedProductIds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockRequest $request)
    {
        
        Stock::create([
            'product_id' => $request->product,
            'kopdes_id' => $request->user()->admins()->value('kopdes_id'),
            'total' => $request->total
        ]);

        return redirect()->route('stock.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->update([
            'product_id' => $request->product,
            'kopdes_id' => $request->user()->admins()->value('kopdes_id'),
            'total' => $request->total
        ]);

        return redirect()->route('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index');
    }
}
