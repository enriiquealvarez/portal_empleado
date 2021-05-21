<?php
    //Establecer conexión
    $mysqli=new mysqli("192.168.1.224", "portal-empleado", "TA2021&%$", "siga_administrativo");

    //conexion local
    $mysqlilocal=new mysqli("192.168.1.121", "declaraciones", "TA2020Chiapas", "db_declaraciones");
    if(mysqli_connect_error()){
        echo 'Conexión Fallida: ', mysqli_connect_error();
        exit();
    }

?>