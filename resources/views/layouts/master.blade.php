<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="google-site-verification" content="zUcDDJluOBsAjlkQ_c_uKGwAukybTGp3SSG_NoMEtb0" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <title>{{session('nombreGrupo')??'Web de corales'}}</title>
    <style>
        body {
            background-color: #F8F8F8;
            padding-top: 20px;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        body::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        body {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
            }
        .main {
            /* width: 700px;
            margin: 0 auto;
            margin-bottom: 50px; */
        }
        .btnsocial,
        .btnsocial-ul,
        .menulist-btn-social,
        .atm-menu-tsocial  {
            position: relative;
            display: flex;
            justify-content: center;
        }
    </style>

</head>
<body>
<?php
use Illuminate\Support\Facades\Route;

?>
<div class="main">
    <div class="container-fluid">
        <div class="row">   
            <div class="col-md-12">
                <div class="page-header">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    <div class="row">   
                        <div class="col-md-6 col-md-offset-3">
                            <img src="https://drive.google.com/uc?export=view&id={{session('bannerGrupo')??'1NKEm3DNrEhGBG3HyWSwb3sOJ6fOOBelP'}}" class="img-responsive center-block" alt="banner" >
                        </div>
                    </div>
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="{{route('welcome')}}"><strong>{{session('nombreGrupo')??'Web de corales'}}</strong></a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <!-- <ul class="nav navbar-nav">
                                    <li class="<?=Route::currentRouteName()=="sobrenosotros"? "active":""?>"><a href="{{route('sobrenosotros')}}">Sobre Nosotros </a></li>
                                </ul> -->
                                <ul class="nav navbar-nav navbar-right">
                                    @if(session('superUser'))
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión Grupos<span class="caret"></span></a>
                                        <ul class="dropdown-menu"> 
                                            <strong class="navbar-default dropdown-header">Grupos</strong>
                                            <li><a href="">Índice de grupos</a></li>
                                            <li><a href="">Añadir grupo</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                    @if(session('admin'))
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administración<span class="caret"></span></a>
                                        <ul class="dropdown-menu"> 
                                            <strong class="navbar-default dropdown-header">Usuarios</strong>
                                            <li><a href="{{route('usuarioIndex')}}">Índice de usuarios</a></li>
                                            <li><a href="{{route('registro')}}">Añadir usuario</a></li>
                                            <li role="separator" class="divider"></li>
                                            <strong class="navbar-default dropdown-header">Obras</strong>
                                            <li><a href="{{route('obraIndex')}}">Índice de obras</a></li>
                                            <li><a href="{{route('obraCreate')}}">Añadir obra</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                    @if(session('usuario'))
                                        <li role="presentation" class="<?=Route::currentRouteName()=="repertorio"? "active":""?>"><a href="{{route('repertorio')}}">Repertorio</a></li>
                                    @endif
                                    @if(!session('usuario'))
                                    <li><a href="{{route('login')}}">
                                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        Login</a>
                                    </li>
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <strong>{{session('nombre')}} {{session('apellidos')}}</strong>
                                            <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('logout')}}">Logout</a></li>
                                                <li><a href="{{route('pwChange')}}">Cambio de contraseña</a></li>
                                                <li><a href="{{route('persChange')}}">Cambio de datos personales</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
                <!-- <h3>@yield('title')</h3> -->
                @yield('content')
            </div>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
        window.setTimeout(function() {
            $(".disclaimer").remove();
        }, 1);
    </script>
</body>
</html>