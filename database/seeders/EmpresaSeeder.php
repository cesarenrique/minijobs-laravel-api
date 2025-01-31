<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Encargado;
use App\Models\User;
class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user=User::where('username','like','Encargado')->first();
        $encargado=Encargado::where('user_id','like',$user->id)->first();
        DB::table('empresas')->insert([
            'encargado_id'=>$encargado->id,
            'logo'=>'https://www.google.es',
            'nombre'=>'Everis',
            'email'=>'cesar@everis.com',
            'NIF'=>'400580200F',
            'tamanyo'=>'10000'
        ]);
    }
}
