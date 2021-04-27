<?php
    require "conexion.php";
    session_start();

    if($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];
        


         $sql= "SELECT id, contrasena, tipo_usuario, fk_enlace, correo_electronico FROM empleado WHERE correo_electronico= '$email' ";

        $resultado = $mysqli->query($sql);

        $num = $resultado->num_rows;

        if($num>0){
            $row=$resultado->fetch_assoc();
            $contraseña_bd = $row['contrasena'];
            //contr_c (variable que significa Contraseña de cifrado, la cual con 'sha1' vamos a cifrar para proteger dicha contraseña)
            $contr_c = sha1($password);

            if($contraseña_bd == $contr_c){

                $_SESSION['id']=$row['id'];
                $_SESSION['nombre']=$row['nombre'];
                $_SESSION['apellidos']=$row['apellidos'];
                $_SESSION['tipo_usuario']=$row['tipo_usuario'];
                $_SESSION['rfc']=$row['rfc'];
                $_SESSION['fk_enlace']=$row['fk_enlace'];

                header("Location: nominas.php");

            }else{
                echo "La contraseña no existe o es incorrecta";
            }


        }else{
            echo "El Usuario no existe o es incorrecto";
        }
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal del Empleado - Iniciar Sesión</title>

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

        <!-- Outer Row -->
        <div class="row">

            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

                <div class="card card-signin my-5">
                    <div class="card-body">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tribunal Administrativo del Poder Judicial del Estado de Chiapas</h1>
                                        <h2 class="h5 text-gray-800 mb-4">Bienvenido al Portal del Empleado</h2>
                                    </div>
                                    <!--MANDAMOS LOS DATOS POR POST AL SERVIDOR PARA SER VALIDADOS-->
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name= "email" type ="text" aria-describedby="emailHelp"
                                                placeholder="Introduce tu Correo Electrónico" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                 name= "password" type ="password" placeholder="Contraseña" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>
                                                <button type="submit" class="btn btn-primary">
                                                    Iniciar Sesión
                                                </button>
                                    </form>

                                
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Olvidaste tu Contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registrarse.php">Registrar mi Cuenta</a>
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