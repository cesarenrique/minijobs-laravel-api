<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargoEmpresa;
use App\Models\Cargo;

class EmpresaCargoController extends Controller
{

      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Display a listing of the resource.
     */
    public function indexCargos($id)
    {
        //
        $empresacargos=CargoEmpresa::where('empresa_id','like',$id)->get();
        $cargos=[];
        if(count($empresacargos)>=1){
            foreach($empresacargos as $empresacargo){
                $cargos[]=Cargo::findOrFail($empresacargo->cargo_id);

            }
        }
        return response()->json(
            ['data'=>[
                'cargos'=> $cargos
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
