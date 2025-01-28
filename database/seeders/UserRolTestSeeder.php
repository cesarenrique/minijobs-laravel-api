<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserRolTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $administrador=User::where('username','like','Administrador')->first();
        DB::table('administradors')->insert([
            'user_id'=>$administrador->id
        ]);

        $encargados=User::where('username','like','Encargado')->first();
        DB::table('encargados')->insert([
            'user_id'=>$encargados->id
        ]);

        $reclutador=User::where('username','like','Reclutador')->first();
        DB::table('reclutadors')->insert([
            'user_id'=>$reclutador->id
        ]);


        $profesor=User::where('username','like','Profesor')->first();
        DB::table('profesors')->insert([
            'user_id'=>$profesor->id
        ]);

        $alumno=User::where('username','like','Alumno')->first();
        DB::table('alumnos')->insert([
            'user_id'=>$alumno->id
        ]);

        $sinRol=User::where('username','like','muestra')->first();
        DB::table('sin_rols')->insert([
            'user_id'=>$sinRol->id
        ]);
    }
}
