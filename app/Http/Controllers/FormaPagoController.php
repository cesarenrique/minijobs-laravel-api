<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormaPago;

class FormaPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $formaPagos=FormaPago::All();
        return response()->json(
            ['data'=>[
                'formaPagos'=> $formaPagos
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
        $formaPago=FormaPago::findOrFail($id);
        return response()->json(
            ['data'=>[
                'formaPago'=> $formaPago
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
