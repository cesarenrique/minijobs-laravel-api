<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Encargado;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Especializada;
use App\Models\EmpresaEspecializada;
use App\Models\Cargo;
use App\Models\Sector;
use App\Models\CargoEmpresa;
use App\Models\Reclutador;


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
        $empresa=Empresa::create([
            'encargado_id'=>$encargado->id,
            'logo'=>'https://www.google.es',
            'nombre'=>'Everis',
            'email'=>'cesar@everis.com',
            'NIF'=>'400580200F',
            'tamanyo'=>'10000'
        ]);

        $sector=Sector::create([
            'nombre'=>'Informatica'
        ]);

        $especializada=Especializada::create([
            'nombre'=>'Aplicaciones Web a medida',
            'sector_id'=>$sector->id
        ]);

        $empresaEspecializada=EmpresaEspecializada::create([
            'empresa_id'=>$empresa->id,
            'especializada_id'=>$especializada->id
        ]);

        $especializada=Especializada::create([
            'nombre'=>'Aplicaciones Movil a medida',
            'sector_id'=>$sector->id
        ]);

        $empresaEspecializada=EmpresaEspecializada::create([
            'empresa_id'=>$empresa->id,
            'especializada_id'=>$especializada->id
        ]);

        $especializada=Especializada::create([
            'nombre'=>'Aplicaciones FullStack a medida',
            'sector_id'=>$sector->id
        ]);

        $empresaEspecializada=EmpresaEspecializada::create([
            'empresa_id'=>$empresa->id,
            'especializada_id'=>$especializada->id
        ]);

        $cargo=Cargo::create([
            'titulo'=>'Desarrollador Web',
            'descripcion'=>'Desarrollador con experiencia en PHP',

        ]);
        $empresa=Empresa::where('nombre','like','Everis')->first();
        $cargoEmpresa=CargoEmpresa::create([
            'cargo_id'=>$cargo->id,
            'empresa_id'=>$empresa->id,

        ]);

        $user2=User::where('username','like','Reclutador')->first();
        $reclutador=Reclutador::where('user_id','like',$user2->id)->first();
        DB::table('anuncios')->insert([
            'titulo'=>'Desarrollador Web',
            'descripcion'=>'Buscamos desarrollador web con experiencia en PHP con 3 años de experiencia',
            'estado'=>1,
            'inicio'=>'2025-02-25',
            'cargo_empresa_id'=> $cargoEmpresa->id,
            'reclutador_id'=>$reclutador->id,
        ]);

    }
}
