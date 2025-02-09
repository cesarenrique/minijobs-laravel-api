<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Especializada;
use App\Models\EmpresaEspecializada;
use App\Models\Empresa;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $sectores=Sector::All();

        return response()->json(
            ['data'=>[
                'sectores'=> $sectores
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
     * Display the specified resource.
     */
    public function showEspecializadas(string $id)
    {
        //
        $sector=Sector::findOrFail($id);
        $especializadas=$sector->especializadas;
        return response()->json(
            ['data'=>[
                'sector'=> $sector,
                'especializadas'=>$especializadas
                 ],
            ],200);
    }

    public function showEmpresas(string $id)
    {
        //
        $sector=Sector::findOrFail($id);
        $especializadas=$sector->especializadas;
        $aux2=[];
        $empresas=[];
        foreach($especializadas as $especializada){
            $empresasEspecialiadas=EmpresaEspecializada::where('especializada_id','like',$especializada->id)->get();
            if(count($empresasEspecialiadas)>=1){
                foreach($empresasEspecialiadas as $empresasEspecialiada){
                    $aux=Empresa::where('id','like',$empresasEspecialiada->empresa_id)->first();
                    if(!in_array($aux->id,$aux2)){
                        $empresas[]=$aux;
                        $aux2[]= $aux->id;
                    }
                }

            }
        }

        return response()->json(
            ['data'=>[
                'sector'=> $sector,
                'empresas'=>$empresas
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
