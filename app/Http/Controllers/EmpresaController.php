<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empresas=Empresa::All();

        return response()->json(
            ['data'=>[
                'empresas'=> $empresas
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
        $validated=$request->validate([
            'nombre'=>'required|max:50',
            'tamanyo'=>'required',
            'email'=>'required|email|max:60',
            'NIF'=>'required|min:8',
            'encargado_id'=>'required'
        ]);

        $logo="https//www.google.com";
        $empresa=Empresa::create([
            'logo'=>$logo,
            'nombre'=>$request->nombre,
            'email'=>$request->email,
            'tamanyo'=>$request->tamanyo,
            'NIF'=>$request->NIF,
            'encargado_id'=>$request->encargado_id
        ]);

        /*
        $sinrol=SinRol::create([
            'user_id'=>$user->id
        ]);*/

        return response()->json(
            ['data'=>[
                //'token'=> $user->createToken('token')->plainTextToken,
                'empresa'=> $empresa
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $empresa=Empresa::findOrFail($id);

        return response()->json(
            ['data'=>[
                'empresa'=> $empresa
                 ],
            ],200);
    }

        /**
     * Display the specified resource.
     */
    public function showEncargadoEmpresas(string $idEncargado)
    {
        //
        $empresas=Empresa::where('encargado_id','like',$idEncargado)->get();

        return response()->json(
            ['data'=>[
                'empresas'=> $empresas
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
