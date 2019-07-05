<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BKSOFT SHOP| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="{{url('/')}}/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
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
      <span class="logo-mini"><b>BKS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BKSOFT</b> SHOP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
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
          <p>Xin chào, {{$users->first_name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- catalog-menu -->
      <?php 
        $menus = [];
        $modules = scandir('C:\xampp\htdocs\lrv_shop\app\Modules');
        foreach($modules as $md){
          $dir = 'C:\\xampp\\htdocs\\lrv_shop\\app\\Modules\\'.$md;
          if(is_dir($dir) && !in_array($md,['.','..'])){
            $modules_sub = scandir($dir);
            foreach($modules_sub as $md_sub){
                $dir_sub = 'C:\\xampp\\htdocs\\lrv_shop\\app\\Modules\\'.$md.'\\'.$md_sub;
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
  <form method="post" enctype="multipart/form-data">
    @csrf
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="button" data-toggle="tooltip" title="Filter" onclick="$('#filter-product').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>
                <a href="{{ route('AddProduct') }}" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="delete_product($ids)"><i class="fa fa-trash-o"></i></button>
            </div>
          <h1>Sản phẩm</h1>
          <ul class="breadcrumb">
              <li><a href="{{ route('Dashboard') }}">Home</a></li>
              <li><a href="{{ route('Products') }}">Products</a></li>
          </ul>
        </div>
    </section>
    <!-- Main content -->
<section class="content">
<div class="container-fluid">        
<div class="row">
    <div id="filter-product" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-filter"></i> Lọc</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
            <label class="control-label" for="input-name">Tên sản phẩm</label>
            <input type="text" name="filter_name" value="" placeholder="Product Name" id="input-name" class="form-control" />
            </div>
            <div class="form-group">
            <label class="control-label" for="input-model">Model</label>
            <input type="text" name="filter_model" value="" placeholder="Model" id="input-model" class="form-control" />
            </div>
            <div class="form-group">
            <label class="control-label" for="input-price">Giá</label>
            <input type="text" name="filter_price" value="" placeholder="Price" id="input-price" class="form-control" />
            </div>
            <div class="form-group">
            <label class="control-label" for="input-status">Trạng thái</label>
            <select name="filter_status" id="input-status" class="form-control">
                <option value="">Trạng thái</option> 
                <option value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>
            </div>
            <div class="form-group text-right">
            <button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-9 col-md-pull-3 col-sm-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> Danh sách sản phẩm</h3>
        </div>
        <div class="panel-body">
            <form method="post" enctype="multipart/form-data">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                    <td class="text-center">Ảnh</td>
                    <td class="text-left"> <a href="">Tên sản phẩm</a> </td>
                    <td class="text-left"> <a href="">Model</a> </td>
                    <td class="text-right"> <a href="">Giá</a> </td>
                    <td class="text-right"> <a href="">Số lượng</a> </td>
                    <td class="text-left"> <a href="">Trạng thái</a> </td>
                    <td class="text-right">Sửa</td>
                    <td class="text-right">Xóa</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><input type="checkbox" name="selected[]" value="46" />
                        </td>
                        <td class="text-center"> <img src="http://localhost/upload/image/cache/catalog/demo/sony_vaio_1-40x40.jpg" alt="Sony VAIO" class="img-thumbnail" /> </td>
                        <td class="text-left">Sony VAIO</td>
                        <td class="text-left">Product 19</td>
                        <td class="text-right">$1,000.00
                        </td>
                        <td class="text-right"> <span class="label label-success">1000</span> </td>
                        <td class="text-left">Enabled</td>
                        <td class="text-right"><a href="{{ route('EditProduct',array(2))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                        <td class="text-right"><a href="{{ route('DeleteProduct',array(2))}} " data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" name="selected[]" value="33" />
                        </td>
                        <td class="text-center"> <img src="http://localhost/upload/image/cache/catalog/demo/samsung_syncmaster_941bw-40x40.jpg" alt="Samsung SyncMaster 941BW" class="img-thumbnail" /> </td>
                        <td class="text-left">Samsung SyncMaster 941BW</td>
                        <td class="text-left">Product 6</td>
                        <td class="text-right">$200.00
                        </td>
                        <td class="text-right"> <span class="label label-success">1000</span> </td>
                        <td class="text-left">Enabled</td>
                        <td class="text-right"><a href="{{ route('EditProduct',array(3))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                        <td class="text-right"><a href="{{ route('DeleteProduct',array(3))}} " data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" name="selected[]" value="49" />
                        </td>
                        <td class="text-center"> <img src="http://localhost/upload/image/cache/catalog/demo/samsung_tab_1-40x40.jpg" alt="Samsung Galaxy Tab 10.1" class="img-thumbnail" /> </td>
                        <td class="text-left">Samsung Galaxy Tab 10.1</td>
                        <td class="text-left">SAM1</td>
                        <td class="text-right">$199.99
                        </td>
                        <td class="text-right"> <span class="label label-warning">0</span> </td>
                        <td class="text-left">Enabled</td>
                        <td class="text-right"><a href="{{ route('EditProduct',array(4))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                        <td class="text-right"><a href="{{ route('DeleteProduct',array(4))}} " data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" name="selected[]" value="35" />
                        </td>
                        <td class="text-center"> <img src="http://localhost/upload/image/cache/no_image-40x40.png" alt="Product 8" class="img-thumbnail" /> </td>
                        <td class="text-left">Product 8</td>
                        <td class="text-left">Product 8</td>
                        <td class="text-right">$100.00
                        </td>
                        <td class="text-right"> <span class="label label-success">1000</span> </td>
                        <td class="text-left">Enabled</td>
                        <td class="text-right"><a href="{{ route('EditProduct',array(5))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                        <td class="text-right"><a href="{{ route('DeleteProduct',array(5))}} " data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                    </tr>             
                </tbody>
                </table>
            </div>
            </form>
            <div class="row">
            <div class="col-sm-6 text-left"></div>
            <div class="col-sm-6 text-right">Showing 1 to 19 of 19 (1 Pages)</div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>    
</section>
    <!-- /.content -->
  </div>
</form>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="{{url('/')}}/public/https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
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
<script src="{{url('/')}}/public/bower_components/ckeditor/ckeditor.js"></script>
</body>
</html>