<?php
namespace App\Modules\Catalog\Manufacturer\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
class ManufacturerController extends Controller
{
    public function ListManufacturer(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        return view('Manufacturer::manufacturer',$data);
    }
    public function GetAddManufacturer(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        return view('Manufacturer::add_manufacturer',$data);
    }
    public function PostAddManufacturer(Request $request){
        
    }
    public function GetEditManufacturer($id){
        return view('Manufacturer::add_manufacturer');
    }
    public function PostEditManufacturer($id, Request $request){
       
    }
    public function DeleteManufacturer($id){
        Manufacturer::destroy($id);
        return redirect('admin/manufacturer')->with('thongbao','Đã xóa thành công');
    }
}
