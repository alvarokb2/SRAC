<?php

namespace SRAC\Http\Controllers;

use Faker\Provider\Barcode;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Redirect;
use SRAC\Http\Requests;
use SRAC\Http\Requests\RegisterUserRequest;
use SRAC\Http\Controllers\Controller;
use SRAC\User;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('encargado.usuarios.usuarios')->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserRequest $request)
    {
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);
        Session::flash('message-success','Usuario registrado correctamente');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('encargado.usuarios.edit')->with('user', $user);
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
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != '') {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;

        $user->save();
        $user = User::all();
        return redirect('empleado/usuarios')->with('users', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $users = User::all();
        return Redirect::route('empleado.usuarios')->with('users',$users);
    }

}
