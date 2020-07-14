<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title','Dairy Shop')</title>

    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js') }}/1.4.2/respond.min.js') }}"></script>
      <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pcoded-horizontal.min.css') }}">
</head>

<body>

    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('partial.header-navbar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    @include('partial.breadcrumb')
                                    @include('partial.alert')

                                    <div class="page-body">

                                        @section('content')
                                        @show

                                    </div>
                                </div>
                                <div id="styleSelector">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('others')
    @show

    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/jquery.slimscroll.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/css-scrollbars.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/Chart.js') }}"></script>

    <script src="{{ asset('/js/amchart/amcharts.js') }}"></script>
    <script src="{{ asset('/js/amchart/serial.js') }}"></script>
    <script src="{{ asset('/js/amchart/light.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('/js/menu-hori-fixed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>

    @section('script')

    @show

</body>

</html>
