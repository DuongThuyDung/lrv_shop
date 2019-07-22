<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\GroupNew;

class AjaxController extends Controller
{
	//
	public function GetGroupNew($idcategory)
	{
		$groupnew = GroupNew::where('idCategory',$idcategory)->get();
		foreach($groupnew as $lt)
		{
			echo "<option value='".$lt->id."'>".$lt->name."</option>";
		}
	}

}
?>