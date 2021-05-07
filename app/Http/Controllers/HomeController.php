<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  

    public function home()
    {
        return view('front.index');
    }
    public function partners()
    {
        return view('front.partners');
    }
    public function pro_training()
    {
        return view('front.pro_training');
    }
    public function catg_courses()
    {
        return view('front.catg_courses');
    }
    public function singlcourse()
    {
        return view('front.singlcourse');
    }
    public function registeruser()
    {
        return view('front.registeruser');
    }
    public function contact()
    {
        return view('front.contactp');
    }
    public function registervendor()
    {
        return view('front.registervendor');
    }
}