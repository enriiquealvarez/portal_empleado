<?php 

require_once('funcs/token-function.php');
require_once('funcs/server-validation-function.php');

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['token']) && compare_token($_POST['token'])){
   
    $fields = [
        'correo_electronico' => 'Correo Electrónico',
        'contrasena' => 'Contraseña',
        'fk_enlace' => 'Enlace'
    ];

    $errores = validar($fields);
    if(empty($errores)){
        registro();
    }
}

function registro(){
    require_once('conexion.php');

    $email = limpiar ($_POST['correo_electronico']);
    $contraseña = $_POST['contrasena'];
    $contr_encrip = sha1($contraseña);
    $enlace = limpiar ($_POST['fk_enlace']);

    $dec = $mysqli -> prepare("INSERT INTO empleado(CORREO_ELECTRONICO, CONTRASENA, FK_ENLACE) 
    VALUES (?,?,?)");
    $dec -> bind_param("ssi", $email, $contr_encrip, $enlace);
    $dec ->execute();
    $result =$dec->affected_rows;
    $dec -> close();
    $mysqli -> close();

    if($result === 1)
    {
        $_SESSION['correo_electronico']=$email;
<<<<<<< HEAD
        header('Location: index.php');
    }

=======
        ?>

        <html>
            
            <div class="card-body">
                <div class="text-center">     
                    <div class="alert alert-success" role="alert">!REGISTRO COMPLETADO! <a href="index.php" class="alert-link">Iniciar Sesión</a> </div>
                </div>
            </div>
        </div>
       
        <?php

        //header ('Location: index.php');

    }

>>>>>>> 1bdae1dfdfd18177ef04f1cdea3286a69f6a05f9
}

function limpiar($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}


?>
