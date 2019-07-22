<?php
namespace App\Modules\Catalog\Regulations\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
use App\Modules\Catalog\Category\Models\Category;
use App\Modules\Catalog\Regulations\Models\Regulations;

class RegulationsController extends Controller
{
    public function ListRegulations()
    {
        $data['category'] = Category::all();
        $data['regulations'] = Regulations::all();
        return view('Regulations::list',$data);
    }
    public function GetAddRegulations(){
        $category = Category::all();
        return view('Regulations::add',['category'=>$category]);
    }
    public function PostAddRegulations(Request $req){
        $this->validate($req,[
            'name' => 'required|min:2|max:100|unique:regulations,name',
            'category' => 'required'
        ],[
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.min' => 'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
            'name.max' => 'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'category.required' => 'Bạn chưa chọn thể loại'
        ]);
        $regulations = new GroupNew;
        $regulations->name= $req->name;
        $regulations->content= $req->content;
        $regulations->slug = changeTitle($req->name);
        $regulations->idcategory = strip_tags($req->content);
        $regulations->save();
        return redirect('admin/regulations')->with('thongbao','Thêm thành công');        
    }
    public function GetEditRegulations($id)
    {
        $data['category'] = Category::all();
        $data['regulations'] = Regulations::find($id);

        return view('Regulations::edit',$data);
    }
    public function PostEditRegulations($id, Request $req){
        
        $regulations = GroupNew::find($id);
        $regulations->name= $req->name;
        $regulations->content= $req->content;
        $regulations->slug = changeTitle($req->name);
        $regulations->idcategory = $req->category;
        $regu->save();
        return redirect('admin/regulations')->with('thongbao','Đã sửa nội quy : <strong>'.$req->title.' </strong> thành công!');
    }
    public function DeleteRegulations($id){
        Regulations::destroy($id);
        return redirect('admin/regulations')->with('thongbao','Đã xóa thành công');
    }
}
