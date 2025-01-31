<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclutador;
use App\Models\User;
use App\Models\SinRol;

class ReclutadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reclutadores=Reclutador::All();
        return response()->json(
            ['data'=>[
                'reclutadores'=> $reclutadores
                 ],
            ],200);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexComplete()
    {
        //
        $reclutadores=Reclutador::All();
        $usuarios=[];
        foreach($reclutadores as $reclutador){
            $usuarios[]=$reclutador->user;
        }
        return response()->json(
            ['data'=>[
                'reclutadores'=> $usuarios
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
            $existe2->first()->delete();;
        }


        $reclutador=Reclutador::create([
            'user_id'=>$request->user_id
        ]);

        $user->ultimo_rol=3;

        $user->update();

        return response()->json(
            ['data'=>[
                'reclutador'=> $reclutador
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
