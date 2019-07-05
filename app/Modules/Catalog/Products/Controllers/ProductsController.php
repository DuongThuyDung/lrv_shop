<?php
namespace App\Modules\Catalog\Products\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
class ProductsController extends Controller
{
    public function ListProducts(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        return view('Products::product',$data);
    }
    public function GetAddProduct(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        return view('Products::add_product',$data);
    }
    public function PostAddProduct(Request $request){
        
    }
    public function GetEditProduct( $id ){
        return view('Products::product');
    }
    public function PostEditProduct( $id, Request $request ){
        
    }
    public function DeleteProduct( $id ){
        products::destroy($id);
        return redirect('admin/products')->with('thongbao','Đã xóa thành công');
    }
}
