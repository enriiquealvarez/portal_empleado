<?php

    $mysqli=new mysqli("192.168.1.224", "portal-empleado", "TA2021&%$", "siga-administrativo");

    if(mysqli_connect_error()){
        echo 'Conexión Fallida: ', mysqli_connect_error();
        exit();
    }else{
        echo "conexion exitosa";
    }

?>