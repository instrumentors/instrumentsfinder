<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\products_master;

use App\lead_options;

class lead_products extends Model
{
    protected $fillable=['order_id','product_id','source_product_id','quantity'];

    public function getOptionsByProduct($orderid)
    {
    	$prodmaster = new products_master;
    	$leadoptions= new lead_options;

    	$arr= $this->where("order_id",$orderid)->get()->toArray();

    	$prod_arr=array();
    	foreach($arr as $prod)
    	{
    		$prodmasterdata=$prodmaster->getProductByID($prod["product_id"]);


    		$options=$leadoptions->getOptionsByOrderAndProduct($prod["order_id"],$prod["product_id"]);

    		echo("<pre>");
    		//print_r($prodmasterdata);
    		echo("</pre>");
    		$prod_final_data=array(
    			"order_id"=>$prod["order_id"],
    			"product_id"=>$prod["product_id"],
    			"name"=>$prodmasterdata["name"],
    			"brand"=>$prodmasterdata["brand"],
    			"url"=>$prodmasterdata["url"],
    			"img"=>$prodmasterdata["img"],
    			"options_count"=>$prodmasterdata["options_count"],
    			"showcode"=>$prodmasterdata["showcode"],
    			"is_code_fixed"=>$prodmasterdata["is_code_fixed"],
    			"codevalue"=>$prodmasterdata["codevalue"],
    			"quantity"=>$prod["quantity"],
    			"options"=>$options
    		);



    		array_push($prod_arr, $prod_final_data);
    	}

    	return $prod_arr;
    }
}
