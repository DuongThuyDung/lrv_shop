<?php

namespace App\Modules\Catalog\News\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $table= "new";

     public function group_new()
    {
    	return $this->belongsTo('App\Modules\Catalog\GroupNew\Models\GroupNew','idgroupnew','id');
    }
}
