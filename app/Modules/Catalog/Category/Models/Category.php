<?php

namespace App\Modules\Catalog\Category\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= "category";

   	public function group_new()
    {
    	return $this->hasMany('GroupNew::class','idcategory','id');
    	//return $this->hasMany('GroupNew::class','group_new_id','id');
    }

    public function regulations()
    {
        return $this->hasMany('Regulations::class','idcategory','id');
        //return $this->hasMany('GroupNew::class','group_new_id','id');
    }

    public function new()
    {
    	return $this->hasManyThrough('App\Modules\Catalog\New','App\Modules\Catalog\GroupNew','idcategory','groupnew','id');
    }
}
?>
