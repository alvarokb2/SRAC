<?php

namespace SRAC\Http\Controllers;

use SRAC\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use SRAC\Http\Controllers\Controller;
use SRAC\Reserva;

class FrontController extends Controller
{

    public function __construct(){
        $this->middleware('guest', ['only' => 'register']);
    }

    public function index(){
        if(Auth::user()){
            switch(Auth::user()->role){
                case 'cliente':
                case 'socio':
                    return redirect('cliente/reserva');
                    break;
                case 'encargado':
                case 'administrador':
                    return redirect('empleado/usuarios');
                    break;
                default:
                    return view('home');
            }
        }
        return view('home');
    }

    public function contact(){
        return view('contact');
    }

    public function register(){
        return view('register');
    }

    public function test(){

        /*
         * prueba metodos
        $fecha_inicio = new \DateTime();
        $fecha_inicio->setDate(2015,11,23);
        $fecha_inicio->setTime(9,0);

        $fecha_fin = new \DateTime();
        $fecha_fin->setDate(2015,11,23);
        $fecha_fin->setTime(11,0);

        $dias = '01111111';
        $numero_canchas = '1';

        $reserva = Reserva::createReserva($fecha_inicio,$fecha_fin, $dias, $numero_canchas, Auth::user()->id);
        $reserva->save();
        */


        /*
         * prueba createMany
         *
        $fecha_inicio = (new DateTime())->setDate(2015,11,29);
        $fecha_inicio->setTime(9,0);
        $fecha_fin = (new DateTime())->setDate(2016,2,15);
        $fecha_fin->setTime(11,0);
        $dias = [1,3,5];
        $numero_canchas = 3;
        $user_id = 1;

        Reserva::createMany($fecha_inicio,$fecha_fin,$dias,$numero_canchas,$user_id);
        */
        return view('test');
    }

}
