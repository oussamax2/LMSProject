<?php

namespace App\Models;

use Mail;
use App\Models\User;
use App\Models\companies;
class Mailsender
{



    public static  function sendcompanystatus($id,$status)
    {
       Mail::send('mail.comapnystatus', ['name'=>'ouni'], function ($message) {
            $message->from('itmax.tn@gmail.com', 'oussama');

            $message->to('oussamaouni.ing@gmail.com')->subject('contact from site');
        });
    }
    public static  function send()
    {
       Mail::send('mail.comapnystatus', ['name'=>'ouni'], function ($message) {
            $message->from('itmax.tn@gmail.com', 'oussama');

            $message->to('oussamaouni.ing@gmail.com')->subject('contact from site');
        });
    }
}
