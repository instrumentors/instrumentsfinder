<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category_master;
use App\applications_master;

class products_master extends Model
{
	protected $table = 'products_master';
    //
    protected $fillable=[
	'productname',
	'brand',
	'prod_id',
	'source_prod_id',
	'seo_title',
	'seo_desc',
	'cat1',
	'cat2',
	'cat3',
	'cat4',
	'cat5',
	'listprice',
	'startingprice',
	'img',
	'short_desc',
	'long_desc',
	'features',
	'stock',
	'prod_url',
	'options_count',
	'showcodes'.
	'is_code_fixed'.
	'codevalue'
	];

	public function getBrandsbyNameCount()
	{
		$array = $this->select("brand")->selectraw("count('name') as total")->groupBy("brand")->orderBy("brand")->get();
         return $array->toArray();
	}

	public function getSearchResults($query)
	{
		return $this->where('productname','LIKE','%'.$query.'%')->get();
	}

	public function getProductsByCat($cat)
	{
		$catmaster = new category_master;
		$pids=$catmaster->getProdIdbyCat($cat);

		return $this->wherein('prod_id',$pids)->get();
	}


	public function getProductsByCatSlug($cat_slug)
	{
		$catmaster = new category_master;
		$pids=$catmaster->getProdIdbyCatSlug($cat_slug);

		return $this->wherein('prod_id',$pids)->get();
	}

	public function getProductsByBrandName($brandname)
	{
		return $this->where("brand",$brandname)->get();
	}

	public function getProductsByAppSlug($app_slug)
	{
		$appmaster = new applications_master;
		$pids=$appmaster->getProdIdbyAppSlug($app_slug);

		return $this->wherein('prod_id',$pids)->get();
	}

	public function getProductByID($prodID)
	{
		return $this->where('prod_id',$prodID)->first();
	}

}
