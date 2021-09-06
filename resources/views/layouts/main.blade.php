<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="/vendors/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendors/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/home" class="site_title"><i class="fa fa-paw"></i> <span>SalesMate</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if (file_exists(public_path() . '/img/users/' . Auth::user()->email . '.jpg'))
                                <img src="/img/users/{{ Auth::user()->email }}.jpg" alt="" height="70" width="70"
                                    class="img-circle profile_img">
                            @else
                                <img src="/img/users/default.jpg" alt="" height="70" width="70"
                                    class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Sales <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/transaction">Sales Transaction</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Ranking <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        @if (Auth::User()->role_id == '1')
                                            <li><a href="/rankingsite">Best Site Contribution</a></li>
                                        @endif
                                        <li><a href="/rankingbrand">Best Brand Contribution</a></li>
                                        <li><a href="/rankinguser">Best User Contribution</a></li>
                                        <li><a href="/rankingdepartment">Best Department Contribution</a></li>
                                        <li><a href="/rankingsubdepartment">Best Sub Department Contribution</a></li>
                                    </ul>
                                </li>
                                @if (Auth::User()->role_id == '1')
                                    <li><a><i class="fa fa-bar-chart-o"></i> Admin <span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="/user">User</a></li>
                                            <li><a href="/site">Site</a></li>
                                            <li><a href="/brand">Brand</a></li>
                                            <li><a href="/department">Department</a></li>
                                            <li><a href="/subdepartment">Sub Department</a></li>
                                            <li><a href="/vendor">Vendor</a></li>
                                            <li><a href="/upload">Upload Transaction</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    @if (file_exists(public_path() . '/img/users/' . Auth::user()->email . '.jpg'))
                                        <img src="/img/users/{{ Auth::user()->email }}.jpg"
                                            alt="">{{ Auth::user()->name }}
                                    @else
                                        <img src="/img/users/default.jpg" alt="">{{ Auth::user()->name }}
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">User Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Select2 -->
    <script src="/vendors/select2/js/select2.full.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/vendors/moment/min/moment.min.js"></script>
    <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Chart.js -->
    <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
    <script type="text/javascript">
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        @yield('script')

    </script>

</body>

</html>
