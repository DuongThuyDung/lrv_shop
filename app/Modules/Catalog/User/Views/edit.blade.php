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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="pull-right">
            <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
            <a href="{{ route('User') }}" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
          </div>
          <h1>Sửa tài khoản</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('Dashboard') }}">Trang chủ</a></li>
            <li><a href="{{ route('User') }}">Danh Sách Người Dùng</a></li>
          </ul>
        </div>
      </section>
      <section class="content">        
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản
                            <small>{{$users->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session('thongbao')}}<br>
                        </div>
                        @endif
                        @if(session('loi'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session('loi')}}<br>
                        </div>
                        @endif
                        <form action="{{$users->id}}" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                          <label>Họ Tên</label>
                          <input class="form-control" name="name" placeholder="Nhập Tên Người Dùng" value="{{$users->name}}" />
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" name="email" placeholder="Nhập Địa Chỉ Email" value="{{$users->email}}" readonly="" />
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="changePassword" id="changePassword">
                          <label>Đổi mật khẩu</label>
                        </div>
                        <div class="form-group">
                          <label>Nhập mật khẩu cũ</label>
                          <input class="form-control password"  name="old_password" placeholder="Nhập mật khẩu cũ" type="password" >
                        </div>
                        <div class="form-group">
                          <label>Nhập mật khẩu mới</label>
                          <input class="form-control password" name="password" placeholder="Nhập mật khẩu mới" type="password" >
                        </div>
                        <div class="form-group">
                          <label>Nhập lại mật khẩu</label>
                          <input class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" type="password" >
                        </div>
                        <div class="form-group">
                          <label>Quyền Người Dùng</label>
                          <label class="radio-inline">
                          <input name="level" value="0" 
                              @if($users->level == 0)
                              {{"checked"}}
                              @endif   
                              type="radio">Thường
                          </label>
                          <label class="radio-inline">
                          <input name="level" value="1" 
                              @if($users->level == 1)
                              {{"checked"}}
                              @endif 
                              type="radio">Admin
                          </label>
                        </div>
                            <button type="submit" class="btn btn-default">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                          {{csrf_field()}}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


<script>
    $(document).ready(function(){
        $("#changePassword").change(function(){
            if ($(this).is(":checked")) 
            {
                $(".password").removeAttr('disabled');
            }
            else
            {
                $(".password").attr('disabled','');
            }
        });
    });
    
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