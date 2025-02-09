<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especializada;
use App\Models\EmpresaEspecializada;
use App\Models\Empresa;

class EspecializadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $especializadas=Especializada::All();

        return response()->json(
            ['data'=>[
                'especializadas'=> $especializadas
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
        $especializada=Especializada::findOrFail($id);

        return response()->json(
            ['data'=>[
                'especializada'=> $especializada
                 ],
            ],200);
    }


        /**
     * Display the specified resource.
     */
    public function showEmpresas(string $id)
    {
        //

        $especializada=Especializada::findOrFail($id);
        $sector=$especializada->sector;
        $empresasEspecialiadas=EmpresaEspecializada::where('especializada_id','like',$especializada->id)->get();
        $empresas=[];
        $aux2=[];
        if(count($empresasEspecialiadas)>=1){
            foreach($empresasEspecialiadas as $empresasEspecialiada){
                $aux=Empresa::where('id','like',$empresasEspecialiada->empresa_id)->first();
                if(!in_array($aux->id,$aux2)){
                    $empresas[]=$aux;
                    $aux2[]= $aux->id;
                }
            }

        }

        return response()->json(
            ['data'=>[
                'sector'=>$sector,
                'especializada'=> $especializada,
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
