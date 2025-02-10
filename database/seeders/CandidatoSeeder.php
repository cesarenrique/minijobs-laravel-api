<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Candidato;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $anuncio=Anuncio::where('titulo','like','Desarrollador Web')->first();
        $user=User::where('username','like','Alumno')->first();
        $alumno=Alumno::where('user_id','like',$user->id)->first();
        $candidato=Candidato::create([
            'anuncio_id'=>$anuncio->id,
            'alumno_id'=>$alumno->id,
            'puntuacion_academica'=>floatval(0),
            'puntuacion_experiencia'=>floatval(0),
            'puntuacion_personal'=>floatval(0),
            'puntuacion_mentor'=>floatval(0),
            'test_skills'=>floatval(0),
        ]);

        $anuncio=Anuncio::where('titulo','like','Desarrollador Full Stack')->first();
        $candidato=Candidato::create([
            'anuncio_id'=>$anuncio->id,
            'alumno_id'=>$alumno->id,
            'puntuacion_academica'=>floatval(0),
            'puntuacion_experiencia'=>floatval(0),
            'puntuacion_personal'=>floatval(0),
            'puntuacion_mentor'=>floatval(0),
            'test_skills'=>floatval(0),
        ]);


        $anuncio=Anuncio::where('titulo','like','Colocador Fibra telequinetica')->first();
        $user=User::where('username','like','Alumno2')->first();
        $alumno=Alumno::where('user_id','like',$user->id)->first();
        $candidato=Candidato::create([
            'anuncio_id'=>$anuncio->id,
            'alumno_id'=>$alumno->id,
            'puntuacion_academica'=>floatval(0),
            'puntuacion_experiencia'=>floatval(0),
            'puntuacion_personal'=>floatval(0),
            'puntuacion_mentor'=>floatval(0),
            'test_skills'=>floatval(0),
        ]);
    }
}
