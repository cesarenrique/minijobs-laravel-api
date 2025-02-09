<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Anuncio;
use App\Models\Alumno;
use App\Models\User;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $candidatos=Candidato::All();
        return response()->json(
            ['data'=>[
                'candidatos'=> $candidatos
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
            'anuncio_id'=>'required',
            'alumno_id'=>'required',

        ]);

        $candidato=Candidato::create([
            'anuncio_id'=>$request->anuncio_id,
            'alumno_id'=>$request->alumno_id,
            'puntuacion_academica'=>floatval(0),
            'puntuación_experiencia'=>floatval(0),
            'puntuación_skill'=>floatval(0),
            'test_skills'=>floatval(0),
        ]);


        return response()->json(
            ['data'=>[
                'candidato'=> $candidato
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $candidato=Candidato::findOrFail($id);
        return response()->json(
            ['data'=>[
                'candidato'=> $candidato
                 ],
            ],200);
    }

        /**
     * Display the specified resource.
     */
    public function showAnuncios(string $idAlumno)
    {
        $candidatos=Candidato::where('alumno_id','like',$idAlumno)->get();
        $anuncios=[];
        foreach ($candidatos as $candidato)
        {
            $anuncio=Anuncio::findOrFail($candidato->anuncio_id);
            $anuncios[]=$anuncio;
        }

        return response()->json(
            ['data'=>[
                'anuncios'=> $anuncios
                 ],
            ],200);
    }

        /**
     * Display the specified resource.
     */
    public function showAlumnos(string $idAnuncio)
    {
        $candidatos=Candidato::where('anuncio_id','like',$idAnuncio)->get();
        $users=[];
        foreach ($candidatos as $candidato)
        {
            $alumno=Alumno::findOrFail($candidato->alumno_id);

            $user=User::findOrFail($alumno->user_id);
            $users[]=$user;

        }

        return response()->json(
            ['data'=>[
                'users'=> $users
                 ],
            ],200);
    }

          /**
     * Display the specified resource.
     */
    public function showExiste(string $idAnuncio,string $idAlumno)
    {
        //
        $candidato=Candidato::where('anuncio_id','like',$idAnuncio)->where('alumno_id','like',$idAlumno)->get();
        if(count($candidato)>=1){
            return response()->json(
                ['data'=>[
                    'candidato'=> $candidato->firstOrFail()
                     ],
                ],200);
        }

        return response()->json(
            ['data'=>[
                'candidato'=> null
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
        $candidato=Candidato::findOrFail($id);
        $candidato->delete();
        return response()->json(
            ['data'=>[
                'candidato'=> $candidato
                 ],
            ],200);

    }
}
