<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Profesor;
use App\Models\Reclutador;
use App\Models\Encargado;
use App\Models\SinRol;
use App\Models\Administrador;

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
            'data'=> [
                'users'=>$users
                ]
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
            'ultimo_rol'=>0,
        ]);

        $sinrol=SinRol::create([
            'user_id'=>$user->id
        ]);

        return response()->json(
            ['data'=>[

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
        $alumno=Alumno::where('user_id','like',$user->id)->get();
        $profesor=Profesor::where('user_id','like',$user->id)->get();
        $reclutador=Reclutador::where('user_id','like',$user->id)->get();
        $encargado=Encargado::where('user_id','like',$user->id)->get();
        $administrador=Administrador::where('user_id','like',$user->id)->get();
        $alumnoEs=0;
        $profesorEs=0;
        $reclutadorEs=0;
        $encargadoEs=0;
        $administradorEs=0;

        if(count($alumno)>=1){
            $alumnoEs=1;
        }
        if(count($profesor)>=1){
            $profesorEs=1;
        }
        if(count($reclutador)>=1){
            $reclutadorEs=1;
        }
        if(count($encargado)>=1){
            $encargadoEs=1;
        }
        if(count($administrador)>=1){
            $administradorEs=1;
        }

        return response()->json(
            ['data'=>[
                'user'=> $user,
                'alumno'=>$alumnoEs,
                'profesor'=> $profesorEs,
                'reclutador'=>$reclutadorEs,
                'encargado'=>$encargadoEs,
                'administrador'=>$administradorEs
            ],
            ],200);
    }

     /**
     * Display the specified resource.
     */
    public function login(string $id)
    {
        $user=User::findOrFail($id);
        $alumno=Alumno::where('user_id','like',$user->id)->get();
        $profesor=Profesor::where('user_id','like',$user->id)->get();
        $reclutador=Reclutador::where('user_id','like',$user->id)->get();
        $encargado=Encargado::where('user_id','like',$user->id)->get();
        $administrador=Administrador::where('user_id','like',$user->id)->get();
        $alumnoEs=0;
        $profesorEs=0;
        $reclutadorEs=0;
        $encargadoEs=0;
        $administradorEs=0;

        if(count($alumno)>=1){
            $alumnoEs=1;
        }
        if(count($profesor)>=1){
            $profesorEs=1;
        }
        if(count($reclutador)>=1){
            $reclutadorEs=1;
        }
        if(count($encargado)>=1){
            $encargadoEs=1;
        }
        if(count($administrador)>=1){
            $administradorEs=1;
        }

        return response()->json(
            ['data'=>[
                'user'=> $user,
                'alumno'=>$alumnoEs,
                'profesor'=> $profesorEs,
                'reclutador'=>$reclutadorEs,
                'encargado'=>$encargadoEs,
                'administrador'=>$administradorEs
            ],
            ],200);
    }


    public function showForUsername(string $username)
    {
        $user=User::where('username','like',$username)->firstOrFail();
        $alumno=Alumno::where('user_id','like',$user->id)->get();
        $profesor=Profesor::where('user_id','like',$user->id)->get();
        $reclutador=Reclutador::where('user_id','like',$user->id)->get();
        $encargado=Encargado::where('user_id','like',$user->id)->get();
        $administrador=Administrador::where('user_id','like',$user->id)->get();
        $alumnoEs=0;
        $profesorEs=0;
        $reclutadorEs=0;
        $encargadoEs=0;
        $administradorEs=0;
        if(count($alumno)>=1){
            $alumnoEs=1;
        }
        if(count($profesor)>=1){
            $profesorEs=1;
        }
        if(count($reclutador)>=1){
            $reclutadorEs=1;
        }
        if(count($encargado)>=1){
            $encargadoEs=1;
        }
        if(count($administrador)>=1){
            $administradorEs=1;
        }

        return response()->json(
            ['data'=>[

                'user'=> $user,
                'alumno'=>$alumnoEs,
                'profesor'=> $profesorEs,
                'reclutador'=>$reclutadorEs,
                'encargado'=>$encargadoEs,
                'administrador'=>$administradorEs
            ],
            ],200);
    }

    public function updateUltimoRol($id,$rol)
    {
        $user=$existe->firstOrFail();

        $user->ultimo_rol=$rol;

        $user->update();

        return response()->json(
            ['data'=>[
                'user'=> $user,
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
