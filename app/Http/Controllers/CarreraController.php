<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Centro;
use App\Models\AsignaturaCarrera;
use App\Models\AnyoPlanAcademico;
use App\Models\Asignatura;
class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $carreras=Carrera::All();
        return response()->json(
            ['data'=>[
                'carreras'=> $carreras
                 ],
            ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $validated=$request->validate([
            'nombre'=>'required',
            'centro_id'=>'required',
            'anyo_plan_academico_id'=>'required',
            'tipo_rama_carrera_id'=>'required'
        ]);

        $carrera=Carrera::create([
            'nombre'=>$request->nombre,
            'centro_id'=>$request->centro_id,
            'anyo_plan_academico_id'=>$request->anyo_plan_academico_id,
            'tipo_rama_carrera_id'=>$request->tipo_rama_carrera_id
        ]);


        return response()->json(
            ['data'=>[
                'carrera'=> $carrera
            ],
            ],200);
    }

        /**
     * Store a newly created resource in storage.
     */
    public function storeComplete(Request $request)
    {
        //
/*

        $validated=$request->validate([
            'anyo_plan_academico_id'=>'required',
            'centro_id'=>'required',
            'carrera_id'=>'required',
            'tipo_rama_carrera_id'=>'required',
            'tipo_carrera_id'=>'required',
            'anyo_plan_academico_nombre'=>'required',
            'centro_nombre'=>'required',
            'carrera_nombre'=>'required',
            'tipo_rama_carrera_nombre'=>'required',
            'tipo_carrera_nombre'=>'required',
        ]);

        $asignaturas=null;
        $centro=null;
        $carrera=null;
        $anyoPlanAcademico=null;
        $tipoRamaCarrera=null;
        $tipoCarrera=null;
        $error=0;
        if(0!=$request->carrera_id){
            $carrera=Carrera::findOrFail($request->carrera_id);
            $anyoPlanAcademico=$carrera->anyoPlanAcademico;
            $tipoRamaCarrera=$carrera->tipoRamaCarrera;
        }else if(0!=$request->centro_id){
            if(0==$request->anyo_plan_academico_id){
                $error=1;
            }else{
                $centro=Centro::findOrFail($request->centro_id);
                $anyoPlanAcademico=$centro->anyoPlanAcademico;
                if(0==$request->tipo_rama_carrera_id){
                    $tipoCarrera=TipoCarrera::create([
                        'nombre'=>$request->tipo_carrera_nombre
                    ]);
                    $tipoRamaCarrera=TipoRamaCarrera::create([
                        'nombre'=>$request->tipo_rama_carrera_nombre,
                        'tipo_carrera_id'=>$tipoCarrera->id
                    ]);
                }else{
                    $tipoRamaCarrera=TipoRamaCarrera::findOrFail($request->tipo_rama_carrera_id);
                }
                $carrera=Carrera::create([
                    'nombre'=>$request->centro_nombre,
                    'centro_id'=>$request->centro_id,
                    'anyo_plan_academico_id'=>$request->anyo_plan_academico_id,
                    'tipo_rama_carrera_id'=>$tipoRamaCarrera->id
                ]);
            }
        }

        if(error==1){
            return response()->json(
                ['data'=>[
                    'error'=> 'opcion no contemplada'
                ],
                ],200);
        }

        $asignaturasArray=[];
        $asignaturasArray[]=$request->asignatura01;
        $asignaturasArray[]=$request->asignatura02;
        $asignaturasArray[]=$request->asignatura03;
        $asignaturasArray[]=$request->asignatura04;
        $asignaturasArray[]=$request->asignatura05;
        $asignaturasArray[]=$request->asignatura06;
        $asignaturasArray[]=$request->asignatura07;
        $asignaturasArray[]=$request->asignatura08;
        $asignaturasArray[]=$request->asignatura09;
        $asignaturasArray[]=$request->asignatura10;
        $asignaturasArray[]=$request->asignatura11;
        $asignaturasArray[]=$request->asignatura12;
        $asignaturasArray[]=$request->asignatura13;
        $asignaturasArray[]=$request->asignatura14;
        $asignaturasArray[]=$request->asignatura15;
        $asignaturasArray[]=$request->asignatura16;
        $asignaturasArray[]=$request->asignatura17;
        $asignaturasArray[]=$request->asignatura18;
        $asignaturasArray[]=$request->asignatura19;
        $asignaturasArray[]=$request->asignatura20;
        $asignaturasArray[]=$request->asignatura21;
        $asignaturasArray[]=$request->asignatura22;
        $asignaturasArray[]=$request->asignatura23;
        $asignaturasArray[]=$request->asignatura24;
        $asignaturasArray[]=$request->asignatura25;
        $asignaturasArray[]=$request->asignatura26;
        $asignaturasArray[]=$request->asignatura27;
        $asignaturasArray[]=$request->asignatura28;
        $asignaturasArray[]=$request->asignatura29;
        $asignaturasArray[]=$request->asignatura30;
        $asignaturasArray[]=$request->asignatura31;
        $asignaturasArray[]=$request->asignatura32;
        $asignaturasArray[]=$request->asignatura33;
        $asignaturasArray[]=$request->asignatura34;
        $asignaturasArray[]=$request->asignatura35;
        $asignaturasArray[]=$request->asignatura36;
        $asignaturasArray[]=$request->asignatura37;
        $asignaturasArray[]=$request->asignatura38;
        $asignaturasArray[]=$request->asignatura39;
        $asignaturasArray[]=$request->asignatura40;
        $asignaturasArray[]=$request->asignatura41;
        $asignaturasArray[]=$request->asignatura42;
        $asignaturasArray[]=$request->asignatura43;
        $asignaturasArray[]=$request->asignatura44;
        $asignaturasArray[]=$request->asignatura45;
        $asignaturasArray[]=$request->asignatura46;
        $asignaturasArray[]=$request->asignatura47;
        $asignaturasArray[]=$request->asignatura48;
        $asignaturasArray[]=$request->asignatura49;
        $asignaturasArray[]=$request->asignatura50;
        $asignaturasArray[]=$request->asignatura51;
        $asignaturasArray[]=$request->asignatura52;
        $asignaturasArray[]=$request->asignatura53;
        $asignaturasArray[]=$request->asignatura54;
        $asignaturasArray[]=$request->asignatura55;
        $asignaturasArray[]=$request->asignatura56;
        $asignaturasArray[]=$request->asignatura57;
        $asignaturasArray[]=$request->asignatura58;
        $asignaturasArray[]=$request->asignatura59;
        $asignaturasArray[]=$request->asignatura60;

        $tam=60;
        $i=0;
        while($i<=$tam){
            if($asignaturasArray[$i]==null || $asignaturasArray[$i]==""){
                $asignatura=Asignatura::create([
                    'nombre'=>$asignaturasArray[$i],
                    'carrera_id'=>$carrera->id
                ]);
            }
            $i++;
        }
        $asignaturas=$carrera->asignaturas;

        return response()->json(
            ['data'=>[
                'anyoPlanAcademico'=>$anyoPlanAcademico,
                'centro'=>$centro,
                'carrera'=> $carrera,
                'tipoRamaCarrera'=>$tipoRamaCarrera,
                'tipoCarrera'=>$tipoCarrera,
                'asignaturas'=>$asignaturas
            ],
            ],200);*/
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $carrera=Carrera::findOrFail($id);
        return response()->json(
            ['data'=>[
                'carrera'=> $carrera
                 ],
            ],200);
    }

        /**
     * Display the specified resource.
     */
    public function showCarreraComplete(string $id)
    {
        //
        $carrera=Carrera::findOrFail($id);
        $anyoPlanAcademico=$carrera->anyoPlanAcademico;
        $tipoRamaCarrera=$carrera->tipoRamaCarrera;
        $tipoCarrera=$tipoRamaCarrera->tipoCarrera;

        $asignaturas=[];
        $asignaturaCarreras=AsignaturaCarrera::where('carrera_id','like',$carrera->id)->get();
        foreach($asignaturaCarreras as $asignaturaCarrera){
            $asignaturas[]=Asignatura::findOrFail($asignaturaCarrera->asignatura_id);
        }
        return response()->json(
            ['data'=>[
                'anyoPlanAcademico'=>$anyoPlanAcademico,
                'carrera'=> $carrera,
                'tipoRamaCarrera'=>$tipoRamaCarrera,
                'tipoCarrera'=>$tipoCarrera,
                'asignaturas'=>$asignaturas
                 ],
            ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
