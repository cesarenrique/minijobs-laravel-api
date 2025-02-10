<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\FormaPago;
use App\Models\Tarjeta;
use App\Models\Anyo;
use App\Models\Mes;
use App\Models\Suscripcion;
use App\Models\Producto;
use App\Models\Articulo;
use App\Models\PagoSuscripcion;
use App\Models\PagoLimitacion;
use App\Models\UserLimitacion;

class UserRolTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
        $numeroTarjeta='4000400040004000';
        $emailPaypal='pagodespacio@gmail.com';

        $tam=60;
        $auxMes=1;
        $auxAnyo=2025;
        $anyo=Anyo::create([
            'anyo'=>$auxAnyo,
        ]);
        for($i=0;$i<$tam;$i++){

            $mes=Mes::create([
                'anyo_id'=>$anyo->id,
                'mes'=>$auxMes,
            ]);
            $suscripcion=Suscripcion::create([
                'nombre'=>$auxAnyo.' '.$auxMes,
                'mes_id'=>$mes->id,
            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
                $anyo=Anyo::create([
                    'anyo'=>$auxAnyo,
                ]);
            }
        }




        $administrador=User::where('username','like','Administrador')->first();
        DB::table('administradors')->insert([
            'user_id'=>$administrador->id
        ]);
        $administrador->ultimo_rol=5;
        $administrador->update();


        $encargado=User::where('username','like','Encargado')->first();
        DB::table('encargados')->insert([
            'user_id'=>$encargado->id
        ]);
        $encargado->ultimo_rol=4;
        $encargado->update();

        $formaPago=FormaPago::create([
            'user_id'=>$encargado->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);

        $producto=Producto::create([
            'nombre'=>'suscripciones encargado',
        ]);

        $articulo=Articulo::create([
            'producto_id'=>$producto->id,
            'nombre'=>'suscripcion a 6 meses encargado',
            'rol'=>4,
            'meses'=>6,
        ]);

        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$encargado->id,
                'articulo_id'=>$articulo->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$encargado->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>null,
            'fecha_limite_mentor'=>null,
        ]);

        $reclutador=User::where('username','like','Reclutador')->first();
        DB::table('reclutadors')->insert([
            'user_id'=>$reclutador->id
        ]);
        $reclutador->ultimo_rol=3;
        $reclutador->update();


        $formaPago=FormaPago::create([
            'user_id'=>$reclutador->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);

        $producto=Producto::create([
            'nombre'=>'suscripciones reclutador',
        ]);

        $articulo2=Articulo::create([
            'producto_id'=>$producto->id,
            'nombre'=>'suscripcion a 6 meses reclutador',
            'rol'=>4,
            'meses'=>6,
        ]);

        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$reclutador->id,
                'articulo_id'=>$articulo2->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$reclutador->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>null,
            'fecha_limite_mentor'=>null,
        ]);

        $profesor=User::where('username','like','Profesor')->first();
        DB::table('profesors')->insert([
            'user_id'=>$profesor->id
        ]);
        $profesor->ultimo_rol=2;
        $profesor->update();


        $formaPago=FormaPago::create([
            'user_id'=>$profesor->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);

        $producto=Producto::create([
            'nombre'=>'suscripciones profesor',
        ]);

        $articulo3=Articulo::create([
            'producto_id'=>$producto->id,
            'nombre'=>'suscripcion a 6 meses profesor',
            'rol'=>4,
            'meses'=>6,
        ]);

        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$profesor->id,
                'articulo_id'=>$articulo3->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$profesor->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_alumno'=>null,
            'fecha_limite_mentor'=>null,
        ]);

        $alumno=User::where('username','like','Alumno')->first();
        DB::table('alumnos')->insert([
            'user_id'=>$alumno->id
        ]);
        $alumno->ultimo_rol=1;
        $alumno->update();


        $formaPago=FormaPago::create([
            'user_id'=>$alumno->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);

        $producto=Producto::create([
            'nombre'=>'suscripciones alumno',
        ]);

        $articulo4=Articulo::create([
            'producto_id'=>$producto->id,
            'nombre'=>'suscripcion a 6 meses alumno',
            'rol'=>4,
            'meses'=>6,
        ]);

        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$alumno->id,
                'articulo_id'=>$articulo4->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$alumno->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_mentor'=>null,
        ]);

        $mentor=User::where('username','like','Mentor')->first();
        DB::table('mentors')->insert([
            'user_id'=>$mentor->id
        ]);
        $mentor->ultimo_rol=6;
        $mentor->update();


        $formaPago=FormaPago::create([
            'user_id'=>$mentor->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);

        $producto=Producto::create([
            'nombre'=>'suscripciones mentor',
        ]);

        $articulo5=Articulo::create([
            'producto_id'=>$producto->id,
            'nombre'=>'suscripcion a 6 meses mentor',
            'rol'=>4,
            'meses'=>6,
        ]);

        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$mentor->id,
                'articulo_id'=>$articulo5->id
            ]);

            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$mentor->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>null,
            'fecha_limite_mentor'=>'25-'.$auxMes.'-'.$auxAnyo,
        ]);

        $sinRol=User::where('username','like','muestra')->first();
        DB::table('sin_rols')->insert([
            'user_id'=>$sinRol->id
        ]);

        $encargado=User::where('username','like','Encargado2')->first();
        DB::table('encargados')->insert([
            'user_id'=>$encargado->id
        ]);
        $encargado->ultimo_rol=4;
        $encargado->update();


        $formaPago=FormaPago::create([
            'user_id'=>$encargado->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);


        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$encargado->id,
                'articulo_id'=>$articulo->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$encargado->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>null,
            'fecha_limite_mentor'=>null,
        ]);

        $reclutador=User::where('username','like','Reclutador2')->first();
        DB::table('reclutadors')->insert([
            'user_id'=>$reclutador->id
        ]);
        $reclutador->ultimo_rol=3;
        $reclutador->update();



        $formaPago=FormaPago::create([
            'user_id'=>$reclutador->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);



        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$reclutador->id,
                'articulo_id'=>$articulo2->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$reclutador->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>null,
            'fecha_limite_mentor'=>null,
        ]);

        $profesor=User::where('username','like','Profesor2')->first();
        DB::table('profesors')->insert([
            'user_id'=>$profesor->id
        ]);
        $profesor->ultimo_rol=2;
        $profesor->update();

        $formaPago=FormaPago::create([
            'user_id'=>$profesor->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);


        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$profesor->id,
                'articulo_id'=>$articulo3->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$profesor->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_alumno'=>null,
            'fecha_limite_mentor'=>null,
        ]);

        $alumno=User::where('username','like','Alumno2')->first();
        DB::table('alumnos')->insert([
            'user_id'=>$alumno->id
        ]);
        $alumno->ultimo_rol=1;
        $alumno->update();

        $formaPago=FormaPago::create([
            'user_id'=>$alumno->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);


        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$alumno->id,
                'articulo_id'=>$articulo4->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$alumno->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_mentor'=>null,
        ]);

        $mentor=User::where('username','like','Mentor2')->first();
        DB::table('mentors')->insert([
            'user_id'=>$mentor->id
        ]);
        $mentor->ultimo_rol=6;
        $mentor->update();


        $formaPago=FormaPago::create([
            'user_id'=>$mentor->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);

        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$mentor->id,
                'articulo_id'=>$articulo5->id
            ]);

            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$mentor->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>null,
            'fecha_limite_mentor'=>'25-'.$auxMes.'-'.$auxAnyo,
        ]);

        $alumno=User::where('username','like','Alumno3')->first();
        DB::table('alumnos')->insert([
            'user_id'=>$alumno->id
        ]);
        $alumno->ultimo_rol=1;
        $alumno->update();


        $formaPago=FormaPago::create([
            'user_id'=>$alumno->id,
            'preferida'=>'tarjeta 1'
        ]);

        $tarjeta=Tarjeta::create([
            'forma_pago_id'=>$formaPago->id,
            'numero'=>$numeroTarjeta,
            'mes'=>9,
            'anyo'=>2025,
            'clave'=>'012',
        ]);


        $tam=6;
        $auxMes=1;
        $auxAnyo=2025;
        for($i=0;$i<$tam;$i++){
            $anyo=Anyo::where('anyo','like',$auxAnyo)->first();
            $mes=Mes::where('anyo_id','like',$anyo->id)->where('mes','like',$auxMes)->first();
            $suscripcion=Suscripcion::where('mes_id','like',$mes->id)->first();
            $pagoSuscripcion=PagoSuscripcion::create([
                'suscripcion_id'=>$suscripcion->id,
                'user_id'=>$alumno->id,
                'articulo_id'=>$articulo4->id
            ]);
            $pagoLimitacion=PagoLimitacion::create([
                'pago_suscripcion_id'=>$pagoSuscripcion->id,
                'dia_corte'=>25,

            ]);
            $auxMes++;
            if( $auxMes>12){
                $auxMes=1;
                $auxAnyo++;
            }
        }


        $userLimitacion=UserLimitacion::create([
            'user_id'=>$alumno->id,
            'fecha_limite_administrador'=>null,
            'fecha_limite_encargado'=>null,
            'fecha_limite_reclutador'=>null,
            'fecha_limite_profesor'=>null,
            'fecha_limite_alumno'=>'25-'.$auxMes.'-'.$auxAnyo,
            'fecha_limite_mentor'=>null,
        ]);
    }
}
