<?php
namespace App\Modules\Catalog\GroupNew\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
use App\Modules\Catalog\Category\Models\Category;
use App\Modules\Catalog\GroupNew\Models\GroupNew;

class GroupNewController extends Controller
{   //Loai tin
    public function ListGroupNew()
    {
        $category['category'] = Category::all();
        $data['groupnew'] = GroupNew::all();
        return view('GroupNew::list_group',$data);
    }
    public function GetAddGroupNew(){
        $category = Category::all();
        return view('GroupNew::add_group',['category'=>$category]);
    }
    public function PostAddGroupNew(Request $req){
        $this->validate($req,[
            'name' => 'required|min:2|max:100|unique:groupnew,name',
            'category' => 'required'
        ],[
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.min' => 'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
            'name.max' => 'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'category.required' => 'Bạn chưa chọn thể loại'
        ]);
        $group_new = new GroupNew;
        $group_new->name= $req->name;
        $group_new->slug = changeTitle($req->name);
        $group_new->idcategory = $req->category;
        //$group_new->parent_id = $req->parent;
        $group_new->save();
        return redirect('admin/group-new')->with('thongbao','Thêm thành công');       
    }
    public function GetEditGroupNew($id){
        $data['category'] = Category::all();
        $data['groupnew'] = GroupNew::find($id);
    return view('GroupNew::edit_group',$data);
    }
    public function PostEditGroupNew($id, Request $req){
    
        $group_new = GroupNew::find($id);
        $group_new->name= $req->name;
        $group_new->slug = changeTitle($req->name);
        $group_new->idcategory = $req->category;

        $group_new->save();
        return redirect('admin/group-new')->with('thongbao','Đã sửa : '.$req->name.' thành công!');

    }
    public function DeleteGroupNew($id){
        GroupNew::destroy($id);
        return redirect('admin/group-new')->with('thongbao','Đã xóa thành công');
    }
}
