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
/*

 

wget -p -k -e robots=off -U 'Mozilla/5.0 (X11; U; Linux i686; en-US;rv:1.8.1.6) Gecko/20070802 SeaMonkey/1.1.4' http://demo.devitems.com/subas-preview/subas/elements-sidebar-right.html


GEO IP
https://ipstack.com/
API KEY : 3cf453a7e01668f433270f0f51956f1b

Delete from accessory_masters;
Delete from applications_masters;   
Delete from category_masters;       
Delete from documents_files;        
Delete from documents_masters;      
Delete from migrations;
Delete from options_variants;
Delete from password_resets;
Delete from products_master;
Delete from products_options;
Delete from users;
Delete from lead_options;
Delete from lead_products;
Delete from leads;


 Drop table accessory_masters;
 Drop table applications_masters;   
 Drop table category_masters;       
 Drop table documents_files;        
 Drop table documents_masters;      
 Drop table migrations;
 Drop table options_variants;
 Drop table password_resets;
 Drop table products_master;
 Drop table products_options;
 Drop table users;
 Drop table leads;
 Drop table lead_options;
 Drop table lead_products;

*/

class MainController extends Controller
{
    //

	public function getSearchResults(Request $request)
	{
		
		
        $query = $request->get('query',''); 
        $productmaster = new products_master;       
        $posts=$productmaster->getSearchResults($query);
        

        return response()->json($posts);

	
	}


	public function submitLead(Request $request)
	{


		$lead_model = new leads;
		$lead_prod_model = new lead_products;
		$lead_opt_model = new lead_options;

		$ip_addres = $request->ip();

		//for testing

		$ip_addres="94.200.28.38";

		$locapiurl='http://api.ipstack.com/'.$ip_addres.'?access_key=3cf453a7e01668f433270f0f51956f1b';


		$locdata=json_decode(file_get_contents($locapiurl), true);
		echo("<pre>");
		print_r($locdata);
		echo("</pre>");
		//$loc = geoip('232.223.11.11');
		$inquiry_description="";
		$email="";
		$shipping_country="";
		$resellerpricing='N';
		$bulkpricing='N';

		if($request->input("CountryProductShipsTo")!=null)
			$email= $request->input("CountryProductShipsTo");

		if($request->input("inquiryDescription")!=null)
			$inquiry_description= $request->input("inquiryDescription");
		
		if($request->input("email")!=null)
			$email= $request->input("email");
		
		if($request->input("resellerpricing")!=null)
			$resellerpricing= 'Y';
		
		if($request->input("bulkpricing")!=null)
			$bulkpricing= 'Y';

		if($request->input("CountryProductShipsTo")!=null)
			$shipping_country= $request->input("CountryProductShipsTo");

		$country="";
		if(is_array($locdata) && $locdata["country_name"]!=null)
			$country=$locdata["country_name"];

		$countrycode="";
		if(is_array($locdata) && $locdata["country_code"]!=null)
			$country=$locdata["country_code"];

		$countryflag="";
		if(is_array($locdata["location"]) && $locdata["location"]["country_flag"]!=null)
			$countryflag=$locdata["location"]["country_flag"];

		$countryemoji="";
		if(is_array($locdata["location"]) && $locdata["location"]["country_flag_emoji"]!=null)
			$countryemoji=$locdata["location"]["country_flag_emoji"];

		$city="";
		if(is_array($locdata) && $locdata["city"]!=null)
			$city=$locdata["city"];

		$lat="";
		if(is_array($locdata) && $locdata["latitude"]!=null)
			$lat=$locdata["latitude"];

		$lon="";
		if(is_array($locdata) && $locdata["longitude"]!=null)
			$lon=$locdata["longitude"];



		/*echo("<pre>");
		print_r($request->input());
		echo("</pre>");
		*/

		$pref = rand(1000,9999);

		//if( is_array($request->input("product") && $request->input("product")[0]!=null))
		//	$pref = $request["product"][0];

		$product_arr = $request->input("product");
		$qty_arr = $request->input("qty");

		$option_arr = array();

		if($request->input("option_id")!=null)
			$option_arr = $request->input("option_id");

		//print_r($product_arr);

		$variant_arr = array();
		if($request->input("variant")!=null)
			$variant_arr = $request->input("variant");

		$order_id = uniqid($pref);

		$name='';

		
		$lead_data_to_add = ["order_id"=>$order_id,"name"=>$name,"email"=>$email,"enquiry_desc"=>$inquiry_description,"reseller_price"=>$resellerpricing,"bulk_price"=>$bulkpricing,"country_shipping"=>$shipping_country,"country"=>$country,"country_code"=>$countrycode,"country_flag"=>$countryflag,"country_emoji"=>$countryemoji,"city"=>$city,"lat"=>$lat,"lon"=>$lon];

		$products_data_to_add=array();

		foreach ($product_arr as $key => $value) {
			//print("key ".$key." v = ".$value);	
			if(isset($qty_arr[$key]))
				$qty=$qty_arr[$key];
			else
				$qty = 0;
			//print("<hr/>".$qty);
			array_push($products_data_to_add, ["order_id"=>$order_id,"product_id"=>$key,"quantity"=>$qty]);
		}
		//['order_id','product_id','quantity']

		$options_data_to_add=array();

		foreach ($option_arr as $pid => $opt_arr) {
			
			foreach($opt_arr as $opt_id)
			{
				$varid=0;
				if(isset($variant_arr[$opt_id]))
					$varid=$variant_arr[$opt_id];

				array_push($options_data_to_add, ["order_id"=>$order_id,"product_id"=>$pid,"option_id"=>$opt_id,"variant_id"=>$varid]);
			}	
		}	

		//protected $fillable =['order_id','product_id','option_id','variant_id'];


		echo("<pre>");
		print_r($lead_data_to_add);
		//print_r($products_data_to_add);
		//print_r($options_data_to_add);
		echo("</pre>");

		$lead_model->create($lead_data_to_add);
		foreach($products_data_to_add as $prod_data_to_add)
		$lead_prod_model->create($prod_data_to_add);

		foreach($options_data_to_add as $option_data_to_add)
		$lead_opt_model->create($option_data_to_add);

		return ("We will get back to you soon");

	}

	public function showProductsBypID($productid,$productslug)
	{
		$productmaster = new products_master;
		$categorymaster = new category_master;
		$productData=$productmaster->getProductByID($productid);
		$documentsmasters=new documents_master;
		$accessorymaster=new accessory_master;
		$productoptions=new products_options;

		$cat_array=array();
		if($productData->cat1!="")
			$cat_array[]=$productData->cat1;
		if($productData->cat2!="")
			$cat_array[]=$productData->cat2;
		if($productData->cat3!="")
			$cat_array[]=$productData->cat3;
		if($productData->cat4!="")
			$cat_array[]=$productData->cat4;

		//print_r($cat_array);

		$category_array=[];
		foreach($cat_array as $catidval)
			$category_array[]=$categorymaster->getCategoryByProuctID($catidval)->toArray();

		$docs = $documentsmasters->getDocumentsByProductID($productid);
		
		$accessories = $accessorymaster->getAccessoriesByProductID($productid);

		$options=$productoptions->getProductOptionsByProductID($productid);

		return view('productdetails',compact('productData','category_array','docs','accessories','options'));
		
	}

	

    public function showCategoryListing()
    {
    	$applicationmaster = new applications_master;
    	$applications = $applicationmaster->getApplicationsbyNameCount();
    	$categorymaster = new category_master;
    	$categories = $categorymaster->getCategorybyNameCount();

    	return view('categorylist', compact('categories','applications'));
    }

    public function showApplicationsListing()
    {
    	$applicationmaster = new applications_master;
    	$applications = $applicationmaster->getApplicationsbyNameCount();

    	return view('applicationslist', compact('applications'));
    }

    public function showBrandsListing()
    {
    	$productmaster = new products_master;
    	$brands=$productmaster->getBrandsbyNameCount();
    	$applicationmaster = new applications_master;
    	$applications = $applicationmaster->getApplicationsbyNameCount();
    	return view('brandslist',compact('brands','applications'));	
    }

    public function showProductsByBrand($brandname)
    {
    	$categorymaster = new category_master;
    		$applicationsmaster= new applications_master;

    		
    		$productmaster = new products_master;
    		$productlistings = $productmaster->getProductsByBrandName($brandname);

    		$prod_id_array=array();
    		foreach($productlistings  as $productlisting)
    		{
    			$prod_id_array[]=$productlisting->prod_id;
    		}
    		
    		$applicationsblock=$applicationsmaster->getAllApplicationsByProdIDArray($prod_id_array);

    		return view('productlisting',compact('productlistings','applicationsblock'));
    }
    
    public function showProductsByApplication($application_slug)
    {
    	$categorymaster = new category_master;
    		$applicationsmaster= new applications_master;

    	$productmaster = new products_master;
    		$productlistings = $productmaster->getProductsByAppSlug($application_slug);

    	$prod_id_array=array();
    		foreach($productlistings  as $productlisting)
    		{
    			$prod_id_array[]=$productlisting->prod_id;
    		}
			    		
    		$applicationsblock=$applicationsmaster->getAllApplicationsByProdIDArray($prod_id_array);

    		return view('productlisting',compact('productlistings'));
    			
    }

    public function showProductsByCategory($category_slug)
    {
    		$categorymaster = new category_master;
    		$applicationsmaster= new applications_master;

    		
    		$productmaster = new products_master;
    		$productlistings = $productmaster->getProductsByCatSlug($category_slug);

    		$prod_id_array=array();
    		foreach($productlistings  as $productlisting)
    		{
    			$prod_id_array[]=$productlisting->prod_id;
    		}
			    		


    		$categoriesblock=$categorymaster->getAllCategoriesByCatSlug($category_slug);
    		$applicationsblock=$applicationsmaster->getAllApplicationsByProdIDArray($prod_id_array);

    		return view('productlisting',compact('productlistings','categoriesblock','applicationsblock'));
    }//enf of funtion	
    
}
