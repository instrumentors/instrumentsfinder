<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category_master;
use App\products_master;
use App\applications_master;
use App\documents_master;
use App\accessory_master;
use App\products_options;

use App\leads;
use App\lead_products;
use App\lead_options;
use App\Mail\SendMailResponse;
use Mail;

//admin details : instrumentsfinder@gmail.com/instru786

class AdminController extends Controller
{
    //


    public function index(Request $request)
    {
    	$leads_model = new leads;
   

    	$leads=$leads_model->where('status','EMAIL_SENT')->orWhere('status','NEW')->orderBy('created_at', 'desc')->paginate(25);

      echo($request->ip());

    

		return view("admin.index",compact('leads'));

   	} 	

   	public function displayLead($leadid)
   	{
   		$leadmodel = new leads;
   		$lead_data=$leadmodel->getLead($leadid);
   		
      
   		return view("admin.showlead",compact("lead_data"));
   	}	


    public function sendmailresponse($to,$msg,$leadid,$cc=false)
    {

      $leadmodel = new leads;
      $lead_data=$leadmodel->getLead($leadid);

      if($cc)
      Mail::to($to)->cc("enquiry@agisafety.com")->send(new SendMailResponse($to,$msg,$lead_data)); 
      else
       Mail::to($to)->send(new SendMailResponse($to,$msg,$lead_data)); 
 
        if (Mail::failures()) {
           return response()->Fail('sorry, email not sent');
         }else{
          
          $leadmodel = new leads;
          $leadmodel->where("order_id",$leadid)->update(['status' => "EMAIL_RESPONSE_SENT"]);
           return response()->json('Your email was sent');
         }
      
    }


    public function sendEmailReponse(Request $request,$leadid)
    {

        $textarea_email="";
      $to_email="";

      if($request->input("textarea_email")!=null)
      $textarea_email= $request->input("textarea_email");

      if($request->input("textarea_email")!=null)
      $to_email= $request->input("to_email");

      $resp="invalid data";
      if($textarea_email!="" && $to_email!="")
      {

        $resp = $this->sendmailresponse($to_email,$textarea_email,$leadid,true);
       

      }  
        return view("admin.sendEmailResponse",compact("resp"));
    }

    public function displayLeadEmail($leadid)
    {
      $leadmodel = new leads;
      $lead_data=$leadmodel->getLead($leadid);
      
      return view("admin.showEmail",compact("lead_data"));
    }

    public function previewLeadEmail($leadid,Request $request)
    {
        $leadmodel = new leads;
        $lead_data=$leadmodel->getLead($leadid);
        return view("admin.previewEmail",compact("lead_data","request"));
    }
}
