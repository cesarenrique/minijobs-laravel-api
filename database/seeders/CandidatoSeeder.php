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
        $anuncio=Anuncio::first();
        $user=User::where('username','like','Alumno')->first();
        $alumno=Alumno::where('user_id','like',$user->id)->first();
        $candidato=Candidato::create([
            'anuncio_id'=>$anuncio->id,
            'alumno_id'=>$alumno->id,
            'puntuacion_academica'=>floatval(0),
            'puntuación_experiencia'=>floatval(0),
            'puntuación_skill'=>floatval(0),
            'test_skills'=>floatval(0),
        ]);
    }
}
