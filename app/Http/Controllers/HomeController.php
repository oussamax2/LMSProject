<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\companies;
use App\Models\registerations;
use Illuminate\Http\Request;
use App\Models\sessions;
use App\Models\cities;
use App\Models\countries;
use App\Models\target_audiance;
use App\Models\User;

class HomeController extends Controller
{


    public function home()
    {
        /**get latest sessions */
        $sessionList = sessions::orderBy('id', 'desc')->where('publish',1)->take(9)->get();
        /**get latest categories */
        $categList = categories::inRandomOrder()->orderBy('id', 'desc')->take(6)->get();
        // $citiesList = cities::inRandomOrder()->orderBy('id', 'desc')->take(8)->get();
        $companies = companies::inRandomOrder()->orderBy('id', 'desc')->take(12)->get();



        $citiesList = cities::whereHas('sessions', function ($query) {
            $query->where('deleted_at',null);
        })->inRandomOrder()->orderBy('id', 'desc')->take(12)->get();
        // var_dump($cities);
        return view('front.index')->with([
            'sessionList'=>$sessionList,
            'categList'=>$categList,
            'companies'=>$companies,
            'citiesList'=>$citiesList
            ]);

    }

    public function partners()
    {
        // $companies = companies::orderBy('id', 'desc')->take(6)->get();
        $companies = companies::orderBy('id', 'desc')->where('status',2)->paginate(4);
        return view('front.partners')->with(['companies'=>$companies ]);
    }



   /**get partners List according to button click */
   public function getpartners(Request $request)
    {
        if($request->has('page')){
          $page = $request->get('page');
             $partners = companies::orderBy('id', 'desc')->skip($page - 1)->paginate(4);
              return response()->json($partners);
        }else{
        return response()->json("null page");

        }

    }



    public function pro_training($id)
    {
        $countsessions = 0;
        $companies = companies::find($id);
        $countsessions = sessions::whereHas('courses', function ($query) use ($id){
            $query->where('company_id',$id);
         })->count();



        $countregisterations = registerations::whereHas('sessions',function($sess) use ($id){

                            $sess->whereHas('courses',function($crs) use ($id){


                                $crs->where('company_id',$id);
                            });

                            })->count();

        if(isset($companies))
        return view('front.pro_training', compact('companies', 'countsessions', 'countregisterations'));
       else
        return abort(404);

    }

    public function catg_courses()
    {  $categList = categories::orderBy('id', 'desc')->get();
        $targets = target_audiance::orderBy('id', 'desc')->get();
        $citiesList = cities::whereHas('sessions', function ($query) {
            $query->where('deleted_at',null);
        })->orderBy('id', 'desc')->get();
        $Country = countries::whereHas('sessions', function ($query) {

        })->orderBy('id', 'desc')->get();

        return view('front.catg_courses')->with([
            'categList'=>$categList,
            'targets'=>$targets,
            'countries'=>$Country,
            'citiesList'=>$citiesList
            ]);;
    }
    public function singlcourse($id)
    {

        $sessions = sessions::find($id);
        if(auth()->user())
        {

            //get count user registertions in same session
            $registuser = registerations::where('session_id', $sessions->id)->where('user_id', auth()->user()->id)->first();

            if(isset($sessions) && ($sessions->publish ==1 || $sessions->my()) )
            return view('front.singlcourse', ['sessions'=>$sessions, 'registuser' => $registuser]);
            else
            return abort(404);



        }else
        {
            if(isset($sessions) && $sessions->publish==1)
            return view('front.singlcourse', ['sessions'=>$sessions]);
            else
            return abort(404);
        }

    }
    public function registeruser()
    {
        /**get users with role "user" ~~ student_list */
        $studentcount = User::whereHas('roles', function ($query) {
            $query->where('name','user');
        })->count();

        if(auth()->user())
        return redirect('/');
        return view('front.registeruser', compact('studentcount'));

    }
    public function contact()
    {
        return view('front.contactp');
    }


        /* confirmed_register */

        public function confirmedregister()
        {
            return view('front.confirmedregister');
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
