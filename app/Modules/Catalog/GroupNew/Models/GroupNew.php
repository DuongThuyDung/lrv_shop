<?php

namespace App\Modules\Catalog\GroupNew\Models;

use Illuminate\Database\Eloquent\Model;

class GroupNew extends Model
{
    protected $table= "groupnew";

 	public function category()
    {
    	return $this->belongsTo('App\Modules\Catalog\Category\Models\Category','idcategory','id');
    }
    public function new()
    {
    	return $this->hasMany('New::class','idgroupnew','id');
    	//return $this->hasMany('GroupNew::class','group_new_id','id');
    }
}

?>

