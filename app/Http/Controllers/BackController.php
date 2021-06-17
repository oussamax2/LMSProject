<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\courses;
use App\Models\registerations;
use App\Models\sessions;
use App\Models\User;
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
     
             
            $rgstrdUsers = registerations::whereHas('sessions',function($sess){
                                                          
                          $sess->whereHas('courses',function($crs){
                            
                                $crs->whereHas('companies',function($comp){
                                    
                                    $comp->where('deleted_at',null);
                                });
                            });
                       
            })->where('status',0)->take(6)->get();
            // var_dump($rgstrdUsers);

            $countcompanies =companies::count();
            $countcourses = courses::count();
            $countsessions = sessions::count();        
            $countregisterations = registerations::count();
            return view('home', compact([
                'rgstrdUsers',
                'countcompanies',
                'countcourses',    
                'countsessions',     
                'countregisterations'          
    
            ]));

   
        
      
     
    }

    public function company()
    { 
        

        $rgstrdUsers = registerations::whereHas('sessions',function($sess){
                                                          
                        $sess->whereHas('courses',function($crs){
                        
                            $user = auth()->user();
                            $crs->where('company_id',$user->companies->id);
                        });
                   
            })->where('status',0)->take(6)->get();

             //dd($rgstrdUsers);
           
            $countcourses = courses::where('company_id', auth()->user()->companies->id)->count();

            $countsessions = sessions::whereHas('courses',function($crs){
                        
                            $user = auth()->user();
                            $crs->where('company_id',$user->companies->id);
                       
                   
            })->count();
           
            $countregisterations = registerations::whereHas('sessions',function($sess){
                                                          
                $sess->whereHas('courses',function($crs){
                
                    $user = auth()->user();
                    $crs->where('company_id',$user->companies->id);
                });
           
                })->count();
            return view('home', compact([
                'rgstrdUsers',
                'countcourses',    
                'countsessions',     
                'countregisterations'          
    
            ]));
        
    }
    public function user()
    { 

        $rgstrdUsers = registerations::where('user_id',auth()->user()->id)->where('status',0)->take(6)->get();
                                                          
          
        return view('home', compact('rgstrdUsers'));
    }
}
