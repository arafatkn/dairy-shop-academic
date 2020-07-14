<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','Dairy Shop Login')</title>


    <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
</head>
<body class="fix-menu">

    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>

    <section class="login-block">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <form class="md-float-material form-material" method="POST" action="">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('/img/logo.png') }}" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
 
    @if($errors->any())
        <div class="row m-b-20">
            <div class="col-md-12">
            @foreach($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
            </div>
        </div>
        <hr/>
    @endif

    @section('content')
    @show
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="{{ url('/') }}"><b class="f-w-600">Back to
                                                    website</b></a></p>
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>

    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/jquery.slimscroll.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/css-scrollbars.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery-i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/common-pages.js') }}"></script>

</body>
</html>
