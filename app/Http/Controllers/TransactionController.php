<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Kopdes;
use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kopdesId = auth()->user()->admins()->value('kopdes_id');
    
        $transactions = Transaction::where('kopdes_id', $kopdesId)
            ->with('details.product')
            ->latest('date')
            ->get();
        $fields = ['name', 'date'];
    
        return view('transaction', compact('transactions', 'fields'));
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
    public function store(StoreTransactionRequest $request)
    {
        $kopdesId = $request->user()->admins()->value('kopdes_id');
    
        DB::transaction(function () use ($request, $kopdesId) {
            Kopdes::whereKey($kopdesId)->lockForUpdate()->firstOrFail();

            $details = collect($request->validated('details'));

            $needed = $details->groupBy('product_id')->map(fn ($rows) => $rows->sum('total'));

            $stocks = Stock::with('product')
                ->where('kopdes_id', $kopdesId)
                ->whereIn('product_id', $needed->keys())
                ->lockForUpdate()
                ->get()
                ->keyBy('product_id');

            foreach ($needed as $productId => $quantity) {
                $stock = $stocks->get($productId);
    
                if (! $stock || $stock->total < $quantity) {
                    throw ValidationException::withMessages([
                        'details' => 'Stok '.($stock?->product->name ?? 'produk').' tidak cukup (tersisa '.($stock?->total ?? 0).').',
                    ]);
                }
            }
    
            $number = Transaction::where('kopdes_id', $kopdesId)->count() + 1;
    
            $transaction = Transaction::create([
                'kopdes_id' => $kopdesId,
                'name' => "transactions-{$number}",
                'date' => now()->toDateString(),
            ]);
    
            $transaction->details()->createMany($request->validated('details'));
            
            foreach ($needed as $productId => $quantity) {
                $stocks->get($productId)->decrement('total', $quantity);
            }
        });
    
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
