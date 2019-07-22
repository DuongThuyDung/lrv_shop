<nav class="navbar navbar-static-top">
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
               <li class="user-header">
                  <img src="{{url('/')}}/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  <p>@if (Auth::check()) {{Auth::user()->email}} @endif
                     <small>Bách Khoa Aptech</small>
                  </p>
               </li>
               <li>
                  <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Thông tin</a></li>
                  <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Cài đặt</a></li>
                  <li><a href="admin/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
            </ul>
         </li>
         <li class="user-footer">
            <div class="pull-left">
               <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
               <a href="{{ route('admin-logout') }}" class="btn btn-default btn-flat">Sign out</a>
            </div>
         </li>
         <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
         </li>
      </ul>
   </div>
</nav>