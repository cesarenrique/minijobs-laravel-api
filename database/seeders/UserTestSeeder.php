<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $hashed=Hash::make('minijobs',['rounds'=>12]);

        DB::table('users')->insert([
            'name' => 'Administrador',
            'username'=> 'Administrador',
            'NIF'=>'50380203Z',
            'email'=>'administrador@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Alumno',
            'username'=> 'Alumno',
            'NIF'=>'50380204Z',
            'email'=>'alumno@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Profesor',
            'username'=> 'Profesor',
            'NIF'=>'50380205Z',
            'email'=>'profesor@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Encargado',
            'username'=> 'Encargado',
            'NIF'=>'50380206Z',
            'email'=>'encargado@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Reclutador',
            'username'=> 'Reclutador',
            'NIF'=>'50380207Z',
            'email'=>'reclutador@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Mentor',
            'username'=> 'Mentor',
            'NIF'=>'503821982Z',
            'email'=>'mentor@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'muestra',
            'username'=> 'muestra',
            'NIF'=>'50380208Z',
            'email'=>'muestra@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);



        DB::table('users')->insert([
            'name' => 'Alumno2',
            'username'=> 'Alumno2',
            'NIF'=>'50380204IO',
            'email'=>'alumno2@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Profesor2',
            'username'=> 'Profesor2',
            'NIF'=>'503802SSZ',
            'email'=>'profesor2@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Encargado2',
            'username'=> 'Encargado2',
            'NIF'=>'50380206ZQW',
            'email'=>'encargado2@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Reclutador2',
            'username'=> 'Reclutador2',
            'NIF'=>'50380207AE',
            'email'=>'reclutador2@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'name' => 'Mentor2',
            'username'=> 'Mentor2',
            'NIF'=>'403821982Z',
            'email'=>'mentor2@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);


        DB::table('users')->insert([
            'name' => 'Alumno3',
            'username'=> 'Alumno3',
            'NIF'=>'00380204IO',
            'email'=>'alumno3@gmail.com',
            'password'=>$hashed,
            'ultimo_rol'=>0,
            'estado'=>0,
            'email_verified_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
