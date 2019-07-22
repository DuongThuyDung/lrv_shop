<?php
namespace App\Modules\Catalog\News\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use DB;
use Session;
use App\models\users;
use App\Modules\Catalog\News\Models\News;
use App\Modules\Catalog\GroupNew\Models\GroupNew;
use App\Modules\Catalog\Category\Models\Category;

class NewsController extends Controller
{
    public function ListNews()
    {
        
        //$data['groupnew'] = GroupNew::all();
        $data['new'] = News::all();
        return view('News::list_new',$data);
    }
    public function GetAddNews(){
        $data['groupnew'] = GroupNew::all();
        $data['category'] = Category::all();
        return view('News::add_new',$data);
    }
    public function PostAddNews(Request $request){
    $this->validate($request,[
            'groupnew'=>'required',
            'title'=>'required|min:3|unique:new,title',
            'summary'=>'required',
            'content'=>'required'
            ],[
            'groupnew.required'=>'Bạn Chưa Chọn Loại Tin',
            'title.required'=>'Bạn Chưa Nhập Tiêu Đề',
            'title.min'=>'Tiêu Đề Phải Có Ít Nhất 3 Ký Tự',
            'title.unique'=>'Tiêu Đề Đã Tồn Tại',
            'summary.required'=>'Bạn Chưa Nhập Tóm Tắt',
            'content.required'=>'Bạn Chưa Nhập Nội Dung'
            ]);
         
        $new = new News;
        $new->title = $request->title;
        $new->slug = changeTitle($request->title);
        $new->idgroupnew = $request->groupnew;
        $new->summary = $request->summary;
        $new->content = $request->content;
        $new->numberview = 0;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');          
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg')
            {
                  return redirect('admin/new/them')->with('loi','Bạn Chỉ Được Chọn File Có Đuôi jpg,png,jpeg');
            }
            
            $name = $file->getClientOriginalName();
            $image =  str_random(4)."_". $name;
            //echo $image;
            
            while (file_exists("upload/new/".$image)) 
            {
                $image = str_random(4)."_". $name;
            }
            $file->move("upload/new",$image);
            $new->image = $image;
            
        }
        else
        {
            $new->image = "";
        }
        
        $new->save();
        return redirect('admin/new')->with('thongbao','Bạn Đã Thêm Tin Tức Thành Công');     
    }  
    public function GetEditNews($id)
    {
        $data['groupnew'] = GroupNew::all();
        $data['category'] = Category::all();
        $data['new'] = News::find($id);
        return view('News::edit_new',$data);
    }
    public function PostEditNews($id, Request $request){
        $new = News::find($id);
        //new  = new ,loaitin=groupnew , theloai=category   
        $this->validate($request,[
            'groupnew'=>'required',
            'title'=>'required|min:3|unique:new,title',
            'summary'=>'required',
            'content'=>'required'
            ],[
            'groupnew.required'=>'Bạn Chưa Chọn Loại Tin',
            'title.required'=>'Bạn Chưa Nhập Tiêu Đề',
            'title.min'=>'Tiêu Đề Phải Có Ít Nhất 3 Ký Tự',
            'title.unique'=>'Tiêu Đề Đã Tồn Tại',
            'summary.required'=>'Bạn Chưa Nhập Tóm Tắt',
            'content.required'=>'Bạn Chưa Nhập Nội Dung'
        ]);
            //$new->title = $request->title;
            $new->slug = changeTitle($request->title);
            $new->idgroupnew = $request->groupnew;
            $new->summary = $request->summary;
            $new->content = $request->content;

            if($request->hasFile('image'))
            {
                $file = $request->file('image');          
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg')
                {
                      return redirect('admin/new')->with('loi','Bạn Chỉ Được Chọn File Có Đuôi jpg,png,jpeg');
                }
                $name = $file->getClientOriginalName();
                $image =  str_random(4)."_". $name;
                while (file_exists("upload/new/".$image)) 
                {
                    $image = str_random(4)."_". $name;
                }
                $file->move("upload/new",$image);
                unlink("upload/new/".$new->image);
                $new->image = $image;
                }        
            $new->save();
        return redirect('admin/new')->with('thongbao','Đã sửa :'.$req->name.'thành công!');
    }
    public function DeleteNews($id){
        News::destroy($id);
        return redirect('admin/new')->with('thongbao','Đã xóa thành công');
    }
}
