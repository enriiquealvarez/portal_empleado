<?php
    //Establecer conexión
    $mysqli=new mysqli("192.168.1.224", "portal-empleado", "TA2021&%$", "siga_administrativo");

    if(mysqli_connect_error()){
        echo 'Conexión Fallida: ', mysqli_connect_error();
        exit();
    }

?>