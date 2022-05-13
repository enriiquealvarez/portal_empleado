<?php
	$title= 'Inicio';
	require_once('Clases/DatosDelEmpleado.php');	
    if($_POST)
	{        
		//Se accede a las funciones de la clase DatosDelEmpleado para obtener su información
		$objDatosEmpleado = new DatosDelEmpleado();
		$objDatosEmpleado->DatosInicoDeSesion($_POST['email'], $_POST['password']); 
		$objDatosEmpleado->Mensaje;
		if($objDatosEmpleado->ControlDeRespuesta>0)
		{
		?>
		<div center >
			<div class="alert alert-danger">
				<?php echo $objDatosEmpleado->Mensaje?>
			</div>	
		<?php
		}
	}
?>

<marquee bgcolor="#b59769" height="50" width="100%" scrolldelay="100" scrollamount="10" direction="left" loop="infinite">
<FONT FACE=arial COLOR=white SIZE=6>	
MAYO 2022.- Realiza tu declaración de Modificación Patrimonial, deberás contar con tu firma electrónica. En caso de no contar con ella ó no se encuentre vigente, acude al Área de Informática. 
¡Recuerda que es importante, cumplir con esta obligación!
</font>

<?php require_once('top.php');?>
</marquee>

</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown timer</title>

    <link rel="stylesheet" href="css/style.css">
</head>



<body>

    <section class="container_count">

        <h1>Días Restantes</h1>
        <p>Para realizar tu Declaración Patrimonial</p>

        <div class="charts">

            <div class="chart">
                <!-- un circulo inicial de fondo -->
                <div class="circle center-abs"></div>

                <!-- area para SVG -->

                <svg class="center-abs" width="150" height="150">
                    <!-- un segundo circulo en SVG con su ubicacion en coordenadas x,y y el radio de expansion -->
                    <circle class="outer" cx="75" cy="75" r="70" />
                </svg>

                <!-- etiqueta para el contador, en este caso el dia -->
                <span class="text center-abs" id="days"></span>
                <h3>Días</h3>
            </div>

            <div class="chart">
                <div class="circle center-abs"></div>
                <svg class="center-abs" width="150" height="150">
                    <circle class="outer" cx="75" cy="75" r="70" />
                </svg>
                <span class="text center-abs" id="hours"></span>
                <h3>Horas</h3>
            </div>

            <div class="chart">
                <div class="circle center-abs"></div>
                <svg class="center-abs" width="150" height="150">
                    <circle class="outer" cx="75" cy="75" r="70" />
                </svg>
                <span class="text center-abs" id="minutes"></span>
                <h3>Minutos</h3>
            </div>

            <div class="chart">
                <div class="circle center-abs"></div>
                <svg class="center-abs" width="150" height="150">
                    <circle class="outer" cx="75" cy="75" r="70" />
                </svg>
                <span class="text center-abs" id="seconds"></span>
                <h3>Segundos</h3>
            </div>

			
        </div>

    </section>

	<div class="container">
	<div class="d-flex justify-content-center h-90">
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
						<input name="Entrar" type="submit" value="Entrar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿Aún no estás registrado?<a href="registrarse.php">Registrarse</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="Recuperar-contrasena.php">¿Olvidaste tu contraseña??</a>
				</div>
			</div>
		</div>
	</div>
</div>

    
<script src="js/script.js"></script>
</body>
<footer class="navbar-dark text-center bg-dark fixed-bottom">
  <!-- Copyright -->
  <div class="navbar-text">Tribunal Administrativo del Poder Judicial del Estado de Chiapas | Todos los Derechos Reservados | Blvd. Belisario Domínguez No. 1713, Col. Xamaipak, Tuxtla Gutiérrez, Chiapas.
    <a class="text-white" href="https://www.tachiapas.gob.mx/">www.tachiapas.gob.mx</a>
  </div>
</footer>
</html>
