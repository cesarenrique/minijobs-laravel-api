<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagoLimitacion;

class PagoLimitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pagoLimitaciones=PagoLimitacion::All();
        return response()->json(
            ['data'=>[
                'pagoLimitaciones'=> $pagoLimitaciones
                 ],
            ],200);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pagoLimitacion=PagoLimitacion::findOrFail($id);
        return response()->json(
            ['data'=>[
                'pagoLimitacion'=> $pagoLimitacion
                 ],
            ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
