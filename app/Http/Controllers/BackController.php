<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    { //auth()->user()->addRole(['company','admin','user']);
        return view('home');
    }

    public function company()
    { //auth()->user()->addRole(['company','admin','user']);
        return view('home');
    }
    public function user()
    { //auth()->user()->addRole(['company','admin','user']);
        return view('home');
    }
}
