<?php

namespace SRAC\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\Auth;
use SRAC\Http\Controllers\Controller;
use SRAC\Reserva;

class FrontController extends Controller
{
    public function index(){
        return view('home');
    }

    public function contact(){
        return view('contact');
    }

    public function register(){
        return view('register');
    }

    public function historial(){
        return view('cliente.historial.historial');
    }

    public function test(){

        /*
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

        $reservas = Auth::user()->reservas()->get();
        return view('test')->with('reservas', $reservas);
    }

}
