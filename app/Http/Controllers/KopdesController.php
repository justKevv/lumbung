<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKopdesRequest;
use App\Http\Requests\UpdateKopdesRequest;
use App\Models\Kopdes;
use Creasi\Nusa\Models\District;
use Creasi\Nusa\Models\Province;
use Creasi\Nusa\Models\Regency;
use Creasi\Nusa\Models\Village;

class KopdesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::all();

        return view('kopdes', ['provinces' => $provinces]); 
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
    public function store(StoreKopdesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kopdes $kopdes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kopdes $kopdes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKopdesRequest $request, Kopdes $kopdes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kopdes $kopdes)
    {
        //
    }

    public function regencies(Province $province)
    {
        return Regency::where('province_code', $province->code)
            ->orderBy('name')
            ->get(['code', 'name']);
    }

    
    public function districts(Regency $regency)
    {
        return District::where('regency_code', $regency->code)
            ->orderBy('name')
            ->get(['code', 'name']);
    }
    
    public function villages(District $district)
    {
        return Village::where('district_code', $district->code)
            ->orderBy('name')
            ->get(['code', 'name', 'postal_code']);
    }
}
