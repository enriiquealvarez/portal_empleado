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

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">

                <!-- Nested Row within Card Body -->


                <form action="<?PHP echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-800 mb-3">Portal del Empleado - Crear una cuenta</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="correo_electronico" class="form-control form-control-user" name="correo_electronico"
                                            placeholder="Correo Electrónico">
                                    </div>
                          
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="contrasena" class="form-control form-control-user"
                                            name="contrasena" placeholder="Contraseña">
                                    </div>
                                   
                                </div>
                                <div class="form-group row">  
                                    <div class="col-sm-6">
                                        <input type="fk_enlace" class="form-control form-control-user"
                                            name="fk_enlace" placeholder="Enlace">
                                    </div>                                  
                                </div>
                                   <button type="submit" name="registro">                    
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>