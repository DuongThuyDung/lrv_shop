<?php
namespace App\Modules\Catalog\User\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
use App\Modules\Catalog\User\Models\User;

class UserController extends Controller
{
    public function ListUser()
    {
        
        $data['user'] = User::all();
        return view('User::list',$data);
    }
    public function GetAddUser(){
        $user = Users::orderBy('name','ASC')->get();
        return view('User::add',['users' => $user]);
    }
    public function PostAddUser(Request $req){
      
        $this->validate($req,[
            'name'=>'required|min:3',
            'email'=>'required|min:3|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordagain'=>'required|same:password'
            ],[
            'name.required'=>'Bạn Chưa Nhập Tên Người Dùng',
            'name.min'=>'Tên Người Dùng Phải Có Ít Nhất 3 Ký Tự',
            'email.unique'=>'Email Đã Tồn Tại',
            'email.required'=>'Bạn Chưa Nhập Email',
            'email.email'=>'Bạn Chưa Nhập Đúng Định Dạng Email',
            'password.required'=>'Bạn Chưa Nhập Mật Khẩu',
            'password.min'=>'Tên Người Dùng Phải Có Ít Nhất 3 Ký Tự',
            'password.max'=>'Tên Người Dùng Phải Có Ít Nhất 3 Ký Tự',
            'passwordagain.required'=>'Bạn Chưa Nhập Lại Mật Khẩu',
            'passwordagain.same'=>'Mật Khẩu Nhập Chưa Khớp'
            ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password =bcrypt($req->password);
        $user->level = $req->level;
        $user->save();
        return redirect('admin/User')->with('thongbao','Thêm thành công');        
    }
    public function GetEditUser(Request $req,$id)
    
    {
        $data['users'] = User::find($id);
        return view('User::edit',$data);
    }
    public function PostEditUser(Request $req,$id){
         $this->validate($req,[
            'name'=>'required|min:3',
            ],[
            'name.required'=>'Bạn Chưa Nhập Tên Người Dùng',
            'name.min'=>'Tên Người Dùng Phải Có Ít Nhất 3 Ký Tự'          
            ]);
        $user = User::find($id);
        $user->name = $req->name;
        $user->level = $req->level;
        if($req->changePassword == "on")
        {
            $this->validate($req,[
            'old_password' => 'required|OldPassword',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password'
        ],[
            'old_password' => 'Mật khẩu cũ nhập không đúng',
            'old_password.required' => 'Bạn phải nhập mật khẩu cũ',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có từ 3 đến 32 ký tự',
            'password.max' => 'Mật khẩu phải có từ 3 đến 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại không trùng khớp'
        ]);
           $user->password = bcrypt($req->password); 
        }
        $user->save();
        return redirect('admin/user')->with('thongbao','Đã sửa tài khoản : <strong>'.$req->email.' </strong> thành công!');
    }
    public function DeleteUser($id){
        User::destroy($id);
        return redirect('admin/user')->with('thongbao','Đã xóa thành công');
    }
}
