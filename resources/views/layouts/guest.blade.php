<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Monitor | knfood">
    <meta name="author" content="Merdi Elongo">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-assets/sash/assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Monitoring | @yield('title-page')</title>

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

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('admin-assets/sash/assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="{{ asset('admin-assets/sash/assets/images/brand/logo-white.png') }}" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container">
                    @yield('content')
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin-assets/sash/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sash/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/show-password.min.js') }}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/generate-otp.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('admin-assets/sash/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('admin-assets/sash/assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin-assets/sash/assets/js/custom.js') }}"></script>

</body>

</html>
