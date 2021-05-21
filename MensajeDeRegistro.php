<?php
	ob_start();
	header('refresh 2; url=index.php');
	ob_end_flush();
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
	<meta http-equiv="refresh" content="5;url=http://portal-empleado/">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
      <h3>Portal del Empleado</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><img src="https://tachiapas.gob.mx/wp-content/uploads/2021/05/logo-circular.png" width="80" height="80" ></i></span>
				
			</div>
			</div>
			<div class="card-body">
        <div class="text-center">
          <div class="alert alert-success"><ul>
            <h1 class="h4 text-gray-900 mb-2">¡Gracias por completar tu registro!</h1>           
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					<a href="index.php">Iniciar Sesión</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
