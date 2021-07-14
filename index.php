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
 
<?php require_once('top.php');?>
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
						<input name="Entrar" type="submit" value="Entrar" class="btn float-right login_btn">
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
