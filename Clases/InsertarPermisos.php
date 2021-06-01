<?php 
   
    $sistema1='0';
    $sistema2='0';
    $sistema3='0';
    $sistema4='0';
    $sistema5='0';
    $sistema6='0';
    $sistema7='0';
    $sistema8='0';

    $rol1='0';
    $rol2='0';
    $rol3='0';
    $rol4='0';
    $rol5='0';
    $rol6='0';
    $rol7='0';
    $rol8='0';

    $accion1='0';
    $accion1='0';

    if(isset($_POST['BtnGuardar']))
    {
        //Enlace del Empleado
        $enlace = $_POST['BtnGuardar'];

        //Sistema 1
        if(isset($_POST['Sistema_1']))
        {
            $sistema1='1';
        }
        //Sistema 2
        if(isset($_POST['Sistema_2']))
        {
            $sistema2='1';
        }
        //Sistema 3
        if(isset($_POST['Sistema_3']))
        {
            $sistema3='1';
        }

        //Rol 1
        if(isset($_POST['rol_1']))
        {
            $rol1='1';
        }
        //Rol 2
        if(isset($_POST['rol_2']))
        {
            $rol2='1';
        }
        
        //Rol 3
        if(isset($_POST['rol_3']))
        {
            $rol3='1';
        }

        
        //Accion 1
        if(isset($_POST['accion_1']))
        {
            $accion1='1';
        }

        require_once('conexion.php');
        $sql= "UPDATE empleado SET sistema_1='$sistema1', sistema_2='$sistema2', sistema_3='$sistema3', rol_1='$rol1', rol_2='$rol2', rol_3='$rol3', accion_1='$accion1'
               WHERE fk_enlace= '$enlace'";
        $resultado = $mysqli->query($sql);
        header('Location: http://portal-empleado/reporte.php');

    }

?>