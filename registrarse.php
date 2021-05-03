<?PHP
require_once('func_registro.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
registro();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de Empleado</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color:#702c44;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row">

            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

            <form action="<?PHP echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                <div class="card card-signin my-3">
                    <div class="card-body">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tribunal Administrativo del Poder Judicial del Estado de Chiapas</h1>
                                        <h2 class="h5 text-gray-800 mb-4">Bienvenido al Portal del Empleado | Registro de Empleado</h2>
                                    </div>
                                    <!--MANDAMOS LOS DATOS POR POST AL SERVIDOR PARA SER VALIDADOS-->
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="form-group">
                                        <input type="correo_electronico" class="form-control form-control-user" name="correo_electronico"
                                            required placeholder="Correo Electrónico">
                                        </div>
                                        <div class="form-group">
                                        <input type="contrasena" class="form-control form-control-user"
                                            name="contrasena" required placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                        <input type="fk_enlace" class="form-control form-control-user"
                                            name="fk_enlace" required placeholder="Enlace (lo consigues en el área de RH">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                                    Registrarse
                                        </button>
                                        <button type="submit" class="btn btn-danger">
                                                    Cancelar
                                        </button>
                                    </form>

                                
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Olvidaste tu Contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registrarse.php">Iniciar Sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


<!--
<body style="background-color:#702c44;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg  my-5">

        

                <form action="<?PHP echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-800 mb-5">Portal del Empleado - Crear una cuenta</h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <div class="col-sm-6 mb-6">
                                        <input type="correo_electronico" class="form-control form-control-user" name="correo_electronico"
                                            required placeholder="Correo Electrónico">
                                    </div>
                          
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6 mb-3">
                                        <input type="contrasena" class="form-control form-control-user"
                                            name="contrasena" required placeholder="Contraseña">
                                    </div>
                                   
                                </div>
                                <div class="form-group">  
                                    <div class="col-sm-6">
                                        <input type="fk_enlace" class="form-control form-control-user"
                                            name="fk_enlace" required placeholder="Enlace">
                                    </div>                                  
                                </div>
                                <button type="submit" class="btn btn-primary">
                                                    Registrarse
                                </button>
                                <button type="submit" class="btn btn-danger">
                                                    Cancelar
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="index.php">¿Ya estás registrado? Inicia Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
-->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>