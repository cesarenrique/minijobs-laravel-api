<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoRamaCarrera;

class TipoRamaCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipoRamaCarreras=TipoRamaCarrera::All();
        return response()->json(
            ['data'=>[
                'tipoRamaCarreras'=> $tipoRamaCarreras
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
        $tipoRamaCarrera=TipoRamaCarrera::All();
        return response()->json(
            ['data'=>[
                'tipoRamaCarrera'=> $tipoRamaCarrera
                 ],
            ],200);
    }

        /**
     * Display the specified resource.
     */
    public function showCarreras(string $id)
    {
        //
        $tipoRamaCarrera=TipoRamaCarrera::findOrFail($id);
        $carreras=$tipoRamaCarrera->carreras;
        return response()->json(
            ['data'=>[

                'tipoRamaCarrera'=>$tipoRamaCarrera,
                'carreras'=> $carreras,
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
