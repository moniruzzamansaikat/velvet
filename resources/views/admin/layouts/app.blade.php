<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pnotify.all.min.css') }}">
    <title>{{ isset($pageTitle) ? $pageTitle : '' }}</title>

    @stack('styles')
</head>

<body class="bg-gray-100">


    @include('admin.partials.navbar')
    
    
    <!-- start wrapper -->
    <div class="h-screen flex flex-row flex-wrap">
        
        @include('admin.partials.sidebar')

        <!-- start content -->
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            @include('admin.partials.alerts')
     
            
            @yield('content')
        </div>
        <!-- end content -->

    </div>
    <!-- end wrapper -->


    <!-- script -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/pnotify.all.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>

    @stack('scripts')

</body>

</html>
