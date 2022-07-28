<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Web de corales</title>
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
<div class="main">
    <div class="container-fluid">
        <div class="row">   
            <div class="col-md-12">
                <div class="page-header">
                        <div>
                            <img src="https://drive.google.com/uc?export=view&id=1NKEm3DNrEhGBG3HyWSwb3sOJ6fOOBelP" class="img-responsive center-block" alt="banner" style="max-width: 80vw">
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
                                <a class="navbar-brand" href=""><strong>Web de corales</strong></a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="{{route('login')}}">
                                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        Login</a>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
                <!-- <h3>@yield('title')</h3> -->
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <h3>Bienvenidos a nuestra web</h3>
                    <p></p>
                    <p>En estas páginas encontrarás informacion sobre el coro Voice's Choir de Torredembarra.</p>
                    <p>Si eres un visitante podrás vernos y escucharnos en alguna de las grabaciones de nuestras actuaciones.</p>
                    <p>Si eres miembro del coro podrás descargarte información y documentos en el Area de miembros después de identificarte como usuario.</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
            $(".disclaimer").remove();
        }, 3000);
    </script>

</body>
</html>

