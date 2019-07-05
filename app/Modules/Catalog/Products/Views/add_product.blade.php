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
            <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
            <a href="{{ route('Products') }}" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
          </div>
          <h1>Products</h1>
          <ul class="breadcrumb">
              <li><a href="{{ route('Dashboard') }}">Home</a></li>
              <li><a href="{{ route('Products') }}">Products</a></li>
          </ul>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Thêm mới sản phẩm</h3>
            </div>
            <div class="panel-body">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#General">Thông tin chung</a></li>
              <li><a data-toggle="tab" href="#data">Thông sô</a></li>
              <li><a data-toggle="tab" href="#attribute">Thuộc tính</a></li>
              <li><a data-toggle="tab" href="#image">Hình ảnh</a></li>
              <li><a data-toggle="tab" href="#product_special">Sản phẩm đặc biệt</a></li>
              <li><a data-toggle="tab" href="#product_sale">Sản phẩm khuyến mãi</a></li>
            </ul>
            <div class="tab-content">
              <div id="General" class="tab-pane fade in active">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="product_name">Tên sản phẩm</label>
                        <div class="col-sm-10 input-group">
                            <input type="text" name="product_name" value="" placeholder="Product Name" id="product_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Mô tả</label>
                        <div class="col-sm-10 input-group">
                            <textarea name="description" placeholder="Description" id="description" data-toggle="summernote" data-lang="" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="product_manufacturer"><span data-toggle="tooltip" title="(Autocomplete)">Nhà sản xuất</span></label>
                      <div class="col-sm-10 input-group">
                        <input type="text" name="product_manufacturer" value="" placeholder="Manufacturer" id="product_manufacturer" class="form-control"/> <input type="hidden" name="product_manufacturer_id" value="0"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="product_category"><span data-toggle="tooltip" title="(Autocomplete)">Categories</span></label>
                      <div class="col-sm-10 input-group">
                        <input type="text" name="product_category" value="" placeholder="Categories" id="product_category" class="form-control"/>
                        <div id="product_category" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                      </div>
                    </div>
              </div>
              <div id="data" class="tab-pane fade">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="product_model">Model</label>
                        <div class="col-sm-10 input-group">
                            <input type="text" name="product_model" value="" placeholder="Model" id="product_model" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_price">Giá</label>
                        <div class="col-sm-10 input-group">
                            <input type="text" name="product_price" value="" placeholder="Price" id="product_price" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_quantity">Số lượng</label>
                        <div class="col-sm-10 input-group">
                            <input type="text" name="product_quantity" value="1" placeholder="Quantity" id="product_quantity" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_minimum"><span data-toggle="tooltip" title="Force a minimum ordered amount">Số lượng nhỏ nhất</span></label>
                        <div class="col-sm-10 input-group">
                            <input type="text" name="product_minimum" value="1" placeholder="Minimum Quantity" id="product_minimum" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_subtract">Trừ trong kho</label>
                        <div class="col-sm-10 input-group">
                            <select name="product_subtract" id="product_subtract" class="form-control">
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_status">Trạng thái kho</label>
                        <div class="col-sm-10 input-group">
                            <select name="product_status" id="product_status" class="form-control">
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="date_available">Ngày phát hành</label>
                        <div class="col-sm-10 input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="date_available">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="sort_order">Sort Order</label>
                            <div class="col-sm-10 input-group">
                              <input type="text" name="sort_order" value="1" placeholder="Sort Order" id="sort_order" class="form-control"/>
                            </div>
                    </div>
              </div>
              <div id="attribute" class="tab-pane fade">
                <div class="panel panel-default">
                  <div class="panel-body tabs">
                      <label>Các thuộc Tính <a href="#"><span class="glyphicon glyphicon-cog"></span>
                              Tuỳ chọn</a>
                      </label>
                      <ul class="nav nav-tabs">
                               <li class='active' ><a href="#tab1" data-toggle="tab">Color</a></li>
                              <li><a href="#tab-add" data-toggle="tab">+</a></li>
                      </ul>
                      <div class="tab-content">
                              <div class="tab-pane fade active in" id="tab1">
                                      <table class="table">
                                          <thead>
                                              <tr>
                                                  {{-- quan hệ 1-n properties sang values $row->values --}}
                                                  <th>Red</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td> <input class="form-check-input" type="checkbox" name="attr['Color'][]" value="1">
                                                  </td> 
                                              </tr>
                                          </tbody>
                                      </table>
                                      <hr>
                                      <div class="form-group">
                                          <form action="" method="post">
                                              @csrf
                                                  <label for="">Thêm giá trị cho thuộc tính</label>
                                                  <input type="hidden" name="id_pro" value="1">
                                                  <input name="var_name" type="text" class="form-control"
                                                      aria-describedby="helpId" placeholder="Giá trị thuộc tính">
                                                  <div> <button name="add_val" type="submit">Thêm</button></div>
                                          </form>
                                      </div>
                                    </div>
                          <div class="tab-pane fade" id="tab-add">
                              <form method="post">
                                  @csrf
                                      <div class="form-group">
                                              <label for="">Tên thuộc tính mới</label>
                                            
                                              <input type="text" class="form-control" name="pro_name"
                                                  aria-describedby="helpId" placeholder="Thuộc tính mới">
                                      </div>
                                      <button type="submit" name="add_pro" class="btn btn-success"> <span
                                              class="glyphicon glyphicon-plus"></span>
                                          Thêm thuộc tính</button>
                              </form>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div id="image" class="tab-pane fade">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <td class="text-left">Hình ảnh</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <input id="img" type="file" name="product_img" class="form-control hidden"
                              onchange="changeImg(this)" >
                              <img id="avatar" class="thumbnail" width="100px" height="100px" src="http://localhost/upload/image/cache/no_image-100x100.png"></tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="table-responsive">
                      <table id="images" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <td class="text-left">Hình ảnh thêm</td>
                            <td class="text-right">Thứ tự</td>
                            <td></td>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="2"></td>
                            <td class="text-left"><button type="button" onclick="addImage();" data-toggle="tooltip" title="Add Image" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
              </div>
              <div id="product_special" class="tab-pane fade">
                  <div class="table-responsive">
                      <table id="special" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <td class="text-left">Customer Group</td>
                            <td class="text-left">Priority</td>
                            <td class="text-left">Price</td>
                            <td class="text-left">Date Start</td>
                            <td class="text-left">Date End</td>
                            <td></td>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="5"></td>
                            <td class="text-left"><button type="button" onclick="addSpecial();" data-toggle="tooltip" title="Add Special" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
              </div>
              <div id="product_sale" class="tab-pane fade">
                  <div class="form-group">
                      <label class="col-sm-2 control-label" for="product_sale"><span data-toggle="tooltip" title="(Autocomplete)">Sản phẩm khuyến mãi</span></label>
                      <div class="col-sm-10 input-group">
                        <input type="text" name="product_sale" value="" placeholder="Product Sales" id="product_sale" class="form-control"/>
                        <div id="product_sale" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                      </div>
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
<script>
        $(function () {
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace('description')
          //bootstrap WYSIHTML5 - text editor
          $('.textarea').wysihtml5()
        })
        $('#date_available').datepicker({
            autoclose: true
          })

           // Manufacturer
  $('input[name=\'product_manufacturer\']').autocomplete({
	  'source': function(request, response) {
		  $.ajax({
			  url: 'index.php?route=catalog/manufacturer/autocomplete&user_token=wJz0NG4LeF2uHl9zzVcL6NB6VZ5XFvoh&filter_name=' + encodeURIComponent(request),
			  dataType: 'json',
			  success: function(json) {
				  json.unshift({
					  manufacturer_id: 0,
					  name: ' --- None --- '
				  });

				  response($.map(json, function(item) {
					  return {
						  label: item['name'],
						  value: item['manufacturer_id']
					  }
				  }));
			  }
		  });
	  },
	  'select': function(item) {
		  $('input[name=\'product_manufacturer\']').val(item['label']);
		  $('input[name=\'product_manufacturer_id\']').val(item['value']);
	  }
  });

          // Category
            $('input[name=\'product_category\']').autocomplete({
              'source': function(request, response) {
                $.ajax({
                  url: 'index.php?route=catalog/category/autocomplete&user_token=wJz0NG4LeF2uHl9zzVcL6NB6VZ5XFvoh&filter_name=' + encodeURIComponent(request),
                  dataType: 'json',
                  success: function(json) {
                    response($.map(json, function(item) {
                      return {
                        label: item['name'],
                        value: item['category_id']
                      }
                    }));
                  }
                });
              },
              'select': function(item) {
                $('input[name=\'product_category\']').val('');

                $('#product_category' + item['value']).remove();

                $('#product_category').append('<div id="product_category' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product_category[]" value="' + item['value'] + '" /></div>');
              }
            });

            $('#product_category').delegate('.fa-minus-circle', 'click', function() {
              $(this).parent().remove();
            });
          // Add image
          var image_row = 0;
          function addImage() {
            html = '<tr id="image-row' + image_row + '">';
            html += '  <td class="text-left"><input id="img' + image_row + '" type="file" name="product_image[' + image_row + '][image]" class="form-control hidden"  onchange="changeImage(this)" ><img id="avatar' + image_row + '" class="thumbnail" width="100px" height="100px" src="http://localhost/upload/image/cache/no_image-100x100.png"><input type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" /></td>';
            html += '  <td class="text-right"><input type="text" name="product_image[' + image_row + '][sort_order]" value="" placeholder="Sort Order" class="form-control" /></td>';
            html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';
            $('#images tbody').append(html);
            $('#avatar'+ (image_row)).click(function(){
              $('#img'+ (image_row-1)).click();
            });
            changeImage(this);
            image_row++;
          }
          function changeImage(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar'+(image_row-1)).attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
          }

          // ./image
          // Special
          var special_row = 0;
          function addSpecial() {
            html = '<tr id="special-row' + special_row + '">';
            html += '  <td class="text-left"><select name="product_special[' + special_row + '][customer_group_id]" class="form-control">';
                html += '      <option value="1">Default</option>';
                html += '  </select></td>';
            html += '  <td class="text-right"><input type="text" name="product_special[' + special_row + '][priority]" value="" placeholder="Priority" class="form-control" /></td>';
            html += '  <td class="text-right"><input type="text" name="product_special[' + special_row + '][price]" value="" placeholder="Price" class="form-control" /></td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="product_special[' + special_row + '][date_start]" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="product_special[' + special_row + '][date_end]" value="" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
            html += '  <td class="text-left"><button type="button" onclick="$(\'#special-row' + special_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#special tbody').append(html);

            $('.date').datepicker({
              autoclose: true
            })
  
            special_row++;
          }
          // ./Special
        	function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });
       
</script>