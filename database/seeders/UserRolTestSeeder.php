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
        $administrador->ultimo_rol=5;
        $administrador->update();

        $encargado=User::where('username','like','Encargado')->first();
        DB::table('encargados')->insert([
            'user_id'=>$encargado->id
        ]);
        $encargado->ultimo_rol=4;
        $encargado->update();

        $reclutador=User::where('username','like','Reclutador')->first();
        DB::table('reclutadors')->insert([
            'user_id'=>$reclutador->id
        ]);
        $reclutador->ultimo_rol=3;
        $reclutador->update();

        $profesor=User::where('username','like','Profesor')->first();
        DB::table('profesors')->insert([
            'user_id'=>$profesor->id
        ]);
        $profesor->ultimo_rol=2;
        $profesor->update();

        $alumno=User::where('username','like','Alumno')->first();
        DB::table('alumnos')->insert([
            'user_id'=>$alumno->id
        ]);
        $alumno->ultimo_rol=1;
        $alumno->update();

        $mentor=User::where('username','like','Mentor')->first();
        DB::table('mentors')->insert([
            'user_id'=>$mentor->id
        ]);

        $sinRol=User::where('username','like','muestra')->first();
        DB::table('sin_rols')->insert([
            'user_id'=>$sinRol->id
        ]);

        $encargado=User::where('username','like','Encargado2')->first();
        DB::table('encargados')->insert([
            'user_id'=>$encargado->id
        ]);
        $encargado->ultimo_rol=4;
        $encargado->update();

        $reclutador=User::where('username','like','Reclutador2')->first();
        DB::table('reclutadors')->insert([
            'user_id'=>$reclutador->id
        ]);
        $reclutador->ultimo_rol=3;
        $reclutador->update();

        $profesor=User::where('username','like','Profesor2')->first();
        DB::table('profesors')->insert([
            'user_id'=>$profesor->id
        ]);
        $profesor->ultimo_rol=2;
        $profesor->update();

        $alumno=User::where('username','like','Alumno2')->first();
        DB::table('alumnos')->insert([
            'user_id'=>$alumno->id
        ]);
        $alumno->ultimo_rol=1;
        $alumno->update();

        $mentor=User::where('username','like','Mentor2')->first();
        DB::table('mentors')->insert([
            'user_id'=>$mentor->id
        ]);

        $alumno=User::where('username','like','Alumno3')->first();
        DB::table('alumnos')->insert([
            'user_id'=>$alumno->id
        ]);
        $alumno->ultimo_rol=1;
        $alumno->update();

    }
}
