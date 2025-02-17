<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\User;
use App\Models\SinRol;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profesores=Profesor::All();
        return response()->json(
            ['data'=>[
                'profesores'=> $profesores
                 ],
            ],200);

    }

    /**
     * Display a listing of the resource.
     */
    public function indexComplete()
    {
        //
        $profesores=Profesor::All();
        $usuarios=[];
        foreach($profesores as $profesor){
            $usuarios[]=$profesor->user;
        }
        return response()->json(
            ['data'=>[
                'profesores'=> $usuarios
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

        $profesor=Profesor::create([
            'user_id'=>$request->user_id
        ]);

        $user->ultimo_rol=2;

        $user->update();

        return response()->json(
            ['data'=>[
                'profesor'=> $profesor
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
