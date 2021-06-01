<?php
    require_once('PermisosEmpleado.php');
    $objPermisos = new Permisos();
    $objPermisos->PermisosSistemas(51);

    $objPermisos->Sistema1;
    echo $objPermisos->Sistema2;
    echo $objPermisos->Sistema3;

    if ( $objPermisos->Sistema1==1)
    {
        echo "listo";
    }

    if ($_POST['Sistema_1']=='checked')
    {
        $sistema1='1';
    }
    //Sistema 2
    if ($_POST['Sistema_2']=='checked')
    {
        $sistema2='1';
    }
    //Sistema 3
    if ($_POST['Sistema_3']=='checked')
    {
        $sistema3='1';
    }
    //Rol 1
    if ($_POST['rol_1']=='checked')
    {
        $rol1='1';
    }
    //Rol 2
    if ($_POST['rol_2']=='checked')
    {
        $rol2='1';
    }
    //Rol 3
    if ($_POST['rol_3']=='checked')
    {
        $rol3='1';
    }

    //Accion 1
    if ($_POST['accion_1']=='checked')
    {
        $accion1='1';
    }

    require_once('conexion.php');
    $sql= "UPDATE empleado SET sistema_1='$sistema1', sistema_2='$sistema2', sistema_3='$sistema3', rol_1='$rol1', rol_2='$rol2', rol_3='$rol3', accion_1='$accion1'
           WHERE fk_enlace= '$enlace'";
    $resultado = $mysqli->query($sql);
    header('Location: http://portal-empleado/reporte.php');
?>