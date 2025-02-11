<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargoEmpresa;
use App\Models\Anuncio;
class EmpresaAnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    public function indexAnuncios($id)
    {
        //

        $empresacargos=CargoEmpresa::where('empresa_id','like',$id)->get();
        $anuncios=[];
        if(count($empresacargos)>=1){
            foreach($empresacargos as $empresacargo){
                $aux=Anuncio::Where('cargo_empresa_id','like',$empresacargo->id)->get();
                if(count($aux)>=1){
                    $anuncios[]=$aux->firstOrFail();
                }
            }
        }
        return response()->json(
            ['data'=>[
                'anuncios'=> $anuncios
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
