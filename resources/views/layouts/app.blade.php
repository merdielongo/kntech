{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}

<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Monitoring | @yield('title-page')">
    <meta name="author" content="Merdi Elongo">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-assets/sash/assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Monitoring | @yield('title-page') </title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('admin-assets/sash/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('admin-assets/sash/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/sash/assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/sash/assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/sash/assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('admin-assets/sash/assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('admin-assets/sash/assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('admin-assets/sash/assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                @include('includes.header')
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                @include('layouts.sidebar')
                <!--/APP-SIDEBAR-->
            </div>

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">@yield('title-page')</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('title-page')</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        @yield('content')
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>

        <!-- Country-selector modal-->
        {{-- @include('includes.lang') --}}
        <!-- Country-selector modal-->

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <span id="year"></span> <a href="javascript:void(0)">Kntech243</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Spruko </a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('admin-assets/sash/assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('admin-assets/sash/assets/js/sticky.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('admin-assets/sash/assets/js/circle-progress.min.js') }}"></script>

    <!-- PIETY CHART JS-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/peitychart/peitychart.init.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/chart/rounded-barchart.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/chart/utils.js') }}"></script>

    <!-- INTERNAL Data tables js-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/js/table-data.js') }}"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/apexchart/irregular-data-series.js') }}"></script>

    <!-- C3 CHART JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/charts-c3/d3.v5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/charts-c3/c3-chart.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- CHART-DONUT JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/charts.js') }}"></script>

    <!-- INTERNAL Flot JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/flot/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/flot/dashboard.sampledata.js') }}"></script>

    <!-- INTERNAL Vector js -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/js/select2.js') }}"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/index1.js') }}"></script>


    <!-- FILE UPLOADES JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!-- BOOTSTRAP-DATERANGEPICKER JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    <!-- INTERNAL Sumoselect js-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!-- TIMEPICKER JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/time-picker/toggles.min.js') }}"></script>

    <!-- INTERNAL intlTelInput js-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/intl-tel-input-master/intlTelInput.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/intl-tel-input-master/country-select.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/intl-tel-input-master/utils.js') }}"></script>

    <!-- INTERNAL jquery transfer js-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/jQuerytransfer/jquery.transfer.js') }}"></script>

    <!-- INTERNAL multi js-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/multi/multi.min.js') }}"></script>

    <!-- DATEPICKER JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/date-picker/date-picker.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>

    <!-- COLOR PICKER JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/pickr-master/pickr.es5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/js/picker.js') }}"></script>

    <!-- MULTI SELECT JS-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/multipleselect/multi-select.js') }}"></script>

    <!-- FORMELEMENTS JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/formelementadvnced.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/js/form-elements.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('admin-assets/sash/assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/custom.js') }}"></script>

</body>

</html>
