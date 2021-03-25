<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('Tema/assets/img/basic/favicon.ico') }}" type="image/x-icon">
    <title>Record</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('Tema/assets/css/app.css') }}">
</head>

<body class="sidebar-mini sidebar-collapse theme-dark  sidebar-expanded-on-hover has-preloader" style="display: none;">


    <!-- Pre loader To disable preloader remove 'has-preloader' from body-->
    @include('Cliente.fragments.loading')
        @yield('loading')


    <!-- @Pre loader-->
    <div id="rekord-app">


    <!--menu la teral -->
    @include('Cliente.fragments.sidebar')
        @yield('sidebar')


    <!-- Avance de la cancion e informacion, menu la teral de canciones -->
    @include('Cliente.fragments.rightsidebar')
            @yield('rightsidebar')



    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg shadow  fixed"></div>



    <!-- Busqueda-->
    @include('Cliente.fragments.searchoverlay')
        @yield('searchoverlay')


    <!--Page Barra inferior-->
    @include('Cliente.fragments.navbar')
        @yield('navbar')




    <!--Page Content-->
    <main id="pageContent" class="page has-sidebar">



        @yield('cuerpo')



    </main><!--@Page Content-->


    
</div><!--@#rekord-app-->
<!--/#rekord-app -->
<script src="https://maps.googleapis.com/maps/api/js?&key=AIzaSyC3YkZNNySdyR87o83QEHWglHfHD_PZqiw&libraries=places"></script>
<script src="{{ asset('Tema/assets/js/app.js') }}"></script>


</body>
</html>