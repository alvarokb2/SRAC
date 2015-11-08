<?php

namespace SRAC\Http\Controllers;

use SRAC\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        return view('home');
    }

    public function contact(){
        return view('contact');
    }

    public function register(){
        return view('register');
    }
}
