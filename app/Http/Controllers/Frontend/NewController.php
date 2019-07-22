<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\news;

class NewController extends Controller
{
    public function GetNew(){
        $data['new'] = news::orderBy('created_at','desc')->take(8)->get();
        return view('Frontend.New',$data);
    }
    
}
