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
                     <div class="pull-right"><a href="{{ route('AddNews') }}" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="delete_($ids)"><i class="fa fa-trash-o"></i></button>
                </div>
                     <h1>Trang Tin Tức</h1>
                     <ul class="breadcrumb">
                        <li><a href="{{ route('Dashboard') }}">Trang chủ</a></li>
                        <li><a href="{{ route('News') }}">Tin tức</a></li>
                     </ul>
                  </div>
               </section>
               <section class="content">
                  <div class="container-fluid">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-list"></i> Danh sách tin tức</h3>
                     </div>
                     <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="table-responsive">
                           <table class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <td>STT</td>
                                    <td class="text-left"><a href="">Tiêu đề</a></td>
                                    <td class="text-left"><a href="">Tóm tắt nội dung</a></td>
                                    <td class="text-left"><a href="">Thể loại</a></td>
                                    <td class="text-left"><a href="">Số lượt xem</a></td>
                                    <td class="text-left"><a href="">Nổi bật</a></td>
                                    <td class="text-right" style="width:70px;">Sửa</td>
                                    <td class="text-right" style="width:70px;">Xóa</td>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($new as $tt)
                                 <tr class="odd gradeX" align="center">
                                    <td>{{$tt->id}}</td>
                                    <td>
                                       <p>{{$tt->title}}</p><img width="100px" src="{{url('/')}}/upload/new/{{$tt->image}}">
                                    </td>
                                    <td>{{$tt->summary}}</td>
                                    <td>{{$tt->group_new->name}}</td>
                                    <td>{{$tt->number_view}}</td>
                                    <td>
                                       @if($tt->hot_new ==0)
                                       {{'Không'}}
                                       @else
                                       {{'Có'}}
                                       @endif
                                    </td>
                                    <td  class="text-right">
                                       <a href="{{ route('EditNews',['id'=>$tt->id]) }}" class="btn btn-success btn-xs" ><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td  class="text-right">
                                       <a href="{{ route('DeleteNews',['id'=>$tt->id]) }}" class="btn btn-default btn-xs" onclick="return confirm('Bạn có chắc không?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </form>
                     <div class="row">
                        <div class="col-sm-6 text-left"></div>
                           {{csrf_field()}}
                        </div>
                  </div>
               </div>  
            </section>
         </div>
      </form>
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