<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applications_master extends Model
{
     protected $fillable =['prod_id','name'];

     public function getDistinctApplicationNames()
    {
    	 return $this->select('name')->distinct()->get();
    }

    public function getApplicationsbyNameCount()
    {
         $array = $this->select("name","slug")->selectraw("count('name') as total")->groupBy("slug")->groupBy("name")->orderBy("total","desc")->get();
         return $array->toArray();
    }


    public function getProdIdbyAppSlug($app_slug)
    {
        return $this->select('prod_id')->where('slug',$app_slug)->get()->toArray();
    }
    

    public function getAllApplicationsByProdIDArray($prodids)
    {
    	
    	$array= ($this->wherein('prod_id',$prodids)->pluck("name")->toarray());

    	 return array_count_values($array);

    }

}
