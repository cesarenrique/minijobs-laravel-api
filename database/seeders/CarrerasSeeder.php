<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnyoPlanAcademico;
use App\Models\Centro;
use App\Models\CarreraCentro;
use App\Models\AsignaturaCarrera;
use App\Models\Carrera;
use App\Models\Asignatura;
use App\Models\TipoCarrera;
use App\Models\TipoRamaCarrera;
use App\Models\NumeroControl;
class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $numeroControl=NumeroControl::create([
            'control_bloque'=>1
        ]);

        $tipoCarrera=TipoCarrera::create([
            'nombre'=>'Tecnico Superior'
        ]);

        $tipoRamaCarrera=TipoRamaCarrera::create([
            'nombre'=>'Tecnico Superior Informatica',
            'tipo_carrera_id'=>$tipoCarrera->id
        ]);

        $anyoPlanAcademico=AnyoPlanAcademico::create([
            'nombre'=>'2010'
        ]);

        $centro=Centro::create([
            'nombre'=>'IES MARCOS ZARAGOZA',

        ]);

        $carrera=Carrera::create([
            'nombre'=>'Tecnico Superior Administración Sistemas Informáticos en Red',
            'tipo_rama_carrera_id'=>$tipoRamaCarrera->id,
            'anyo_plan_academico_id'=>$anyoPlanAcademico->id
        ]);

        $carreraCentro=CarreraCentro::create([
            'centro_id'=>$centro->id,
            'carrera_id'=>$carrera->id
        ]);

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


        $i=0;
        $tam=count($asignaturaArray);

        while($i<$tam ){
            $asignatura=Asignatura::create([
                'nombre'=>$asignaturaArray[$i],
            ]);
            $i++;

            $asignaturaCarrera=AsignaturaCarrera::create([
                'asignatura_id'=>$asignatura->id,
                'carrera_id'=>$carrera->id,
                'bloque'=>$numeroControl->control_bloque,
                'tipo'=>'Obligatoria',
                'centro_id'=>null
            ]);


        }

    }
}
