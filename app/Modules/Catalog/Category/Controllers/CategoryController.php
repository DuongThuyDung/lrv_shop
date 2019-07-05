<?php
namespace App\Modules\Catalog\Category\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
class CategoryController extends Controller
{
    public function ListCategory(){
        return view('Category::cate');
    }
    public function GetAddCategory(){
        return view('Category::add_category');
    }
    public function PostAddCategory(Request $request){
        
    }
    public function GetEditCategory($id){
        return view('Category::add_category');
    }
    public function PostEditCategory($id, Request $request){
       
    }
    public function DeleteCategory($id){
        category::destroy($id);
        return redirect('admin/category')->with('thongbao','Đã xóa thành công');
    }
}
