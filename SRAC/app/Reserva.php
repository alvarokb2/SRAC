<?php

namespace SRAC;

use Illuminate\Database\Eloquent\Model;


class Reserva extends Model
{
    protected $table = 'reservas';

    public function user(){
        return $this->belongsTo('SRAC\User');
    }

    /**
     * @param : $fecha_inicio, $fecha_fin,$dias, $numero_canchas, $user_id
     * @response : Reserva
     * devuelve una reserva con los parametros indicados
     */
    public static function createReserva($fecha_inicio, $fecha_fin,$dias, $numero_canchas, $user_id){
        $response = new Reserva;
        $response->fecha_inicio = $fecha_inicio;
        $response->fecha_fin = $fecha_fin;
        $response->dias = $dias;
        $response->numero_canchas = $numero_canchas;
        $response->user->id = $user_id;

        return $response;
    }


    /**
     * @param : $reserva
     * @response : Reserva[]
     * devuelve un array de reservas entre las fechas de $reserva
     */
    public static function getRange($reserva){
        $response = Reserva::where('fecha_inicio', '>=', $reserva->fecha_inicio)
            ->where('fecha_fin', '<=', $reserva->fecha_fin)
            ->get();
        return $response;
    }


    /**
     * @param : $reserva
     * @response : bool
     * true si la reserva esta disponible
     */
    public static function available($reserva){

    }

    /**
     * @param : $reserva
     * @response : int
     * devuelve el numero maximo de reservas en la interseccion
     */
    public static function countMax($reserva){
        $rango = Reserva::getRange($reserva);
        $response = 0;
        foreach($rango as $aux){
            if($response < $aux->numero_canchas){
                $response = $aux->numero_canchas;
            }
        }
        return $response;
    }

    /**
     * @param : $reserva
     * @response : int
     * devuelve el numero minimo de reservas en la interseccion     */
    public static function countMin($reserva){
        $rango = Reserva::getRange($reserva);
        $response = 8;
        foreach($rango as $aux){
            if($response > $aux->numero_canchas){
                $response = $aux->numero_canchas;
            }
        }
        return $response;
    }

    /**
     * @param : $fecha_inicio, $fecha_fin
     * @response : Reserva[]
     * devuelve un array con las reserva pendientes en el intervalo
     */
    public static function getPending($fecha_inicio, $fecha_fin){
        $rango = Reserva::where('fecha_inicio', '>=', $fecha_inicio)
            ->where('fecha_fin', '<=' , $fecha_fin)
            ->where('estado', '=' , 'pendiente')
            ->get();
        return $rango > 0;
    }

    /**
     * @param
     * @response : void
     * cambia el estado de la reserva a 'completada'
     */
    public function complete(){
        $this->estado = 'completada';
        $this->save();
    }

    /**
     * @param
     * @response : void
     * cambia el estado de la reserva a 'cancelada'
     */
    public function cancel(){
        $this->estado = 'cancelada';
        $this->save();
    }
}
