<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Skill;
use App\Models\TieneSkillExperiencia;
use App\Models\TieneSkill;
use App\Models\BuscaSkill;
use App\Models\Anuncio;

class SkillSinValidacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user=User::where('username','like','Alumno')->first();
        $alumno=Alumno::where('user_id','like',$user->id)->first();
        $skill=Skill::create([
            'skill'=>'Javascript',
            'descripcion'=>'tener habilidad programar en javascript y cierto conocimiento de este lenguaje'
        ]);


        $tieneSkillExperiencia=TieneSkillExperiencia::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill->id,
            'tiempo_meses'=>24,
            'nivel'=>8,
            'validacion'=>1,
            'descripcion'=>'tengo bastante practica por mi cuenta y he realizado pequeños proyectos',
            'asignatura_id'=>null,
            'profesor_id'=>null,
            'empresa_cargo_experiencia_id'=>null,
            'mentor_id'=>null
        ]);

        $tieneSkill=TieneSkill::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill->id,
        ]);

        $skill2=Skill::create([
            'skill'=>'Css',
            'descripcion'=>'tener habilidad programar en CSS y cierto conocimiento de este lenguaje'
        ]);


        $tieneSkillExperiencia2=TieneSkillExperiencia::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill2->id,
            'tiempo_meses'=>24,
            'nivel'=>8,
            'validacion'=>1,
            'descripcion'=>'tengo bastante practica por mi cuenta y he realizado pequeños proyectos',
            'asignatura_id'=>null,
            'profesor_id'=>null,
            'empresa_cargo_experiencia_id'=>null,
            'mentor_id'=>null
        ]);

        $tieneSkill2=TieneSkill::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill2->id,
        ]);

        $skill3=Skill::create([
            'skill'=>'HTML',
            'descripcion'=>'tener habilidad en lenguaje marcas HTML y cierto conocimiento de este lenguaje'
        ]);


        $tieneSkillExperiencia3=TieneSkillExperiencia::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill2->id,
            'tiempo_meses'=>24,
            'nivel'=>8,
            'validacion'=>1,
            'descripcion'=>'tengo bastante practica por mi cuenta y he realizado pequeños proyectos',
            'asignatura_id'=>null,
            'profesor_id'=>null,
            'empresa_cargo_experiencia_id'=>null,
            'mentor_id'=>null
        ]);

        $tieneSkill3=TieneSkill::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill3->id,
        ]);


        $skill4=Skill::create([
            'skill'=>'UX',
            'descripcion'=>'tener conocimiento Experiencia de Usuario para aplicarlo en modelos aplicaciones'
        ]);


        $tieneSkillExperiencia4=TieneSkillExperiencia::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill3->id,
            'tiempo_meses'=>24,
            'nivel'=>4,
            'validacion'=>1,
            'descripcion'=>'tengo bastante practica por mi cuenta y he realizado pequeños proyectos',
            'asignatura_id'=>null,
            'profesor_id'=>null,
            'empresa_cargo_experiencia_id'=>null,
            'mentor_id'=>null
        ]);

        $tieneSkill4=TieneSkill::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill4->id,
        ]);

        $skill5=Skill::create([
            'skill'=>'Python',
            'descripcion'=>'tener habilidad programar en javascript y cierto conocimiento de este lenguaje'
        ]);


        $tieneSkillExperiencia5=TieneSkillExperiencia::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill5->id,
            'tiempo_meses'=>6,
            'nivel'=>4,
            'validacion'=>1,
            'descripcion'=>'tengo bastante practica por mi cuenta y he realizado pequeños proyectos',
            'asignatura_id'=>null,
            'profesor_id'=>null,
            'empresa_cargo_experiencia_id'=>null,
            'mentor_id'=>null
        ]);


        $tieneSkill5=TieneSkill::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill5->id,
        ]);

        $skill6=Skill::create([
            'skill'=>'Trabajo en Equipo',
            'descripcion'=>'habilidad de acordar en paz repartos de trabajo en plazo de manera efectiva para objetivo'
        ]);


        $tieneSkillExperiencia6=TieneSkillExperiencia::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill6->id,
            'tiempo_meses'=>6,
            'nivel'=>4,
            'validacion'=>1,
            'descripcion'=>'tengo bastante practica por mi cuenta y he realizado pequeños proyectos',
            'asignatura_id'=>null,
            'profesor_id'=>null,
            'empresa_cargo_experiencia_id'=>null,
            'mentor_id'=>null
        ]);

        $tieneSkill6=TieneSkill::create([
            'alumno_id'=>$alumno->id,
            'skill_id'=>$skill6->id,
        ]);

        $anuncio=Anuncio::where('titulo','like','Desarrollador Web')->first();

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill2->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill3->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill4->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $anuncio=Anuncio::where('titulo','like','Desarrollador Full Stack')->first();

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill2->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill3->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill4->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill5->id,
            'anuncio_id'=>$anuncio->id
        ]);

        $buscaSkill=BuscaSkill::create([
            'skill_id'=>$skill6->id,
            'anuncio_id'=>$anuncio->id
        ]);


    }


}
