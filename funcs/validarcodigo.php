
<?php
require '../conexion.php';

    if(isset($_POST['BtnRecuperar']))
    {
      $IDEMPLEADO = $_POST['BtnRecuperar'];
      $nuevopass=$_POST['nuevopass'];
      $Codigo=$_POST['codigo'];


      $sql= "SELECT id, codigo FROM empleado WHERE id= '$IDEMPLEADO' LIMIT 1 ";
      $resultado = $mysqli->query($sql);
      $ResultadosEmpleado = $resultado->fetch_assoc();
      $CodigoBD= $ResultadosEmpleado['codigo'];

      if($Codigo==$CodigoBD)
      {
        $passEncry= sha1($nuevopass);
        $codigo=random_int(10000, 99999);
        $sql= "UPDATE empleado SET contrasena='$passEncry', codigo='$codigo' WHERE id= '$IDEMPLEADO' LIMIT 1 ";
        $resultado = $mysqli->query($sql);
        header('Location: http://portal-empleado/Mensajecambiocorrecto.php');
      }
      else{
        echo "<script>
        alert('El código es incorrecto intentalo de nuevo');
        window.location= 'http://portal-empleado/Recuperar-contrasena.php'
        </script>";
      }

    }
?> 