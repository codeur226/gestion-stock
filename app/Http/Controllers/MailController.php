<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
  public function sendEmail ()
  {
      $details = [

        'title' =>'cest un mail dessaie',
        'body' =>'Ce mail a pour but de tester un envoie de mail depuis 
        mon application laravel a mon compte gmail gmail'
      ];
     Mail::to("boubakabore50@gmail.com")->send(new TestMail($details));
     return "Email sent";
  }
}
