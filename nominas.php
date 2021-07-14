<?php
    session_start();
    $title='Nóminas';
    require_once('menu.php');
?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">  
    <link rel="stylesheet" href="plugins/animate.css/animate.css">
    <!-- Contenido -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tribunal Administrativo del Poder Judicial del Estado de Chiapas</h1>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> RFC: <?php echo $objDatosEmpleado->RFCEmpleado; ?> | ENLACE: <?php echo$objDatosEmpleado->EnlaceEmpleado; ?></h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                <form class="form-horizontal" action="descargaxml.php" name="form" method="POST">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <?php if($_SESSION['tipo_usuario']==1)
                                {?>
                                    <th>NOMBRE</th>
                                <?php
                                } 
                                ?>
                                <th>FECHA DE TIMBRADO</th>
                                <th>CONCEPTO DE NÓMINA</th>
                                <th>MENSAJE</th>
                                <th>XML</th>
                                <th>PDF</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <?php if($_SESSION['tipo_usuario']==1)
                                {?>
                                    <th>NOMBRE</th>
                                <?php
                                } 
                                ?>
                                <th>FECHA DE TIMBRADO</th>
                                <th>CONCEPTO DE NÓMINA</th>
                                <th>MENSAJE</th>
                                <th>XML</th>
                                <th>PDF</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php while($row = $objDatosEmpleado->resultadoArreglo->fetch_assoc()){ ?>
                                <tr>
                                <?php if($_SESSION['tipo_usuario']==1)
                                {?>
                                        <td><?php echo $row['Empleado'] ?></td>
                                <?php
                                } 
                                ?>
                                    <td><?php echo $row['cfdi_fecha_timbrado']?></td>
                                    <td><?php echo $row['nom_concepto']?></td>
                                    <td><?php echo $row['cfdi_mensaje']?></td>
                                    <td>
                                        <button type="submit" class="btn float-leff login_btn" name="descargamxl" value="<?php echo $row['id_cfdi']?>">
                                            <img src='media/xml.png' width="40" height="40" >
                                        </button>
                                    </td>
                                    <td> <!--Cambiando icono pdf.png-->
                                        <button type="submit" class="btn float-leff login_btn" name="descargapdf" value="<?php echo $row['id_cfdi']?>">
                                                <img src='media/pdf.png' width="40" height="40" >
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>     
 </div>
 </div>
<?php include_once('footer.php');?>