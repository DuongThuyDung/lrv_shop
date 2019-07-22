<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\new;

class RegulationController extends Controller
{
    public function GetRegulation(){
        $data['new'] = news::orderBy('created_at','desc')->take(8)->get();
        return view('Frontend.Regulation',$data);
    }
    
}
