<?php

namespace SRAC\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
use SRAC\Http\Requests;
use SRAC\Http\Controllers\Controller;
use SRAC\Reserva;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->castigar();
        if(Auth::user()->role == 'cliente' or Auth::user()->role == 'socio'){

            $reservas = Reserva::where('user_id', Auth::user()->id)->orderBy('fecha', 'desc')->orderBy('estado', 'desc' )->get();

            return view('cliente.historial.historial')->with('reservas', $reservas);
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

            $reserva = new Reserva;
            return view('cliente.disponibilidad.disponibilidad')->with('reserva', $reserva);
        }
        elseif(Auth::user()->role == 'administrador' or Auth::user()->role == 'encargado'){
            return view('encargado.disponibilidad.disponibilidad');
        }
        else{
            return "hola";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->disponibilidad($request->fecha, $request->hora) == 2) {

            $reserva = new Reserva();
            $reserva->fecha = $request->fecha;
            $reserva->hora = $request->hora;
            if (Auth::user()->role == 'cliente' or Auth::user()->role == 'socio') {
                $reserva->estado = 'pendiente';
            } else {
                $reserva->estado = 'completada';
            }
            $reserva->user_id = $request->user_id;
            $reserva->save();

            return Redirect::route('cliente.reservas');
        }
        else{
            Session::flash('mensaje', 'Tienes reservas pendientes');
            return Redirect::route('cliente.reservas.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($today)
    {
        $reservas = Reserva::all()->where('fecha', $today);

        return view('encargado.disponibilidad.reservas.reservas')->with('reservas', $reservas);
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
        return view('encargado.disponibilidad.reservas.reserva')->with('reserva', $reserva);
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
        $reserva = Reserva::find($request->id);
        $reserva->estado = 'completada';
        $reserva->save();

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
