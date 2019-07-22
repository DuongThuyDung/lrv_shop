<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<base href="{{asset('')}}">
 <!-- css -->
<link href="public/backend/css/bootstrap.min.css" rel="stylesheet">
<link href="public/backend/css/datepicker3.css" rel="stylesheet">
<link href="public/backend/css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--[if lt IE 9]>
<script src="public/backend/js/html5shiv.js"></script>
<script src="public/backend/js/respond.min.js"></script>
<![endif]-->
<!--Icons-->
<script src="public/backend/js/lumino.glyphs.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <aside class="main-sidebar">
      <section class="sidebar">
         <div class="user-panel">
            <div class="pull-left image">
               <img src="{{url('/')}}/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info"><a href="#"><i class="fa fa-circle text-success"></i> Online</a></div>
         </div>
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
         <ul class="sidebar-menu" data-widget="tree">
               @foreach($menus as $menu)
               <?php $treeviewClass = isset($menu['childrens']) ? 'treeview' : ''; ?>
               <li class="active {{$treeviewClass}}">
                  <a href="{{ route($menu['name']) }}"><i class="fa {{$menu['icon']}}"></i> <span>{{$menu['label']}}</span></a>
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
      @include('header')
      @yield('content')
      
  <!-- javascript -->
   <script src="public/backend/js/jquery-1.11.1.min.js"></script>
   <script src="public/backend/js/bootstrap.min.js"></script>
   <script src="public/backend/js/chart.min.js"></script>
   <script src="public/backend/js/chart-data.js"></script>
   <script src="public/backend/js/easypiechart.js"></script>
   <script src="public/backend/js/easypiechart-data.js"></script>
   <script src="public/backend/js/bootstrap-datepicker.js"></script>

   <script>
      $('#calendar').datepicker({
      });

      !function ($) {
          $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
              $(this).find('em:first').toggleClass("glyphicon-minus");      
          }); 
          $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
      }(window.jQuery);

      $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
      })
      $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
      })
   </script>   
   <script>
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
</body>

</html>
