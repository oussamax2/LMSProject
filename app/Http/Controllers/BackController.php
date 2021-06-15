<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\courses;
use App\Models\registerations;
use App\Models\sessions;
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
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    { 
        $countcompanies = companies::count();
        $countcourses = courses::count();
        $countsessions = sessions::count();        
        $countregisterations = registerations::count();
        
        // var_dump($countcompanies);
        // var_dump($countcourses);
        // var_dump($countsessions);
        // var_dump($countregisterations);
        
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
