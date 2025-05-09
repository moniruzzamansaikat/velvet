<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Binary Pack">
    <meta name="author" content="Binary Pack Ltd.">
    <link rel="icon" href="img/favicon.ico">
    <title>{{ isset($title) ? $title : '' }}</title>

    <!-- CSS libraries-->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/jquery.jgrowl.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}" >


    @stack('styles')
</head>

<body>

    @include('admin.partials.alerts')

    <div id="wrapper">

        <div id="page-content-wrapper">
            @include('admin.partials.sidebar')

            <button href="#menu-toggle" class="wrapper_toggle_btn" id="menu-toggle">
                <x-icons.menu />
            </button>


            @include('admin.partials.navbar')

            <div class="container">
                <div class="content-area">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.jgrowl.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        var docHeight = $(document).height();
        $('#page-content-wrapper').css('min-height', docHeight);
    </script>

    @stack('scripts')
</body>

</html>
