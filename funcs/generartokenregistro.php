<?php
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
    $sql= "INSERT INTO TOKEN (TOKEN,ACTIVO) VALUES ('$codigo',1)";
    $resultado = $mysqlihosting->query($sql);

    header('Location: http://portal-empleado/token_registro.php');
?>
    