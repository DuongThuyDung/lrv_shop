<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> BACHKHOA APTECH</title>
  <link rel="stylesheet" href="{{url('/')}}/public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('/')}}/publi/backendc/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/backend/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/backend/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/backend/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/backend/bower_components/jvectormap/jquery-jvectormap.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
   <div class="wrapper">
      <header class="main-header">
         <a href="{{ route('Dashboard') }}" class="logo">
            <span class="logo-mini"><b>BKS</b></span>
            <span class="logo-lg"><b>Bach Khoa</b>Aptech</span>
         </a>
         <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
           </a>
           <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{url('/')}}/public/backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs">@if (Auth::check()) {{Auth::user()->email}} @endif</span>
                 </a>
                 <ul class="dropdown-menu">
                  <li class="user-header">
                     <img src="{{url('/')}}/public/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                     <p> @if (Auth::check()) {{Auth::user()->email}} @endif </p>
                  </li>
                  <li class="user-footer">
                     <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                     </div>
                     <div class="pull-right">
                        <a href="{{ route('admin-logout') }}" class="btn btn-default btn-flat">Sign out</a>
                     </div>
                  </li>
               </ul>
            </li>
            <li>
               <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
         </ul>
      </div>
   </nav>
</header>
<aside class="main-sidebar">
 <section class="sidebar">
   <div class="user-panel">
     <div class="pull-left image">
       <img src="{{url('/')}}/public/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    
 </div>
 <!-- catalog-menu -->
 <?php 
 $menus = [];
 $modules = scandir('C:\xampp\htdocs\lrv_nb\app\Modules');
 foreach($modules as $md){
    $dir = 'C:\\xampp\\htdocs\\lrv_nb\\app\\Modules\\'.$md;
    if(is_dir($dir) && !in_array($md,['.','..'])){
      $modules_sub = scandir($dir);
      foreach($modules_sub as $md_sub){
       $dir_sub = 'C:\\xampp\\htdocs\\lrv_nb\\app\\Modules\\'.$md.'\\'.$md_sub;
       if(is_dir($dir_sub) && !in_array($md_sub,['.','..'])){
          $config_file = $dir_sub.'\config.php';
          if(file_exists($config_file)){
            $menu = require $config_file;
            $menus = array_merge($menus,$menu['menu']);
         }
      }
   }
}
}

?>
<!-- /.menu-menu -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
 @foreach($menus as $menu)
 <?php 
 $treeviewClass = isset($menu['childrens']) ? 'treeview' : '';
 ?>
 <li class="active {{$treeviewClass}}">
   <a href="{{ route($menu['name']) }}">
     <i class="fa {{$menu['icon']}}"></i> <span>{{$menu['label']}}</span>
  </a>

  @if( isset( $menu['childrens'] ) )
  <ul class="treeview-menu">
    @foreach($menu['childrens'] as $child)
    <li><a href="{{ route($child['name']) }}"><i class="fa {{$child['icon']}}"></i>  {{$child['label']}}</a></li>
    @endforeach
 </ul>
 @endif
</li>
@endforeach
</ul>
</section>
</aside>
         <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="content-wrapper" >
               <section class="content-header">
                  <div class="container-fluid">
                     <div class="pull-right">
                        <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
                        <a href="{{ route('News') }}" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
                     </div>
                     <h1>Trang Sửa Tin Tức</h1>
                     <ul class="breadcrumb">
                        <li><a href="{{ route('Dashboard') }}">Trang chủ</a></li>
                        <li><a href="{{ route('News') }}">Tin tức</a></li>
                     </ul>
                  </div>
               </section>
               <section class="content">
                  <div class="container-fluid">
                     <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title"></i>Sửa tin tức</h3></div>
                        <div class="panel-body">
                           <form action="" method="post" enctype="multipart/form-data">
                              <section class="content">
                                 <div class="col-lg-7" style="padding-bottom:120px">
                                    @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                       @foreach($errors->all() as $err)
                                       {{$err}}<br>
                                       @endforeach                           
                                    </div>
                                    @endif
                                    @if(session('thongbao'))
                                    <div class="alert alert-success">{{session('thongbao')}}</div>
                                    @endif
                                    <form action="" method="POST" enctype="multipart/form-data">
                                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                       <div class="form-group">
                                          <label>Loại Tin</label>
                                          <select class="form-control" name="grounew" id="groupnew">
                                             @foreach($groupnew as $lt)
                                             <option value="{{$lt->id}}">{{$lt->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <label>Tiêu Đề</label>
                                          <input  name="title" value="{{$new->title}}" required="required" class="form-control" placeholder="Nhập Tiêu Đề" />
                                       </div>                        
                                       <div class="form-group">
                                          <label>Tóm Tắt</label>
                                          <textarea name="summary" id="demo"  value="{{$new->summary}}" class="form-control"  rows="3"></textarea>
                                       </div>
                                       <div class="form-group">
                                          <label>Nội Dung</label>
                                          <textarea name="content" id="demo" value="{{$new->content}}" class="form-control ckeditor" rows="4"></textarea>
                                       </div>
                                       <div class="form-group">
                                          <label>Hình Ảnh</label>
                                          <p><img width = "400px" src="upload/new/{{$new->image}}"><p>
                                          <input type="file" name="image"  class="form-control"/>                              
                                       </div>
                                       <div class="form-group">
                                          <label>Nổi Bật</label>
                                          <label class="radio-inline">
                                             <input name="hotnew" value="0"
                                              @if($new->hot_new == 0)
                                                  {{"checked"}}
                                              @endif
                                                type="radio">Không
                                          </label>
                                          <label class="radio-inline">
                                             <input name="hotnew" value="1" 
                                                @if($new->hotnew == 0)
                                                   {{"checked"}}
                                                @endif
                                             type="radio">Có
                                          </label>
                                       </div>
                                       <div>
                                          <button type="submit" class="btn btn-default">Cập nhật</button>
                                          <button type="reset" class="btn btn-default">Làm Mới</button>
                                       </div>
                                    </form>
                                 </div>
                              </section>
                           </form>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
      </form>
      <script>
        $(function () {
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace('content')
          //bootstrap WYSIHTML5 - text editor
          $('.textarea').wysihtml5()
        })
        $('#date_available').datepicker({
            autoclose: true
          })

           // Manufacturer
  

          
          
       
</script>
  <script src="{{url('/')}}/public/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script src="{{url('/')}}/public/backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{url('/')}}/public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{url('/')}}/public/backend/bower_components/fastclick/lib/fastclick.js"></script>
<script src="{{url('/')}}/public/backend/dist/js/adminlte.min.js"></script>
<script src="{{url('/')}}/public/backend/dist/js/pages/dashboard.js"></script>
<script src="{{url('/')}}/public/backend/dist/js/demo.js"></script>
</body>
</html>