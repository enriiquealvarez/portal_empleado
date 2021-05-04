<?PHP
session_start();
require_once('func_registro.php');
require_once('funcs/token-function.php');
require_once('funcs/server-validation-function.php');

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['token']) && compare_token($_POST['token'])){
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
<!--se hacen correcciones-->
            <form action="<?PHP echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            
            <input type="hidden" name="token" value="<?php echo create_token(32) ?>">

                <div class="card card-signin my-3">
                    <div class="card-body">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> Tribunal Administrativo del Poder Judicial del Estado de Chiapas</h1>
                                        <h2 class="h5 text-gray-800 mb-4">Bienvenido al Portal del Empleado  Registro de Empleado</h2>
                                    </div>
                                    <?php if(!empty($errores)){echo 'Error';} ?>
                                    <!--MANDAMOS LOS DATOS POR POST AL SERVIDOR PARA SER VALIDADOS-->
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      
                                        <div class="form-group">
                                        <input type="correo_electronico" class="form-control form-control-user" name="correo_electronico"
                                             placeholder="Correo Electrónico">
                                        </div>
                                        <div class="form-group">
                                        <input type="contrasena" class="form-control form-control-user"
                                            name="contrasena"  placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                        <input type="fk_enlace" class="form-control form-control-user"
                                            name="fk_enlace"  placeholder="Enlace (lo consigues en el área de RH)">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                                    Registrarse
                                        </button>
                                        <button type="submit" class="btn btn-danger" >
                                                    Cancelar
                                        </button>
                                    </form>

                                
                                    <hr>
                                    <!--
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Olvidaste tu Contraseña?</a>
                                    </div>
                                    -->
                                    <div class="text-center">
                                    <a class="small" href="index.php">¿Ya estás registrado? Inicia Sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>