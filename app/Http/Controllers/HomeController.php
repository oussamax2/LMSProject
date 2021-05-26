<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\companies;
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

    public function pro_training($id)
    {

        $companies = companies::find($id);
          foreach($companies->courses as $countsess){
            $countsessions = count($countsess->sessions);
        }
        if(isset($companies))
        return view('front.pro_training', compact('companies', 'countsessions'));
       else
        return abort(404); 
      
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
}
