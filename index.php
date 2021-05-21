<?php
    require "conexion.php";
    session_start();
    if($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
         $sql= "SELECT id, contrasena, tipo_usuario, fk_enlace, correo_electronico FROM empleado WHERE correo_electronico= '$email' ";

        $resultado = $mysqli->query($sql);

        $num = $resultado->num_rows;

        if($num>0){
            $row=$resultado->fetch_assoc();
            $contraseña_bd = $row['contrasena'];
            //contr_c (variable que significa Contraseña de cifrado, la cual con 'sha1' vamos a cifrar para proteger dicha contraseña)
            $contr_c = sha1($password);

            if($contraseña_bd == $contr_c){

                $_SESSION['id']=$row['id'];
                $_SESSION['nombre']=$row['nombre'];
                $_SESSION['apellidos']=$row['apellidos'];
                $_SESSION['tipo_usuario']=$row['tipo_usuario'];
                $_SESSION['rfc']=$row['rfc'];
                $_SESSION['fk_enlace']=$row['fk_enlace'];

                header("Location: nominas.php");

            }else{
                echo "La contraseña no existe o es incorrecta";
            }


        }else{
            echo "El Usuario no existe o es incorrecto";
        }
    }

?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Portal del Empleado</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Iniciar Sesión</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><img src="https://tachiapas.gob.mx/wp-content/uploads/2021/05/logo-circular.png" width="80" height="80" ></i></span>
				
				</div>
			</div>
			<div class="card-body">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                        <input type="text" class="form-control" name= "email" type ="text" aria-describedby="emailHelp" placeholder="Correo" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name= "password" type ="password" placeholder="Contraseña" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Recordar mis Datos
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿Aún no estás registrado?<a href="registrarse.php">Registrarse</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="Recuperar-contrasena.php">¿Olvidaste tu contraseña?</a>
				</div>
			</div>
		</div>
	</div>
</div>

<footer class="navbar-dark text-center bg-dark fixed-bottom">
  <!-- Copyright -->
  <div class="navbar-text">Tribunal Administrativo del Poder Judicial del Estado de Chiapas | Todos los Derechos Reservados | Blvd. Belisario Domínguez No. 1713, Col. Xamaipak, Tuxtla Gutiérrez, Chiapas.
    <a class="text-white" href="https://www.tachiapas.gob.mx/">www.tachiapas.gob.mx</a>
  </div>
</footer>

</body>
</html>
