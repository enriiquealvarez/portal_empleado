<?php

    require "../conexion.php";

    if(!empty($_POST))
    {
       $correo=$_POST['correo'];
       $sql= "SELECT id, contrasena, tipo_usuario, fk_enlace, correo_electronico FROM empleado WHERE correo_electronico= '$correo' LIMIT 1 ";
       $resultado = $mysqli->query($sql);
       $ResultadosEmpleado = $resultado->fetch_assoc();
       $id_empleado= $ResultadosEmpleado['id'];
       $correobd= $ResultadosEmpleado['correo_electronico'];


        if($correo==$correobd)
        {
            header('Location: http://portal-empleado/Restablecer-password.php?empleado='.$id_empleado);
        }
        else{
            echo "<script>
                    alert('El correo no existe');
                    window.location= 'http://portal-empleado/Recuperar-contrasena.php'
                 </script>";
        }
    } 
?>