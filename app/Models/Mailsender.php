<?php

namespace App\Models;

use Mail;
use App\Models\User;
use App\Models\companies;
use App\Models\registerations;
class Mailsender
{



    public static  function sendcompanystatus($id,$status)
    {
      $user =   User::find($id);
       Mail::send('mail.comapnystatus', ['name'=>$user->name,'status'=>$status], function ($message) use ($user){
            $message->from('itmax.tn@gmail.com', 'lms project');
            $message->to($user->email)->subject('Comapny status');
        });
    }
    public static  function senduser($id,$idr,$status)
    {
        $user =   User::find($id);
        $registeration = registerations::find($idr);
        Mail::send('mail.registerationtatus', ['name'=>$user->name,'status'=>$status,'registeration'=>$registeration], function ($message) use ($user){
             $message->from('itmax.tn@gmail.com', 'lms project');
             $message->to($user->email)->subject('Registerations status ');
         });
    }

    public static  function sendcompany($id,$idr,$idc)
    {
        $user =   User::find($id);
        $company =   User::find($idc);
        $registeration = registerations::find($idr);
        Mail::send('mail.registerationnew', ['name'=>$company->name,'user'=>$user,'registeration'=>$registeration], function ($message) use ($company){
             $message->from('itmax.tn@gmail.com', 'lms project');
             $message->to($company->email)->subject('New Registerations');
         });
    }
}
