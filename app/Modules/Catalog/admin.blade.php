<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BKSOFT SHOP| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="{{url('/')}}/public/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('/')}}/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/')}}/public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('/')}}/public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/')}}/public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('/')}}/public/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('/')}}/public/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('/')}}/public/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('/')}}/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('/')}}/public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('/')}}/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('Dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BKAP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BK</b> APTECH</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('/')}}/public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">@if (Auth::check()) {{Auth::user()->email}} @endif</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('/')}}/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  @if (Auth::check()) {{Auth::user()->email}} @endif
                  <small>Bách Khoa Aptech</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
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
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/')}}/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Xin chào,{{$users->first_name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
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
                <li><a href="{{ route($child['name']) }}"><i class="fa {{$child['icon']}}"></i>{{$child['label']}}</a></li>
                @endforeach
            </ul>
            @endif
          </li>
        @endforeach
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}/public/pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="{{url('/')}}/public/pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="{{url('/')}}/public/pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="{{url('/')}}/public/pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <div class="text-head">Liên hệ</div>
        <ul>
          <li>
              <span>Tòa nhà HTC, 236B &amp; 238 Hoàng Quốc Việt, Từ Liêm, Hà Nội.</span>
          </li>
          <li>
              <span>Hotline:<br/> 0968.27.9669 <br/>024 3755 4010</span>
          </li>
        </ul>
      </div>
    </div>

     <a href="{{url('/')}}/public/https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('/')}}/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('/')}}/public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/')}}/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{url('/')}}/public/bower_components/raphael/raphael.min.js"></script>
<script src="{{url('/')}}/public/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{url('/')}}/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{url('/')}}/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{url('/')}}/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('/')}}/public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{url('/')}}/public/bower_components/moment/min/moment.min.js"></script>
<script src="{{url('/')}}/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{url('/')}}/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('/')}}/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{url('/')}}/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('/')}}/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/')}}/public/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/')}}/public/dist/js/demo.js"></script>
</body>
</html>
