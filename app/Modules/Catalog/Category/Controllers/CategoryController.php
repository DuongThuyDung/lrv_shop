<?php
namespace App\Modules\Catalog\Category\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
use App\Modules\Catalog\Category\Models\Category;

class CategoryController extends Controller
{   // Thể loại
    public function ListCategory()
    {
        $data['category'] = Category::all();
        return view('Category::list_category',$data);
    }
    public function GetAddCategory(){
        $category = Category::orderBy('name','ASC')->get()->toArray();
        return view('Category::add_category',['Category' => $category]);
    }
          
    public function PostAddCategory(Request $req){
        $this->validate($req,[
            'name' => 'required|min:2|max:100|unique:Category,name'
        ],[
            'required' => ':attribute Bạn chưa nhập tên danh mục',
            'min' => ':attribute phải có độ dài từ 2 đến 100 ký tự',
            'name.max' => 'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
            'name.unique' => 'Tên danh mục đã tồn tại'
        ]);

        $category = new Category;
        $category->name = $req->name;
        $category->slug = changeTitle($req->name);
        $category->save();
        return redirect('admin/Category')->with('Thông báo','Thêm thành công');        
    }
    public function GetEditCategory($id)
    {
        $data['category'] = Category::find($id);
        return view('Category::edit_category',$data);
    }
    public function PostEditCategory($id, Request $req){
        $category = Category::find($id);
        $category->name= $req->name;
        $category->slug = changeTitle($req->name);
        $category->save();
        return redirect('admin/Category')->with('thongbao','Đã sửa : '.$req->name.'  thành công!');
    }
    public function DeleteCategory($id){
        Category::destroy($id);
        return redirect('admin/Category')->with('thongbao','Đã xóa thành công');
    }
}
