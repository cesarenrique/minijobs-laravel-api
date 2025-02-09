<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignatura;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $asignaturas=Asignatura::All();
        return response()->json(
            ['data'=>[
                'asignaturas'=> $asignaturas
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
            'carrera_id'=>'required'
        ]);

        $asignatura=Asignatura::create([
            'nombre'=>$request->nombre,
            'carrera_id'=>$request->carrera_id,
        ]);


        return response()->json(
            ['data'=>[
                'asignatura'=> $asignatura
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $asignatura=Asignatura::findOrFail($id);
        return response()->json(
            ['data'=>[
                'asignatura'=> $asignatura
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
