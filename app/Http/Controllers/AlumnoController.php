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

        $user=User::findOrFail($request->user_id);

        $existe2=SinRol::where('user_id',$request->user_id)->get();

        if(count($existe2)>=1){
            $existe2->first()->delete();
        }

        $alumno=Alumno::create([
            'user_id'=>$request->user_id
        ]);


        $user->ultimo_rol=1;

        $user->update();

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
     * Display the specified resource.
     */
    public function showUser(string $idUser)
    {
        //

        $alumno=Alumno::where('user_id','like',$idUser)->firstOrFail();
        return response()->json(
            ['data'=>[
                'alumno'=> $alumno
                 ],
            ],200);
    }

        /**
     * Display the specified resource.
     */
    public function showUserComplete(string $idEncargado)
    {
        //

        $alumno=Alumno::findOrFail($idEncargado);
        $user=User::findOrFail($alumno->user_id);
        return response()->json(
            ['data'=>[
                'user'=> $user
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
