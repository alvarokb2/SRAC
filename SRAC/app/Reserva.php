<?php

namespace SRAC;

use Illuminate\Database\Eloquent\Model;


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

}
