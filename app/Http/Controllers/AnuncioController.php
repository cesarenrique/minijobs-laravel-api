<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\CargoEmpresa;
use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\BuscaSkill;
use App\Models\Skill;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $anuncios=Anuncio::All();
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

        $validated=$request->validate([
            'titulo'=>'required|min:5|max:80',
            'descripcion'=>'required',
            'estado'=>'required',
            'inicio'=>'required',
            'cargo_empresa_id'=>'required',
            'reclutador_id'=>'required',
        ]);

        $anuncio=Anuncio::create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'estado'=>$request->estado,
            'inicio'=>$request->inicio,
            'cargo_empresa_id'=>$request->cargo_empresa_id,
            'reclutador_id'=>$request->reclutador_id,
        ]);


        return response()->json(
            ['data'=>[
                'anuncio'=> $anuncio
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $anuncio=Anuncio::findOrFail($id);
        return response()->json(
            ['data'=>[
                'anuncio'=> $anuncio
                 ],
            ],200);
    }

        /**
     * Display the specified resource.
     */
    public function showComplete(string $id)
    {
        //
        $anuncio=Anuncio::findOrFail($id);
        $cargoEmpresa=CargoEmpresa::findOrFail($anuncio->cargo_empresa_id);
        $cargo=Cargo::findOrFail($cargoEmpresa->cargo_id);
        $empresa=Empresa::findOrFail($cargoEmpresa->empresa_id);
        $buscaSkills=BuscaSkill::where('anuncio_id','like',$anuncio->id)->get();
        $skills=[];
        foreach($buscaSkills as $buscaSkill){
            $skills[]=Skill::findOrFail($buscaSkill->skill_id);
        }

        return response()->json(
            ['data'=>[
                'anuncio'=> $anuncio,
                'cargo'=> $cargo,
                'empresa'=> $empresa,
                'skills'=>$skills
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
