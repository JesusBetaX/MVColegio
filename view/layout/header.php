<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/favicon.ico">

        <title>Bootstrap</title>

        <!-- CSS Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- CSS Personalizado -->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- CSS Bootstrap Calendario -->
        <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                	<a class="navbar-brand" href="?c=Home"><img src="assets/img/logo-nav.png">MVC</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="?c=Home">Home</a></li>
                        <li><a href="http://getbootstrap.com/examples/navbar-fixed-top/#about">About</a></li>
                        <li><a href="http://getbootstrap.com/examples/navbar-fixed-top/#contact">Contact</a></li>
                        <li><a href="?c=Alumnos">Alumnos</a></li>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="http://getbootstrap.com/examples/navbar-fixed-top/#">Action</a></li>
                                <li><a href="http://getbootstrap.com/examples/navbar-fixed-top/#">Another action</a></li>
                                <li><a href="http://getbootstrap.com/examples/navbar-fixed-top/#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="http://getbootstrap.com/examples/navbar-fixed-top/#">Separated link</a></li>
                                <li><a href="http://getbootstrap.com/examples/navbar-fixed-top/#">One more separated link</a></li>
                            </ul>
                        </li> 
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="glyphicon glyphicon-user"></i> Yo <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header"><?= libs\Session::get('usuario')->nombre ?></li>
                                <li><a href="?c=Auth&a=logout"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        
        <!-- Page Content -->
        <div class="container">
            