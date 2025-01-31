<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cargos=Cargo::All();
        return response()->json(
            ['data'=>[
                'cargos'=> $cargos
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
            'titulo'=>'required|min:5|max:80',
            'descripcion'=>'required',
        ]);

        $cargo=Cargo::create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,

        ]);


        return response()->json(
            ['data'=>[
                'cargo'=> $cargo
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cargo=Cargo::findOrFail($id);
        return response()->json(
            ['data'=>[
                'cargo'=> $cargo
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
