<?php

namespace SRAC\Http\Controllers;


use Illuminate\Http\Request;

use Auth;
use Session;
use Redirect;
use SRAC\Http\Requests\LoginRequest;
use SRAC\Http\Requests;
use SRAC\Http\Controllers\Controller;
use SRAC\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {

        if(Auth::attempt(['name' => $request['name'], 'password' => $request['password']])){

            if(Auth::user()->role == 'administrador' or Auth::user()->role == 'encargado') {
                return Redirect::route('empleado.usuarios');
            }
            else{
                return Redirect::route('cliente.reservas');
            }
        }
        Session::flash('message-error', 'Datos son incorrectos');
        return Redirect::route('/');
    }

    public function logout(){
        Auth::logout();
        return Redirect::route('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
