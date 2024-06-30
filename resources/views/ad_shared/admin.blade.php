<!DOCTYPE html>
<html>

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="ad_assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="ad_assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="ad_assets/dist/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini" >
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="user/home" class="logo">
               
                <span class="logo-lg"><b>4MENSHOP</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                       
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="anh/admin.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Vũ Đình Vinh</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="ad_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Thông tin</a>
                                    </div>
                                    <div class="pull-right">
                                        <a onclick="Logout()" class="btn btn-default btn-flat">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="ad_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Vũ Đình Vinh</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                   
                    <li class="treeview">
                        <a href="{{route('admin.index')}}">
                            <i class="fa fa-home"></i> <span>Trang chủ</span>
                        </a>
                    </li>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span>Chuyên mục</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                            <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span>Sản phẩm</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('product.index')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                            <li><a href="{{route('product.create')}}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span>Khách hàng</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('customer.index')}}"><i class="fa fa-circle-o"></i>Danh sách </a></li>
                            <li><a href="{{route('customer.create')}}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Nhà phân phối</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('provider.index')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Thêm mớ<img src="" alt="" srcset=""></a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Hóa đơn bán</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('exportcart.index')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o">  Thêm mới</i></a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Hóa đơn nhập</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('importcart.index')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o">  Thêm mới</i></a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                    
                </h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol> -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <!-- <div class="box-header with-border">
                        <h3 class="box-title">Title</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div> -->
                    <div class="box-body">
                        @yield('main')
                    </div>
                    
                    <!-- /.box-body -->
                    <div class="box-footer">
                        Footer
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                
            </div>
            <strong>4MENSHOP &copy; <a href="https://www.facebook.com/cut.ra.khoi.wall.cua.tao">Vũ Đình Vinh</a>.</strong>
        </footer>
    </div>
    <script>
        function Logout(){
            var a=confirm("Bạn có muốn đăng xuất không?")
            if(a){
                window.location.href="/"
            }
        }
    </script>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.0 -->
    <script src="ad_assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="ad_assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="ad_assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="ad_assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="ad_assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="ad_assets/dist/js/demo.js"></script>
</body>

</html>