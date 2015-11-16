<?php

namespace SRAC\Http\Controllers;

use Illuminate\Http\Request;

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
        if(Auth::user()->role == 'cliente' or Auth::user()->role == 'socio'){
            return view('cliente.historial.historial');
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
        $reserva = new Reserva();
        $reserva->fecha = date('j-n-y', time() + ($request->fecha * 86400));
        $reserva->hora = $request->hora;
        $reserva->user_id = $request->user_id;
        $reserva->save();

        return "reserva creada";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
