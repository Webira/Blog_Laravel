<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Creer votre propre environnement virtuel.Web en 3D, opensource">
        <title>MEZA openSim Manager</title>
        
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{mix("css/app.css")}}"/>
        @livewireStyles

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-orange navbar-light">
            <!--Left navbar Links-->
            <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i>
            </a>
            </li>
             <li><a class="nav-link"><h4><strong>MEZA openSim Manager</strong></h4></a></li>
            </ul>

            <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link"><strong>Accueil</strong></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('posts.index') }}" class="nav-link"><strong>Blog</strong></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('accesopensim') }}" class="nav-link"><strong>Accès au "OpenSim"</strong></a>
            </li>
        
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('contactform.create') }}" class="nav-link"><strong>Nous contacter</strong></a>
            </li>
            
            <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <strong>Profile d'un User</strong></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><strong>Déconnecter</strong></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                    </form>
            </li>
            </ul>
                <!-- Right navbar links -->
             
            <ul class="navbar-nav ml-auto">

            <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-user"></i>
            </a>
            </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container"brand-image img-circle elevation-3"-->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
            <img src="{{asset("images/Logo_MezaSim.png")}}" alt="MEZA Logo" class="brand-image" ></a>
            <span class="brand-text font-weight-bold" style="font-size: 1.3em;">Manager</span>
            

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"><h5><strong>MENU<h5><strong></a>
                    </div>
                </div>
                    <x-menuRole />
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">

                    @yield("contenu")

                </div>
            </div>   <!--/.content -->
        </div>  <!--/.content-wrapper -->
            <x-sidebarRight />

        <footer class="main-footer">

                <div class="float-left d-none d-sm-inline">
                    <p><strong>MEZA openSim Manager</strong></p>
                </div>
                <div class="float-right d-none d-sm-inline ml-auto">
                    <span className="text-muted">Tous les droits sont réservés 2023@meza</span>
                </div>
                <div class="flex d-none d-sm-inline-block ml-auto"></div>
        </footer>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        @livewireScripts

    </body>
</html>