<?php

namespace SRAC\Http\Controllers;

use Illuminate\Http\Request;

use SRAC\Http\Requests\CreateReservaRequest;
use Session;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use SRAC\Http\Requests;
use SRAC\Http\Controllers\Controller;
use SRAC\Reserva;
use SRAC\User;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role == 'cliente' or Auth::user()->role == 'socio'){
            Auth::user()->available();
            $reservas = Auth::user()->reservas()->orderBy('fecha_inicio', 'desc')->orderBy('estado', 'desc' )->get();
            return view('cliente.historial.historial')->with('reservas', $reservas);
        }

        if(Auth::user()->role == 'administrador' or Auth::user()->role == 'encargado'){
            return view('encargado.disponibilidad.reservas.reservas');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'cliente' or Auth::user()->role == 'socio') {
            return view('cliente.disponibilidad.disponibilidad');
        }
        elseif(Auth::user()->role == 'administrador' or Auth::user()->role == 'encargado'){
            return view('encargado.disponibilidad.disponibilidad');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReservaRequest $request)
    {
        if(Auth::user()->available()) {
            $fecha_inicio = (new DateTime())->setTimestamp($request->fecha_inicio);
            $fecha_fin = (new DateTime())->setTimestamp($request->fecha_fin);

            $reserva = Reserva::createReserva(
                $fecha_inicio,
                $fecha_fin,
                $request->numero_canchas,
                Auth::user()->id);

            if(Reserva::available($reserva)){
                $reserva->save();
                Session::flash('message-success', 'Reserva creada con exito');
            }
            else{
                Session::flash('message-error', 'No es posible reservar este horario');
            }
        }
        else{
            Session::flash('message-error', 'Tiene reservas pendientes o su cuenta no esta habilitada para reservar');
        }

        return Redirect::route('cliente.reservas');
    }

    public function storeMany(Request $request){
        $fecha_inicio = (new DateTime())->setTimestamp($request->fecha_inicio);
        $fecha_fin = (new DateTime())->setTimestamp($request->fecha_fin);

        $dias = array($request->lunes,
            $request->martes,
            $request->miercoles,
            $request->jueves,
            $request->viernes,
            $request->sabado,
            $request->domingo);
        $numero_canchas = $request->numero_canchas;
        $user_id = $request->user_id;

        if($request->fecha_inicio < $request->fecha_fin){
            Reserva::createMany($fecha_inicio,$fecha_fin,$dias,$numero_canchas,$user_id);
            Session::flash('message-success', 'Reservas creadas correctamente');
        }
        else{
            Session::flash('message-error', 'Error al crear reservas');
        }
        return Redirect::route('empleado.reservas');
    }

    public function reservarLotes($user_id){
        $user = User::findOrFail($user_id);
        return view('encargado.usuarios.reservarLotes')->with('user', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('encargado.disponibilidad.reservas.reserva')->with('reserva', $reserva);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('encargado.disponibilidad.reservas.reservar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $reserva = Reserva::findOrFail($request->reserva_id);
        if($request->operacion){
            $reserva->complete();
            $msg = 'la reserva '.$request->reserva_id.' ha sido completada';
        }
        else{
            $reserva->cancel();
            $msg = 'la reserva '.$request->reserva_id.' ha sido cancelada';
        }

        Session::flash('message-success', $msg);
        return Redirect::route('empleado.reservas');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
