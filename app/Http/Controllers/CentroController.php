<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $centros=Centro::All();
        return response()->json(
            ['data'=>[
                'centros'=> $centros
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

        $validated=$request->validate([
            'nombre'=>'required',
            'anyo_plan_academico_id'=>'required'
        ]);

        $centro=Centro::create([
            'nombre'=>$request->nombre,
            'anyo_plan_academico_id'=>$request->anyo_plan_academico_id,

        ]);


        return response()->json(
            ['data'=>[
                'centro'=> $centro
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $centro=Centro::findOrFAil($id);
        return response()->json(
            ['data'=>[
                'centro'=> $centro
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
