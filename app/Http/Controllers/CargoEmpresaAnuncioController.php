<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargoEmpresa;
use App\Models\Anuncio;

class CargoEmpresaAnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexAnuncios($cargo,$empresa)
    {
        //
        $cargo=CargoEmpresa::where('empresa_id','like',$empresa)->where('cargo_id','like',$cargo)->firstOrFail();
        $anuncios="";
        if($cargo->id!=null){
            $anuncios=Anuncio::Where('cargo_empresa_id','like',$cargo->id)->get();
        }
        return response()->json(
            ['data'=>[
                'anuncios'=> $anuncios
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
