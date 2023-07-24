<!doctype html>
<html class="no-js " lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Redsuelva</title>
    <link rel="icon" href="{{ asset('images/icon_logo.png') }}" type="image/x-icon"> <!-- Favicon-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('plugins/charts-c3/plugin.css') }}" />

    <link rel="stylesheet" href="{{ asset('plugins/morrisjs/morris.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">


    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

    <link rel="stylesheet" src="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/dropify/css/dropify.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/main_choices.css') }}">


</head>

<body class="theme-blush" style="background:rgba(238, 146, 81, 0.451)">


    <div class="overlay"></div>
    <div class="navbar-right mt-3">
        <ul class="navbar-nav">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle text-white" title="Notifications" data-toggle="dropdown"
                    role="button"><i class="zmdi zmdi-notifications text-white"></i>
                    <div class="notify text-white"><span class="heartbit text-white"></span><span
                            class="point text-white">0</span>

                    </div>
                </a>
                <ul class="dropdown-menu slideUp2">
                    <li class="header">Notifications</li>
                    <li class="body">
                        <ul class="menu list-unstyled">

                            <li>


                            </li>

                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>


            <li><a href="{{ route('logout') }}" class="mega-menu" title="Sign Out"
                    onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <i class="zmdi zmdi-power text-white"></i>
                </a></li>
        </ul>
    </div>


    <!-- Left Sidebar background:rgba(46, 88, 125, 0.966);
     rgb(30, 47, 62), rgb(202, 197, 195), rgb(242, 239, 238),rgba(225, 222, 222, 0.999), rgba(235, 123, 89, 0.913)
     background:linear-gradient(to bottom, rgb(64, 89, 124),  rgba(36, 49, 73, 0.913)
    ç-->
    <aside id="leftsidebar" class="sidebar" style="background:rgb(40, 69, 117)">

        <div class="navbar-brand">
            <button class="btn-menu ls-toggle-btn text-white" type="button"><i class="zmdi zmdi-menu"></i></button>
            <a href="{{route('home')}}"><img src="{{ asset('images/icon_logo.png') }}" width="25" style="height:25 !important;" alt="Aero"><span
                    class="m-l-10 text-white">SHOTOKU</span></a>

        </div>
        <div class="menu">

            <ul class="list">
                <li>
                    <div class="user-info">
                        <a class="image"><img src="{{ asset('images/user.png') }}" alt="User"></a>
                        <div class="detail">
                            <h4 class="text-white">{{ Auth::user()->name }}</h4>

                        </div>
                    </div>
                </li>

                <li class="active open"><a href="{{ route('home') }}"><i class="zmdi zmdi-home text-white"></i><span
                            class="text-white">Dashboard</span></a>
                </li>
                @forelse ($modules as $module)
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block text-white">
                            <i class="{{ $module->icon_modules }} text-white"></i>
                            <span>{{ $module->name_modules }}</span>
                        </a>
                        <ul class="ml-menu">
                            @forelse ($module->SubModules as $subModule)
                                <li><a href="{{ $subModule->route }}" class="text-white">{{ $subModule->name_submodules }}</a></li>
                            @empty
                                no tienes submodulos asignados
                            @endforelse
                        </ul>
                    </li>
                @empty
                    no tienes modulos asigandos
                @endforelse
                

            </ul>

        </div>



    </aside>





    <!-- Main Content -->


    <main>
        @yield('content')
    </main>



<script src="{{ asset('js/app.js') }}"></script> 
<script>
</script>

<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>

<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<script src="{{ asset('bundles/libscripts.bundle.js') }}"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{ asset('bundles/vendorscripts.bundle.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>

<script src="{{ asset('bundles/mainscripts.bundle.js') }}"></script>
<!-- Custom Js -->
<script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>

<script src="{{ asset('bundles/sparkline.bundle.js') }}"></script>
<!-- Sparkline Plugin Js -->
<script src="{{ asset('bundles/c3.bundle.js') }}"></script>

<script src="{{ asset('js/pages/index.js') }}"></script>

<script src="{{ asset('plugins/dropify/js/dropify.min.js') }}"></script>

<script src="{{ asset('js/pages/forms/dropify.js') }}"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script> -->
<script src="{{ asset('js/axios.0.26.1.min.js') }}"></script>

<!-- <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script> -->
<script src="{{ asset('js/chosen.jquery.min.js') }}"></script>

<!-- <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script> -->
<script src="{{ asset('js/choices.min.js') }}"></script>


@yield('script')

</body>


</html>
