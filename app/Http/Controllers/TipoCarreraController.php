<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCarrera;

class TipoCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipoCarreras=TipoCarrera::All();
        return response()->json(
            ['data'=>[
                'tipoCarreras'=> $tipoCarreras
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
        $tipoCarrera=TipoCarrera::findOrFail($id);
        return response()->json(
            ['data'=>[
                'tipoCarrera'=> $tipoCarrera
                 ],
            ],200);
    }


        /**
     * Display the specified resource.
     */
    public function showTipoRamaCarreras(string $id)
    {
        //
        $tipoCarrera=TipoCarrera::findOrFail($id);
        $tipoRamaCarreras=$tipoCarrera->tipoRamaCarreras;
        return response()->json(
            ['data'=>[
                'tipoCarrera'=> $tipoCarrera,
                'tipoRamaCarreras'=>$tipoRamaCarreras
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
