<?php

namespace App\Modules\Catalog\Regulations\Models;

use Illuminate\Database\Eloquent\Model;

class Regulations extends Model
{
    protected $table= "regulations";
    public function category()
    {
    	return $this->belongsTo('App\Modules\Catalog\Category\Models\Category','idcategory','id');
    }
}
