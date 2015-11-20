<?php

namespace SRAC;

use Illuminate\Database\Eloquent\Model;
use User;


class Reserva extends Model
{
    protected $table = 'reservas';

    public function user(){
        return $this->belongsTo('SRAC\User');
    }

    public function reservar($fecha, $hora, $id){
        $reserva = new Reserva();
        $reserva->fecha = $fecha;
        $reserva->hora = $hora;
        $reserva->user_id = $id;
        $reserva->save();
    }

    public function disponibilidad($fecha, $hora){
        $response = Reserva::where('fecha', '=' ,$fecha)
                            ->where('hora', '=' , $hora)
                            ->count();
        //el numero de canchas es 7
        if($response < 2){
            return true;
        }
        else{
            return false;
        }
    }

}
