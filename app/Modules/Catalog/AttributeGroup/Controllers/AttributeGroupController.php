<?php
namespace App\Modules\Catalog\AttributeGroup\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
class AttributeGroupController extends Controller
{
    public function ListAttributeGroup(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        return view('AttributeGroup::attr_group',$data);
    }
    public function GetAddAttributeGroup(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        return view('AttributeGroup::add_attr_group',$data);
    }
    public function PostAddAttributeGroup(Request $request){
        
    }
    public function GetEditAttributeGroup($id){
        return view('AttributeGroup::add_attr_group');
    }
    public function PostEditAttributeGroup($id, Request $request){
       
    }
    public function DeleteAttributeGroup($id){
        AttributeGroup::destroy($id);
        return redirect('admin/attr-group')->with('thongbao','Đã xóa thành công');
    }
}
