<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargoEmpresa;

class CargoEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cargoEmpresas=CargoEmpresa::All();
        return response()->json(
            ['data'=>[
                'cargoEmpresas'=> $cargoEmpresas
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
            'cargo_id'=>'required',
            'empresa_id'=>'required',

        ]);

        $cargoEmpresa=CargoEmpresa::create([
            'cargo_id'=>$request->cargo_id,
            'empresa_id'=>$request->empresa_id,

        ]);


        return response()->json(
            ['data'=>[
                'cargoEmpresa'=> $cargoEmpresa
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cargoEmpresa=CargoEmpresa::findOrFail($id);
        return response()->json(
            ['data'=>[
                'cargoEmpresa'=> $cargoEmpresa
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
