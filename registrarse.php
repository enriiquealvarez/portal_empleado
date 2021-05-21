<?PHP
session_start();
require_once('func_registro.php');
require_once('funcs/token-function.php');
require_once('funcs/server-validation-function.php');

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['token']) && compare_token($_POST['token'])){
registro();
}
?>

<!DOCTYPE html>
<html lang="es">

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
				<h3>Registrarse</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><img src="https://tachiapas.gob.mx/wp-content/uploads/2021/05/logo-circular.png" width="80" height="80" ></i></span>
				
				</div>
			</div>
            <form action="<?PHP echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            
            <input type="hidden" name="token" value="<?php echo create_token(32) ?>">
			<div class="card-body">

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                    <?php 
                                        if(!empty($errores))
                                        {
                                            $resultado ='<div class="alert alert-danger"><ul>';
                                                foreach($errores as $error){
                                                    $resultado .= "<li>$error</li>";
                                                }
                                                $result .='</ul></div>'; 
                                                echo $resultado;                                          
                                        } 
                                    ?>
                                    </div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                        <input type="correo_electronico" class="form-control form-control-user" name="correo_electronico" placeholder="Correo Electrónico">
                    </div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <input type="password" class="form-control form-control-user" name="contrasena"  placeholder="Contraseña">
					</div>

                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-numer"></i></span>
						</div>
                        <input type="fk_enlace" class="form-control form-control-user" name="fk_enlace"  placeholder="Enlace">
					</div>
					<div class="row align-items-center remember">
						
					</div>
					<div class="form-group">
						<input type="submit" value="Registro" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿Ya estas Registrado?<a href="index.php">Iniciar Sesión</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
