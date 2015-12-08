<?php

namespace SRAC;

use Illuminate\Database\Eloquent\Model;
use SRAC\Utilidades;


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
    public static function createReserva($fecha_inicio, $fecha_fin, $numero_canchas = null, $user_id, $estado = null){
        if($numero_canchas == null){
            $numero_canchas = 1;
        }
        if($estado == null){
            $estado = 'pendiente';
        }

        $response = new Reserva;
        $response->fecha_inicio = $fecha_inicio;
        $response->fecha_fin = $fecha_fin;
        $response->estado = $estado;
        $response->numero_canchas = $numero_canchas;
        $response->user_id = $user_id;

        return $response;
    }

    public static function getStatus($reserva){
        $user = User::findOrFail($reserva->user_id);

        $aux = $user->reservas()->where('fecha_inicio', '=', $reserva->fecha_inicio)
            ->where('estado', '!=', 'cancelada')
            ->get();
        if($aux->count() > 0){
            return $aux->first()->estado;
        }
        else{
            if(Reserva::available($reserva)){
                return 'disponible';
            }
            else{
                return 'no disponible';
            }
        }
    }

    public static function createMany($fecha_inicio, $fecha_fin, $dias,$numero_canchas, $user_id){
        $fecha_inicio_int = $fecha_inicio->getTimestamp();
        $fecha_fin_int = $fecha_fin->getTimestamp();

        $array = array();
        $hasError = false;
        $msg = '';

        $anio = date('Y', $fecha_inicio_int);
        $mes = date('m', $fecha_inicio_int);
        $dia = date('d', $fecha_inicio_int);

        $hora_inicio = date('H', $fecha_inicio_int);
        $hora_fin = date('H', $fecha_fin_int);

        $dias_int = floor(($fecha_fin_int - $fecha_inicio_int) / (60 * 60 *24));

        for($dia_int = 0; $dia_int <= $dias_int; $dia_int++){
            for($hora = $hora_inicio; $hora < $hora_fin; $hora++){
                $fecha_inicio_aux = new \DateTime();
                $fecha_fin_aux = new \DateTime();

                $fecha_inicio_aux->setDate($anio, $mes, $dia + $dia_int);
                $fecha_inicio_aux->setTime($hora, 0);

                $fecha_fin_aux->setTimestamp($fecha_inicio_aux->getTimestamp());
                $fecha_fin_aux->setTime($hora + 1, 0);

                if(in_array(date('N', $fecha_inicio_aux->getTimestamp()), $dias)) {
                    $reserva = Reserva::createReserva($fecha_inicio_aux, $fecha_fin_aux, $numero_canchas, $user_id, 'completada');
                    if(Reserva::available($reserva)){
                        $array[] = $reserva;

                    }
                    else{
                        $hasError = true;
                        $msg = $msg.'Error en la fecha '.$fecha_inicio_aux->format('Y/m/d').'<br>';
                    }
                }
            }
        }

        if(!$hasError){
            foreach($array as $item){
                $item->save();
            }
            $msg = 'Reservas realizadas con exito';
        }
        return $msg;
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

    public static function cancelMany($fecha_inicio, $fecha_fin){
        $reservas = Reserva::where('fecha_inicio', '>=', $fecha_inicio)
            ->where('fecha_fin', '<=', $fecha_fin)
            ->get();
        foreach($reservas as $reserva){
            $reserva->cancel();
        }
    }

    /**
     * @param : $reserva
     * @response : bool
     * true si la reserva esta disponible
     */
    public static function available($reserva){
        $actual = new \DateTime();
        return Reserva::countMax($reserva) + $reserva->numero_canchas <= Utilidades::$numero_canchas && $reserva->fecha_inicio > $actual ;
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
                if($aux->estado != 'cancelada'){
                    $response = $response + $aux->numero_canchas;
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
        $this->update();
    }

    /**
     * @param
     * @response : void
     * cambia el estado de la reserva a 'cancelada'
     */
    public function cancel(){
        $this->estado = 'cancelada';
        $this->update();
    }
}
