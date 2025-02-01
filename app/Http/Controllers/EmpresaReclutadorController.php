<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpresaReclutador;

class EmpresaReclutadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empresaReclutadores=EmpresaReclutador::All();
        return response()->json(
            ['data'=>[
                'empresaReclutadores'=> $empresaReclutadores
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
            'reclutador_id'=>'required',
            'empresa_id'=>'required',

        ]);

        $empresaReclutador=EmpresaReclutador::create([
            'reclutador_id'=>$request->reclutador_id,
            'empresa_id'=>$request->empresa_id,

        ]);


        return response()->json(
            ['data'=>[
                'empresaReclutador'=> $empresaReclutador
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $empresaReclutador=EmpresaReclutador::findOrFail($id);
        return response()->json(
            ['data'=>[
                'empresaReclutador'=> $empresaReclutador
                 ],
            ],200);
    }

        /**
     * Display the specified resource.
     */
    public function showExiste(string $idEmpresa,string $idReclutador)
    {
        //
        $empresaReclutador=EmpresaReclutador::where('empresa_id','like',$idEmpresa)->where('reclutador_id','like',$idReclutador)->get();
        if(count($empresaReclutador)>=1){
            return response()->json(
                ['data'=>[
                    'empresaReclutador'=> $empresaReclutador->firstOrFail()
                     ],
                ],200);
        }

        return response()->json(
            ['data'=>[
                'empresaReclutador'=> null
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
