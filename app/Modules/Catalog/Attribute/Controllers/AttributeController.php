<?php
namespace App\Modules\Catalog\Attribute\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
class AttributeController extends Controller
{
    public function ListAttribute(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        return view('Attribute::attr', $data);
    }
    public function GetAddAttribute(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        return view('Attribute::add_attr', $data);
    }
    public function PostAddAttribute(Request $request){
        
    }
    public function GetEditAttribute($id){
        return view('Attribute::add_attr');
    }
    public function PostEditAttribute($id, Request $request){
       
    }
    public function DeleteAttribute($id){
        Attribute::destroy($id);
        return redirect('admin/attr')->with('thongbao','Đã xóa thành công');
    }
}
