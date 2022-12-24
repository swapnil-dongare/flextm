<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title')</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('main/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/skin_color.css') }}">

    @yield('header-script')

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <div id="loader"></div>

        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="logo">
                    <!-- logo-->
                    <div class="logo-mini w-50">
                        <span class="light-logo"><img class="rounded-circle"
                                src="{{ auth()->user()->getUserDetails ? (auth()->user()->getUserDetails->logo_url ? asset(Storage::url(auth()->user()->getUserDetails->logo_url)) : asset('favicon.ico')) : asset('favicon.ico') }}"
                                alt="logo"></span>
                    </div>
                    <div class="logo-lg">
                        <h3 style="margin-top: 30px;color:white;font-weight:bold;"><span class="light-logo">
                                {{ config('app.name') }}
                            </span></h3>
                    </div>
                </a>
            </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item">
                            <a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light"
                                data-toggle="push-menu" role="button">
                                <i data-feather="align-left"></i>
                            </a>
                        </li>
                        <li class="btn-group d-lg-inline-flex d-none">
                            <div class="app-menu">
                                <div class="search-bx mx-5">
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search"
                                                aria-label="Search" aria-describedby="button-addon3">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon3"><i
                                                        data-feather="search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">

                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <h5 class="text-primary" style="margin-top: 30px;">Welcome
                                <strong class="text-danger"> {{ auth()->user()->name }}</strong>
                            </h5>
                        </li>
                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen"
                                class="waves-effect waves-light nav-link full-screen btn-warning-light"
                                title="Full Screen">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle btn-info-light"
                                data-bs-toggle="dropdown" title="Notifications">
                                <i data-feather="bell"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">

                                <li class="header">
                                    <div class="p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc
                                                suscipit blandit.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu
                                                sapien elementum, in semper diam posuere.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor
                                                commodo porttitor pretium a erat.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et
                                                nisi
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero
                                                dictum fermentum.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam
                                                interdum, at scelerisque ipsum imperdiet.
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Control Sidebar Toggle Button
                        <li class="btn-group nav-item">
                            <a href="#" data-toggle="control-sidebar" title="Setting"
                                class="waves-effect full-screen waves-light btn-danger-light">
                                <i data-feather="settings"></i>
                            </a>
                        </li> -->

                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#"
                                class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent py-0 no-shadow"
                                data-bs-toggle="dropdown" title="User">
                                <img src="{{ asset('images/avatar/avatar-1.png') }}"
                                    class="avatar rounded-10 bg-primary-light h-40 w-40" alt="" />
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    {{-- <a class="dropdown-item" href="extra_profile.html"><i
                                            class="ti-user text-muted me-2"></i> Profile</a>
                                    <a class="dropdown-item" href="mailbox.html"><i
                                            class="ti-settings text-muted me-2"></i> Email</a>
                                    <div class="dropdown-divider"></div> --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><i
                                            class="ti-lock text-muted me-2"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%;">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="@yield('sidebar-dashboard')">
                                <a href="{{ route('home') }}">
                                    <i data-feather="home"></i>
                                    Dashboard
                                </a>
                            </li>
                            {{-- <li class="treeview">
                                <a href="#">
                                    <i data-feather="monitor"></i>
                                    <span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="@yield('sidebar-dashboard')">
                                        <a href="{{ route('home') }}">
                                            <i class="icon-Commit">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Dashboard
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            @if (auth()->user()->hasAnyDirectPermission([
                                    'list-customer',
                                    'create-customer',
                                    'edit-customer',
                                    'delete-customer',
                                    'list-sp',
                                    'create-sp',
                                    'edit-sp',
                                    'delete-sp',
                                    'list-tm',
                                    'create-tm',
                                    'edit-tm',
                                    'delete-tm',
                                    'list-driver',
                                    'create-driver',
                                    'edit-driver',
                                    'delete-driver',
                                    'list-equipment',
                                    'create-equipment',
                                    'edit-equipment',
                                    'delete-equipment',
                                    'list-business-place',
                                    'create-business-place',
                                    'edit-business-place',
                                    'delete-business-place',
                                ]))
                                <li class="treeview ">
                                    <a href="#">
                                        <i data-feather="monitor"></i>
                                        <span>Manage</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @can('list-sp', 'create-sp', 'edit-sp', 'delete-sp')
                                            <li class="@yield('sidebar-organization')">
                                                <a href="{{ route('organization.index') }}">
                                                    <i class="icon-Commit">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Customer management
                                                </a>
                                            </li>
                                        @endcan
                                        @can('list-tm', 'create-tm', 'edit-tm', 'delete-tm')
                                            <li class="@yield('sidebar-transport-manager')">
                                                <a href="{{ route('transport-manager.index') }}">
                                                    <i class="icon-Commit">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Manage Users
                                                </a>
                                            </li>
                                        @endcan

                                        @can('list-customer', 'create-customer', 'edit-customer', 'delete-customer')
                                            <li class="@yield('sidebar-customer')">
                                                <a href="{{ route('get-user-customer') }}">
                                                    <i class="icon-Commit">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Manage Customers
                                                </a>
                                            </li>
                                        @endcan
                                        @can('list-driver', 'create-driver', 'edit-driver', 'delete-driver')
                                            <li class="@yield('sidebar-driver')">
                                                <a href="{{ route('driver.index') }}">
                                                    <i class="icon-Commit">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Manage Drivers
                                                </a>
                                            </li>
                                        @endcan
                                        @can('list-equipment', 'create-equipment', 'edit-equipment', 'delete-equipment')
                                            <li class="@yield('sidebar-equipment')">
                                                <a href="{{ route('equipment.index') }}">
                                                    <i class="icon-Commit">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Manage Vehicles
                                                </a>
                                            </li>
                                        @endcan
                                        @can('list-business-place', 'create-business-place', 'edit-business-place',
                                            'delete-business-place')
                                            <li class="@yield('sidebar-business-place')">
                                                <a href="{{ route('business-place.index') }}">
                                                    <i class="icon-Commit">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Business Place
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>

                                </li>
                            @endif

                            @if (auth()->user()->hasAnyDirectPermission([
                                    'list-order-request',
                                    'create-order-request',
                                    'edit-order-request',
                                    'delete-order-request',
                                ]))
                                <li class="treeview">
                                    <a href="#">
                                        <i data-feather="truck"></i>
                                        <span>Manage Order</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="@yield('sidebar-order')">
                                            <a href="{{ route('order-request.index') }}">
                                                <i class="icon-Commit">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                Manage Orders
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                        </ul>

                        <div class="sidebar-widgets" style="position: fixed;bottom:0;">
                            <div class="copyright text-center m-25 text-white-50">
                                <p><strong class="d-block">
                                        {{ config('app.name') }}
                                    </strong> ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> All Rights Reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Main content -->
                <section class="content">
                    {{-- ALERTS --}}
                    @if (session()->has('full-top-success'))
                        <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alerttop minimize-5"
                            style="display: block"> <i class="ti-user"></i> {{ session()->get('full-top-success') }}
                            <a href="#" class="closed">&times;</a> </div>
                    @elseif (session()->has('full-top-error'))
                        <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alerttop minimize-5"
                            style="display: block">
                            <i class="ti-user"></i> {{ session()->get('full-top-error') }}
                            <a href="#" class="closed">&times;
                            </a>
                        </div>
                    @endif
                    {{-- END ALERTS --}}


                    @yield('main-content')
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Home</a>
                    </li>
                </ul>
            </div>
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> <a href="{{config('app.url')}}">{{config('app.name')}}</a>. All Rights
            Reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar">

            <div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"
                    data-toggle="control-sidebar"><i class="ion ion-close text-white"></i></span> </div>
            <!-- Create the tabs -->
            <ul class="nav nav-tabs control-sidebar-tabs">
                <li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" class="active"><i
                            class="mdi mdi-message-text"></i></a></li>
                <li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i
                            class="mdi mdi-playlist-check"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <div class="flexbox">
                        <a href="javascript:void(0)" class="text-grey">
                            <i class="ti-more"></i>
                        </a>
                        <p>Users</p>
                        <a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
                    </div>
                    <div class="lookup lookup-sm lookup-right d-none d-lg-block">
                        <input type="text" name="s" placeholder="Search" class="w-p100">
                    </div>
                    <div class="media-list media-list-hover mt-20">
                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-success" href="#">
                                <img src="{{ asset('images/avatar/1.jpg') }}" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Tyler</strong></a>
                                </p>
                                <p>Praesent tristique diam...</p>
                                <span>Just now</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-danger" href="#">
                                <img src="{{ asset('images/avatar/2.jpg') }}" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Luke</strong></a>
                                </p>
                                <p>Cras tempor diam ...</p>
                                <span>33 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-warning" href="#">
                                <img src="{{ asset('images/avatar/3.jpg') }}" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-primary" href="#">
                                <img src="{{ asset('images/avatar/4.jpg') }}" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-success" href="#">
                                <img src="{{ asset('images/avatar/1.jpg') }}" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Tyler</strong></a>
                                </p>
                                <p>Praesent tristique diam...</p>
                                <span>Just now</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-danger" href="#">
                                <img src="{{ asset('images/avatar/2.jpg') }}" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Luke</strong></a>
                                </p>
                                <p>Cras tempor diam ...</p>
                                <span>33 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-warning" href="#">
                                <img src="{{ asset('images/avatar/3.jpg') }}" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-primary" href="#">
                                <img src="{{ asset('images/avatar/4.jpg') }}" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <div class="flexbox">
                        <a href="javascript:void(0)" class="text-grey">
                            <i class="ti-more"></i>
                        </a>
                        <p>Todo List</p>
                        <a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
                    </div>
                    <ul class="todo-list mt-20">
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_1" class="filled-in">
                            <label for="basic_checkbox_1" class="mb-0 h-15"></label>
                            <!-- todo text -->
                            <span class="text-line">Nulla vitae purus</span>
                            <!-- Emphasis label -->
                            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_2" class="filled-in">
                            <label for="basic_checkbox_2" class="mb-0 h-15"></label>
                            <span class="text-line">Phasellus interdum</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_3" class="filled-in">
                            <label for="basic_checkbox_3" class="mb-0 h-15"></label>
                            <span class="text-line">Quisque sodales</span>
                            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_4" class="filled-in">
                            <label for="basic_checkbox_4" class="mb-0 h-15"></label>
                            <span class="text-line">Proin nec mi porta</span>
                            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_5" class="filled-in">
                            <label for="basic_checkbox_5" class="mb-0 h-15"></label>
                            <span class="text-line">Maecenas scelerisque</span>
                            <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_6" class="filled-in">
                            <label for="basic_checkbox_6" class="mb-0 h-15"></label>
                            <span class="text-line">Vivamus nec orci</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_7" class="filled-in">
                            <label for="basic_checkbox_7" class="mb-0 h-15"></label>
                            <!-- todo text -->
                            <span class="text-line">Nulla vitae purus</span>
                            <!-- Emphasis label -->
                            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_8" class="filled-in">
                            <label for="basic_checkbox_8" class="mb-0 h-15"></label>
                            <span class="text-line">Phasellus interdum</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_9" class="filled-in">
                            <label for="basic_checkbox_9" class="mb-0 h-15"></label>
                            <span class="text-line">Quisque sodales</span>
                            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_10" class="filled-in">
                            <label for="basic_checkbox_10" class="mb-0 h-15"></label>
                            <span class="text-line">Proin nec mi porta</span>
                            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->





    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/progressbar.js-master/dist/progressbar.js') }}"></script>
    <!-- Vendor JS -->
    <script src="{{ asset('main/js/vendors.min.js') }}"></script>
    <script src="{{ asset('main/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        // document.getElementById('e').value = new Date().toISOString().substring(0, 10);
    </script>

    <!-- Deposito Admin App -->
    <script src="{{ asset('main/js/template.js') }}"></script>
    <script src="{{ asset('main/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('main/js/pages/toastr.js') }}"></script>
    <script src="{{ asset('main/js/pages/notification.js') }}"></script>
    {{-- Charts --}}
    <script src="{{ asset('main/js/pages/advanced-form-element.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.minimize-5').fadeOut(10000);
        })
    </script>
    @yield('footer-script')
</body>

</html>
