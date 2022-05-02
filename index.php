 
<?php require_once('top.php');?>

<marquee bgcolor="#b59769" height="50" width="100%" scrolldelay="100" scrollamount="10" direction="left" loop="infinite">
<FONT FACE=arial COLOR=white SIZE=6>	
MAYO 2022.- Realiza tu declaración de Modificación Patrimonial, deberás contar con tu firma electrónica. En caso de no contar con ella, acude al Área de Informática. 
¡Recuerda que es importante, cumplir con esta obligación!
</font>
</marquee>


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
