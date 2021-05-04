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

    if($result === 1){
        $_SESSION['correo_electronico']=$email;
        header ('Location: index.php');

    }


}

function limpiar($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}


?>