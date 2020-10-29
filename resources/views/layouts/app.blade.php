<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="{{asset('admin/')}}/vendor/pace/pace.min.js"></script>
    <link href="{{asset('admin/')}}/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/font-awesome/css/font-awesome.css">
    
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/toastr/toastr.min.css">
    <!--dataTable-->
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('admin/')}}/stylesheets/css/style.css">
    

</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="{{asset('/dashboard')}}" class="on-click">
                        <h3 style="margin-left: 4px;">Flipmart</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>

                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="{{asset('/admin/') }}/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{Auth::User()->name}}</span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="pages_lock-screen.html"><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
                                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title"></div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="{{ request()->is('dashboard') ? 'active-item' : '' }}"><a href="{{asset('/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <!--UI ELEMENTENTS-->

                                <!--Brand-->
                                <li class="has-child-item close-item {{ request()->is('brand/*') ? 'open-item':'' }} ">
                                    <a><i class="fa fa-bars" aria-hidden="true"></i><span>Brand</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ request()->is('brand/add-brand', 'brand/edit/*') ? 'open-item':'' }}"><a href="{{route('add-brand')}} ">Add Brand</a></li>
                                        <li class="{{ request()->is('brand/manage-brand') ? 'open-item':'' }}"><a href="{{route('manage-brand')}}">Manage Brand</a></li>

                                    </ul>
                                </li>

                                <!--Category-->
                                <li class="has-child-item close-item {{ request()->is('category/*') ? 'open-item':'' }} ">
                                    <a><i class="fa fa-bars" aria-hidden="true"></i><span>Categories</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ request()->is('category/manage-category', 'category/add-category', 'category/edit/*') ? 'open-item':'' }}"><a href="{{route('manage-category')}} "> Category</a></li>
                                        <li class="{{ request()->is('category/manage-sub-category', 'category/add-sub-category', 'category/edit-sub-category/*') ? 'open-item':'' }}"><a href="{{route('manage-subcategory')}}"> Sub Category</a></li>
                                    </ul>
                                </li>

                                <li class="has-child-item close-item {{ request()->is('sliders/*') ? 'open-item':'' }} ">
                                    <a><i class="fa fa-bars" aria-hidden="true"></i><span>Sliders</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ request()->is('sliders/add') ? 'open-item':'' }}"><a href="{{route('sliders.create')}} "> Add Slider</a></li>
                                        <li class="{{ request()->is('sliders/manage', 'sliders/edit/*') ? 'open-item':'' }}"><a href="{{route('sliders.manage')}}"> Manage Slider</a></li>
                                    </ul>
                                </li>

                                <li class="has-child-item close-item {{ request()->is('products/*') ? 'open-item':'' }} ">
                                    <a><i class="fa fa-bars" aria-hidden="true"></i><span>Product</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ request()->is('products/add') ? 'open-item':'' }}"><a href="{{route('products.create')}} "> Add Product</a></li>
                                        <li class="{{ request()->is('products/manage', 'products/edit/*') ? 'open-item':'' }}"><a href="{{route('sliders.manage')}}"> Manage Product</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->



                @yield('content')


                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>

            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="{{asset('admin/')}}/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="{{asset('admin/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('admin/')}}/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{asset('admin/')}}/javascripts/template-script.min.js"></script>
    <script src="{{asset('admin/')}}/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--dataTable-->
    <script src="{{asset('admin/')}}/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
    <!--Examples-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"> </script>
    <script src="{{asset('admin/')}}/javascripts/examples/tables/data-tables.js"></script>
    <!--Notification msj-->
    <script src="{{asset('admin/')}}/vendor/toastr/toastr.min.js"></script>
    <!--morris chart-->
    <script src="{{asset('admin/')}}/vendor/chart-js/chart.min.js"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{asset('admin/')}}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!--Examples-->
    <script src="{{asset('admin/')}}/javascripts/examples/dashboard.js"></script>
    <script>
        $.validate({
            lang: 'en'
        });
    </script>
</body>

</html>