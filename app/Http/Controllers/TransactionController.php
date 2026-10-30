<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Kopdes;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
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
    
            $number = Transaction::where('kopdes_id', $kopdesId)->count() + 1;
    
            $transaction = Transaction::create([
                'kopdes_id' => $kopdesId,
                'name' => "transactions-{$number}",
                'date' => now()->toDateString(),
            ]);
    
            $transaction->details()->createMany($request->validated('details'));
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
