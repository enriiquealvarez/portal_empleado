<?php
    
    if(isset($_POST['BtnRecuperar']))
    {
        $idEmpleado = $_POST['BtnRecuperar'];    

        function GenerarToken($longitud)
        {
            $cadena = "%ABCDEFGHIJKLMNÑOPKRSTUVWXYZabcdefghijklmnñopqrstuvwxz0123456789/";
            $token = "";

            for($i = 0; $i < $longitud; $i++)
            {
                $token.=$cadena[rand(0,$longitud)];
            }
            return $token;
        }

        $codigo = GenerarToken(10);

        require "../Clases/conexion.php";
        $sql= "UPDATE empleado SET codigo='$codigo', token_activo=1 WHERE fk_enlace=$idEmpleado";
        $resultado = $mysqli->query($sql);

        header('Location: http://portal-empleado/reporte.php');
    }
?>
    
        