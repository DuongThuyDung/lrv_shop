<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\news;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;

class HomeController extends Controller
{
    public function GetHome(){
        $data['new'] = news::orderBy('created_at','desc')->take(8)->get();
        return view('Frontend.home',$data);
    }

    public function __construct()
	{
		$new = news::all();
		view()->share('new',$new);
	}

	function Home()
	{
		return view('Frontend.home');
	}

	function About()
	{
		return view('Frontend.home');
	}

	function group_new($id)
	{
		$group_new = group_new::find($id);
		$new = news::where('group_new_id',$id)->paginate(5);
		return view('Frontend.Group_new',['group_new'=>$group_new,'new'=>$new]);
	}
	function New()
	{
		return view('Frontend.home');
	}
	function Regulation()
	{
		return view('Frontend.home');
	}
}
