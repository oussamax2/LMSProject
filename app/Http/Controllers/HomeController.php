<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\sessions;

class HomeController extends Controller
{


    public function home()
    {
        /**get latest sessions */
        $sessionList = sessions::orderBy('id', 'desc')->take(6)->get();
        /**get latest categories */
        $categList = categories::orderBy('id', 'desc')->take(6)->get();


        return view('front.index')->with([
            'sessionList'=>$sessionList,
            'categList'=>$categList
            ]);

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
    public function singlcourse($id)
    {

        $sessions = sessions::find($id);
         if(isset($sessions))
         return view('front.singlcourse', ['sessions'=>$sessions]);
        else
         return abort(404);
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
    public function detailcourse()
    {
        return view('front.detailcourse');
    }
    public function loginverif()
    {
        return view('front.loginverif');
    }
}
