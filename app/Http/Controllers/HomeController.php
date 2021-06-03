<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\companies;
use App\Models\registerations;
use Illuminate\Http\Request;
use App\Models\sessions;
use App\Models\cities;

class HomeController extends Controller
{


    public function home()
    {
        /**get latest sessions */
        $sessionList = sessions::orderBy('id', 'desc')->take(6)->get();
        /**get latest categories */
        $categList = categories::inRandomOrder()->orderBy('id', 'desc')->take(6)->get();
        $citiesList = cities::inRandomOrder()->orderBy('id', 'desc')->take(8)->get();
        $companies = companies::inRandomOrder()->orderBy('id', 'desc')->take(8)->get();


        return view('front.index')->with([
            'sessionList'=>$sessionList,
            'categList'=>$categList,
            'companies'=>$companies,
            'citiesList'=>$citiesList
            ]);

    }

    public function partners()
    {
        $companies = companies::inRandomOrder()->orderBy('id', 'desc')->take(8)->get();
        return view('front.partners')->with(['companies'=>$companies ]);
    }


    public function pro_training($id)
    {
        $countsessions = 0;
        $companies = companies::find($id);
        $countsessions = sessions::whereHas('courses', function ($query) use ($id){
            $query->where('company_id',$id);
    })->count();

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
        if(auth()->user())
        {

            //get count user registertions in same session
            $registuser = registerations::where('session_id', $sessions->id)->where('user_id', auth()->user()->id)->first();

            if(isset($sessions))
            return view('front.singlcourse', ['sessions'=>$sessions, 'registuser' => $registuser]);
            else
            return abort(404);

        }else{
            if(isset($sessions))
            return view('front.singlcourse', ['sessions'=>$sessions]);
            else
            return abort(404);

        }

    }
    public function registeruser()
    {   if(auth()->user())
        return redirect('/');
        return view('front.registeruser');
    }
    public function contact()
    {
        return view('front.contactp');
    }
    public function registervendor()
    {   if(auth()->user())
        return redirect('/');
        return view('front.registervendor');
    }
    public function detailcourse()
    {
        return view('front.detailcourse');
    }
}
