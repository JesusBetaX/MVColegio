<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/favicon.ico">

        <title>Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <style type="text/css">
            body {
                background-color: #f5f5f5;
                /*background-image: url(assets/img/git.png);*/
            }
            form {
                background: transparent;
                padding-left: 7px;
                padding-right: 7px;
            }
        </style>
    </head>
    <body>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Iniciar sesión
                        </div>
                        
                        <div class="panel-body">
                            <!-- Page Form -->
                            <form id="form" action="?c=Auth&a=Login" method="post">

                                <div class="form-group">
                                    <div class="text-center">
                                        <img class="img-thumbnail" src="assets/img/git.png" width="40%"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <input type="email" name="email" value="<?php echo $request->get('email'); ?>" class="form-control" placeholder="ejemplo@mail.com" data-validacion-tipo="requerido|email" autofocus>
                                    
                                    <?php // Muestra los messajes para los errores. ?>
                                    <?php if (array_key_exists('email', $errors)) : ?>
                                        <span class="help-block">
                                            <strong><?php echo $errors['email']; ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" data-validacion-tipo="requerido">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Entrar
                                    </button>
                                </div>

                                <div class="text-center">
                                    <a class="btn btn-link" href="#" onclick="javascript:return alert('¡Ups!\n\nmail:root@mvc.com\npass:abc1234')">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                </div>

                            </form>
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-sm btn-default" onclick="alert('¡ups!  :(')">
                                Crear cuenta
                            </a>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>

        <!-- jQuery Core -->
        <script src="assets/js/jquery.min.js"></script>  
        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- jQuery UI Script -->
        <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
        <!-- Validator -->
        <script src="assets/js/jquery-validator.js"></script>
        <!-- Scripts -->
        <script src="assets/js/custom.js"></script>
    </body>
</html>