<?php

namespace SRAC\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use SRAC\Http\Requests;
use SRAC\Http\Controllers\Controller;
use SRAC\Noticia;

class NoticiaController extends Controller
{

    public function __construct(){
        $this->middleware('administrador', ['except' => 'socioNoticias']);
        $this->middleware('socio', ['only' => 'socioNoticias']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('encargado.admin.noticias.noticias')->with('noticias', $noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encargado.admin.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;

        $noticia->save();
        Session::flash('message-success', 'Noticia creada con exito');
        return Redirect::route('empleado.admin.noticias');
    }

    public function socioNoticias(){
        $noticias = Noticia::all();
        return view('cliente.socio.noticias.noticias')->with('noticias', $noticias);
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
        $noticia = Noticia::find($id);
        return view('encargado.admin.noticias.edit')->with('noticia', $noticia);
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
        $noticia = Noticia::find($request->id);
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;

        $noticia->save();
        $noticias = Noticia::all();
        Session::flash('message-success', 'Noticia editada correctamente');

        return Redirect::route('empleado.admin.noticias')->with('noticias', $noticias);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Noticia::destroy($id);
        $noticias = Noticia::all();
        Session::flash('message-success', 'Noticia elimidada correctamente');
        return Redirect::route('empleado.admin.noticias')->with('noticias', $noticias);
    }
}
