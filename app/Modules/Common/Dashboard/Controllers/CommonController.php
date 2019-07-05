<?php
namespace App\Modules\Common\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Common\Dashboard\Request\LoginRequest;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware;
use App\models\users;
class CommonController extends Controller
{
    public function GetLogin(){
        return view('Dashboard::login');
    }
    public function PostLogin(LoginRequest $request){
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password]))
          { 
            // return "Đăng nhập thành công";
            Session::put('email', $request->email);
            // dd(session('email'));
            return redirect('admin');
          }
          else
          {
              return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không tồn tại')->withInput();         
          }
    }
    public function Dashboard(){
        $email= Session::get('email');
        $data['users']= users::where('email',$email)->first();
        // dd($data['users']);
        // return "ok";
        return view('Dashboard::dashboard',$data);
    }
    public function GetRegister(){
        return view('Dashboard::register');
    }
    public function PostRegister(){
      return "Post Register Page";
    }
    public function GetLogout(){
        Auth::logout();
        return redirect('admin/login');
      }
}
