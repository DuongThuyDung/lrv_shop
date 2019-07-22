<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\news;

class AboutController extends Controller
{
    public function GetAbout(){
        $data['new'] = news::orderBy('created_at','desc')->take(8)->get();
        return view('Frontend.About',$data);
    }
    
}
