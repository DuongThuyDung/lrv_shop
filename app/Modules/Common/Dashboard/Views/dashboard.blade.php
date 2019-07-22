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
        <div class="pull-left info">
          <p>Xin chào, {{$users->first_name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
  <div class="content-wrapper">
</div>
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
