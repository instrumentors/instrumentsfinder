<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_master extends Model
{
    protected $fillable =['prod_id','name'];


    public function getDistinctCategoryNames()
    {
    	 return $this->select('name','slug')->distinct()->get();
    }

    public function getCategorybyNameCount()
    {
         $array = $this->select("name","slug")->selectraw("count('name') as total")->groupBy("slug")->groupBy("name")->orderBy("name")->get();
         return $array->toArray();
    }

    public function getProdIdbyCat($cat)
    {
    	return $this->select('prod_id')->where('name',$cat)->get()->toArray();
    }

    

    public function getAllCategoriesByCatName($cat)
    {
    	$prodids = $this->getProdIdbyCat($cat);
    	
    	$array= ($this->wherein('prod_id',$prodids)->pluck("name")->toarray());

    	 return array_count_values($array);

    }

    public function getAllCategoriesByCatSlug($cat_slug)
    {
        $prodids = $this->getProdIdbyCatSlug($cat_slug);

        
        $array = $this->select("name","slug")->selectraw("count('name') as total")->wherein('prod_id',$prodids)->groupBy("slug")->groupBy("name")->get();

        //print_r($array->toArray());
         return $array->toArray();

    }   

    public function getProdIdbyCatSlug($cat_slug)
    {
        return $this->select('prod_id')->where('slug',$cat_slug)->get()->toArray();
    }

    public function getCategoryByProuctID($catid)
    {
        return $this->where("cat_id",$catid)->first();
    }

}
