<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\TieneSkill;
use App\Models\BuscaSkill;
use App\Models\Anuncio;
use App\Models\Alumno;
use App\Models\User;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $skills=Skill::All();
        return response()->json(
            ['data'=>[
                'skills'=> $skills
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
        $skill=Skill::findOrFail($id);
        return response()->json(
            ['data'=>[
                'skill'=> $skill
                 ],
            ],200);
    }


        /**
     * Display the specified resource.
     */
    public function showAnuncios(string $id)
    {
        //
        $skill=Skill::findOrFail($id);
        $buscaSkills=BuscaSkill::where('skill_id','like',$skill->id)->get();
        $anuncios=[];
        foreach($buscaSkills as $buscaSkill){
            $anuncios[]=Anuncio::findOrFail($buscaSkill->anuncio_id);

        }
        return response()->json(
            ['data'=>[
                'skill'=> $skill,
                'anuncios'=>$anuncios
                 ],
            ],200);
    }



        /**
     * Display the specified resource.
     */
    public function showUsuarios(string $id)
    {
        //
        $skill=Skill::findOrFail($id);
        $tieneSkills=TieneSkill::where('skill_id','like',$skill->id)->get();
        $usuarios=[];
        $aux=[];
        foreach($tieneSkills as $tieneSkill){
            $alumno=Alumno::findOrFail($tieneSkill->alumno_id);
            if(!in_array($alumno->id,$aux)){
                $usuarios[]=User::findOrFail($alumno->user_id);
                $aux[]=$alumno->id;
            }
        }
        return response()->json(
            ['data'=>[
                'skill'=> $skill,
                'usuarios'=>$usuarios
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
