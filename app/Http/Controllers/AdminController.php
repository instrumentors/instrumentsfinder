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


class AdminController extends Controller
{
    //


    public function index()
    {
    	$leads_model = new leads;
    	$leads=$leads_model->all();
		return view("admin.index",compact('leads'));

   	} 	

   	public function displayLead($leadid)
   	{
   		$leadmodel = new leads;
   		$lead_data=$leadmodel->getLead($leadid);
   		
   		/*echo("<pre>");
   		print_r($lead_data);
   		echo("</pre>");
   		*/
   		return view("admin.showlead",compact("lead_data"));
   	}	
}
