<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mentores=Mentor::All();
        return response()->json(
            ['data'=>[
                'mentores'=> $mentores
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

        $mentor=Mentor::create([
            'user_id'=>$request->user_id
        ]);


        $user->ultimo_rol=6;

        $user->update();

        return response()->json(
            ['data'=>[
                'mentor'=> $mentor
                 ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $mentor=Mentor::findOrFail($id);
        return response()->json(
            ['data'=>[
                'mentor'=> $mentor
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
