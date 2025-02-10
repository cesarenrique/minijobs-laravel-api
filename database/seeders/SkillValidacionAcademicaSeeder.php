<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Evaluacion;
use App\Models\TieneSkillExperiencia;
use App\Models\TieneSkill;
use App\Models\SkillAsignatura;
use App\Models\Skill;
use App\Models\Carrera;
use App\Models\TieneTitulo;
use App\Models\AsignaturaCarrera;


class SkillValidacionAcademicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $asignaturaArray=[];
        $asignaturaArray[]='Implantación de sistemas operativos';
        $asignaturaArray[]='Planificación y administración de redes';
        $asignaturaArray[]='Fundamentos de hardware';
        $asignaturaArray[]='Gestión de bases de datos';
        $asignaturaArray[]='Lenguajes de marcas y sistemas de gestión de información';
        $asignaturaArray[]='Administración de sistemas operativos';
        $asignaturaArray[]='Servicios de red e Internet';
        $asignaturaArray[]='Implantación de aplicaciones web';
        $asignaturaArray[]='Administración de sistemas gestores de bases de datos';
        $asignaturaArray[]='Seguridad y alta disponibilidad';
        $asignaturaArray[]='Inglés Profesional';
        $asignaturaArray[]='Itinerario personal para la empleabilidad I';
        $asignaturaArray[]='Itinerario personal para la empleabilidad II';
        $asignaturaArray[]='Digitalización aplicada a los sectores productivos';
        $asignaturaArray[]='Sostenibilidad aplicada al sistema productivo';
        $asignaturaArray[]='Proyecto intermodular de administración de sistemas informáticos en red';
        $asignaturaArray[]='Módulo profesional optativo';
        $asignaturaArray[]='una fase de formación en empresa u organismo equiparado';


        $user=User::where('username','like','Alumno')->first();
        $alumno=Alumno::where('user_id','like',$user->id)->first();

        $carrera=Carrera::where('nombre','like','Tecnico Superior Administración Sistemas Informáticos en Red')->first();

        $tieneTitulo=TieneTitulo::create([
            'alumno_id'=>$alumno->id,
            'carrera_id'=>$carrera->id,
        ]);

        $i=0;
        $tam=count($asignaturaArray);
        while($i<$tam ){
            $asignatura=Asignatura::where('nombre','like',$asignaturaArray[$i])->first();
            $asignaturaCarrera=AsignaturaCarrera::where('asignatura_id','like',$asignatura->id)
            ->where('carrera_id','like',$carrera->id)->first();
            $evaluacion=Evaluacion::create([
                'alumno_id'=>$alumno->id,
                'asignatura_carrera_id'=>$asignaturaCarrera->id,
                'nota'=>8,
            ]);

            $i++;
        }

        $skillArray=[];
        $skillArray[]='Sistemas Operativos';
        $skillArray[]='Linux';
        $skillArray[]='Ubuntu';

        $i=0;
        $tam=count($skillArray);
        while($i<$tam ){

            $skill=Skill::create([
                'skill'=>$skillArray[$i],
                'descripcion'=> 'usar el cerebro y el ordenador'
            ]);
            $i++;
        }

        $skillArray2=[];
        $asignaturaArray2=[];

        //Implantación de sistemas operativos

        $skillArray2[]='Trabajo en Equipo';
        $skillArray2[]='Sistemas Operativos';
        $skillArray2[]='Linux';
        $skillArray2[]='Ubuntu';

        //Implantación de sistemas operativos
        $asignaturaArray2[]=$asignaturaArray[0];
        $asignaturaArray2[]=$asignaturaArray[0];
        $asignaturaArray2[]=$asignaturaArray[0];
        $asignaturaArray2[]=$asignaturaArray[0];


        $i=0;
        $tam=count($skillArray2);
        while($i<$tam ){


            $asignatura=Asignatura::where('nombre','like',$asignaturaArray2[$i])->first();

            $skill=Skill::where('skill','like',$skillArray2[$i])->first();

            $skillAsignatura=SkillAsignatura::create([
                    'asignatura_id'=>$asignatura->id,
                    'skill_id'=>$skill->id
                ]);
            $asignaturaCarrera=AsignaturaCarrera::where('asignatura_id','like',$asignatura->id)
                ->where('carrera_id','like',$carrera->id)->first();

            $evaluacion=Evaluacion::where('asignatura_carrera_id','like',$asignaturaCarrera->id)
            ->where('alumno_id','like',$alumno->id)->first();

            $tieneSkillExperiencia=TieneSkillExperiencia::create([
                'alumno_id'=>$alumno->id,
                'skill_id'=>$skill->id,
                'tiempo_meses'=>20,
                'nivel'=>$evaluacion->nota,
                'validacion'=>2,
                'descripcion'=>'realizado pequeños proyectos',
                'asignatura_id'=>$asignatura->id,
                'profesor_id'=>null,
                'empresa_cargo_experiencia_id'=>null,
                'mentor_id'=>null
            ]);

            $tieneSkill=TieneSkill::create([
                'alumno_id'=>$alumno->id,
                'skill_id'=>$skill->id,
            ]);

            $i++;
        }

    }
}
