<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMailable;
use App\leads;

class HomeController extends Controller
{





    public function sendmail($leadid='82815e0389040f2a5')
    {

        $leadmodel = new leads;
        $lead_data=$leadmodel->getLead($leadid);

      //  return view('email.emailtemplate',compact('lead_data'));

        //$data['title'] = "Laravel Send Email From Mail trap";
 
       /* Mail::send('email.emailtemplate', $data, function($message) {
 
            $message->to('noaman.kazi@gmail.com', 'Receiver Name')
 
                    ->subject('Laravel Send Email');
        });
        */


        Mail::to('Enquiry@instrumentsfinder.com')->send(new SendMailable($lead_data)); 
 
        if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
         }else{
           //return response()->json('Yes, You have sent email from LARAVEL sahieeee !!');

            return view('email.emailtemplate',compact('lead_data'));
         }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
