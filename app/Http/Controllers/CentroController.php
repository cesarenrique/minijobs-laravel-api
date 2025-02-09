<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\CarreraCentro;
use App\Models\Carrera;

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
        ]);

        $centro=Centro::create([
            'nombre'=>$request->nombre,
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


    public function showCarreras(string $id)
    {
        //
        $centro=Centro::findOrFAil($id);
        $carreraCentros=CarreraCentro::where('centro_id','like',$centro->id)->get();
        $carreras=[];
        foreach($carreraCentros as $carreraCentro){
            $carreras[]=Carrera::findOrFail($carreraCentro->carrera_id);
        }
        return response()->json(
            ['data'=>[
                'centro'=> $centro,
                'carreras'=>$carreras
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
