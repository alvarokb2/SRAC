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


    public function showReservasUsuario($user_id){
        $user_name = User::findOrFail($user_id)->name;
        $reservas = User::findOrFail($user_id)->reservas()->where('estado', '=', 'pendiente')->get();
        return view('encargado.usuarios.reservas')->with('reservas', $reservas)->with('user_name', $user_name);
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
        $reserva = Reserva::where('id', '=', $request->id)->get();
        $reserva->complete();

        return Redirect::route('empleado.reservas.show', date('Y-n-j', time()));
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
