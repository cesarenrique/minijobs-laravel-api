<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\User;
use App\Models\SinRol;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alumnos=Alumno::All();
        return response()->json(
            ['data'=>[
                'alumnos'=> $alumnos
                 ],
            ],200);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexComplete()
    {
        //
        $alumnos=Alumno::All();
        $usuarios=[];
        foreach($alumnos as $alumno){
            $usuarios[]=$alumno->user;
        }
        return response()->json(
            ['data'=>[
                'alumnos'=> $usuarios
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
            'user_id'=>'required'
        ]);

        $existe=User::where('id',$request->user_id)->get();

        if(count($existe)<1){
            return response()->json(
                ['data'=>[

                     ],
                ],404);
        }

        $existe2=SinRol::where('user_id',$request->user_id)->get();

        if(count($existe2)>=1){
            $existe2->first()->delete();
        }

        $alumno=Alumno::create([
            'user_id'=>$request->user_id
        ]);

        return response()->json(
            ['data'=>[
                'alumno'=> $alumno
                 ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
