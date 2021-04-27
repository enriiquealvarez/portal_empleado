<?php 
//Comentario Ing. Enrique Alvarez
function registro(){
    require_once('conexion.php');
 //$errores = [];

    $email = limpiar ($_POST['correo_electronico']);
    $contraseña = $_POST['contrasena'];
    $contr_encrip = sha1($contraseña);
    $enlace = limpiar ($_POST['fk_enlace']);

 // if(!empty($errores)){
  //return $errores;
    
    $dec = $mysqli -> prepare("INSERT INTO empleado(CORREO_ELECTRONICO, CONTRASENA, FK_ENLACE) 
    VALUES (?,?,?)");
    $dec -> bind_param("ssi", $email, $contr_encrip, $enlace);
        
    if($dec -> execute()){
              // $_SESSION['correo_electronico']= $email;
        header ('Location: index.php');
    }
    $dec -> close();
    $mysqli -> close();
    /*
    if (!$sentencia->execute()) {
    echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
    }
    */
    /*else{
        $errores[]= 'Estamos experimentando problemas técnicos y no podemos crear tu usuario en este momento. Por favor intentalo de nuevo más tarde.';
    }

    return $errores;
*/
}

function limpiar($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}



/*
function duplicidad ($con){
    $errores = [];

    $enlace = limpiar($_POST['fk_enlace']);
    $email = limpiar($_POST['correo_electronico']);

    $dec = $con->prepare("SELECT 'correo_electronico', 'contrasena', 'fk_enlace' FROM empleado WHERE 'id'=? OR 'correo_electronico'=?");
    $dec -> bind_param('ss',$enlace, $email);
    $dec -> execute();
    $resultado = $dec -> get_result();
    $cantidad = mysqli_num_row($resultado);
    $linea = $resultado -> fetch_assoc();
    $dec -> free_result();
    $dec -> close();

    if($cantidad >0){
        if($_POST['correo_electronico']==$linea['correo_electronico']){
            $errores[]='El CORREO ELECTRÓNICO no está disponble.';
            
        }
        if($_POST['pk_enlace']==$linea['pk_enlace']){
            $errores[]='El número de ENLACE no está disponble.';
            
        }
    }
    return $errores;
}
*/

?>