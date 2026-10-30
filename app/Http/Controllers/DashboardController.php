<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->can('manage-admin')) {
            $kopdesId = $user->admins()->value('kopdes_id');

            return view('dashboard', [
                'lowStocks' => Stock::where('kopdes_id', $kopdesId)->lowStock()->with('product')->get(),
                'stocks' => Stock::where('kopdes_id', $kopdesId)->with('product')->get(),
            ]);
        }

        return view('dashboard', [
            'lowStocks' => Stock::lowStock()->with('product', 'kopdes')->get(),
        ]);
    }
}
