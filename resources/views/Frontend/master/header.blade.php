
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header"> 
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <span class="hidden-xs">@if (Auth::check()) {{Auth::user()->email}} @endif</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header"><p>@if (Auth::check()) {{Auth::user()->email}} @endif</p></li>
                                <li class="user-footer">
                                    <div class="pull-right"><a href="{{ route('admin-logout') }}" class="btn btn-default btn-flat">Sign out</a></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="navbar-inverse">
            <!-- right-area -->
            <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
            <ul class="main-menu" id="main-menu">
                <li><a href="{{ route('Home') }}">Home</a></li>
                <li class="drop-down"><a href="{{ route('New') }}">Tin Tức<i class="ion-arrow-down-b"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('Regulation') }}">Nội Quy - Quy Định</a></li>
                <li><a href="{{ route('About') }}">Giới Thiệu</a></li>
                <li><a href="#">Liên Hệ</a></li>
                <li><a href="#">Art</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </header>