<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users=User::All();
        return response()->json([
            'data'=> $users],200);

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
            'username'=>'required|min:5|max:30',
            'name'=>'required|min:5|max:50',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|min:8',
            'NIF'=>'required|min:8'
        ]);

        $hashed=Hash::make($request->password,['rounds'=>12]);

        $user=User::create([
            'username'=>$request->username,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$hashed,
            'NIF'=>$request->NIF,
        ]);

        return response()->json(
            ['data'=>[
                //'token'=> $user->createToken('token')->plainTextToken,
                'user'=> $user
            ],
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::findOrFail($id);
        return response()->json(
            ['data'=>[
                //'token'=> $user->createToken('token')->plainTextToken,
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
