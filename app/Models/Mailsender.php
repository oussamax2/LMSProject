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
            $message->from('courseek21@gmail.com', 'lms project');
            $message->to($user->email)->subject('Comapny status');
        });
    }
    public static  function senduser($id,$idr,$status)
    {
        $user =   User::find($id);
        $registeration = registerations::find($idr);
        Mail::send('mail.registerationtatus', ['user'=>$user,'status'=>$status,'registeration'=>$registeration], function ($message) use ($user){
             $message->from('courseek21@gmail.com', 'lms project');
             $message->to($user->email)->subject('Registerations status ');
         });
    }

    public static  function sendcompany($id,$idr,$idc)
    {
        $user =   User::find($id);
        $company =   User::find($idc);
        $registeration = registerations::find($idr);
        Mail::send('mail.registerationnew', ['name'=>$company->name,'user'=>$user,'registeration'=>$registeration], function ($message) use ($company){
             $message->from('courseek21@gmail.com', 'lms project');
             $message->to($company->email)->subject('New Registerations');
         });
    }

    public static  function sendcompanycancel($id,$idr,$idc)
    {
        $user =   User::find($id);
        $company =   User::find($idc);
        $registeration = registerations::find($idr);
        Mail::send('mail.registerationnew', ['name'=>$company->name,'user'=>$user,'registeration'=>$registeration], function ($message) use ($company){
             $message->from('courseek21@gmail.com', 'lms project');
             $message->to($company->email)->subject('Cancel Registeration');
         });
    }

    public static  function sendcompanypaid($id,$idr,$idc)
    {
        $user =   User::find($id);
        $company =   User::find($idc);
        $registeration = registerations::find($idr);
        Mail::send('mail.registerationnew', ['name'=>$company->name,'user'=>$user,'registeration'=>$registeration], function ($message) use ($company){
             $message->from('courseek21@gmail.com', 'lms project');
             $message->to($company->email)->subject('Registeration Paid');
         });
    }
     public static  function sendmsgtouser($id,$idM,$messagee)
    {
        $user =   User::find($id);
        $registeration = registerations::find($idM);
        Mail::send('mail.registerationmessage', ['name'=>$user->name,'msg'=>$messagee,'registeration'=>$registeration], function ($message) use ($user){
             $message->from('courseek21@gmail.com', 'lms project');
             $message->to($user->email)->subject('Registerations Message ');
         });
    }
}
