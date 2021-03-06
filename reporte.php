<?php
    //Icluir las librerias, clases y documentos php
    session_start();
    $title='Reportes';
    require_once('Clases/DatosDelEmpleado.php');
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
    <!-- Contenido de la página después del menu -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tribunal Administrativo del Poder Judicial del Estado de Chiapas</h1>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> RFC: <?php echo $objDatosEmpleado->RFCEmpleado; ?> | ENLACE: <?php echo$objDatosEmpleado->EnlaceEmpleado; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="form-horizontal" action="funcs/generartoken.php" name="form" method="POST">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ENLACE</th>
                                <th>EMPLEADO</th>
                                <th>TOKEN</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ENLACE</th>
                                <th>EMPLEADO</th>
                                <th>TOKEN</th>
                                <th>ACCIONES</th>
                            </tr>
                         </tfoot>
                        <tbody>
                        <?php $reporte = $mysqli->query($sqlreporte); ?>
                            <?php while($row = $reporte->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $row['Enlace'] ?></td>
                                    <td><?php echo $row['Empleado']?></td>
                                    <td><?php echo $row['Token']?></td>
                                    <td>
                                    <?php
                                    if($objDatosEmpleado->Accion1==1)
                                    {
                                    ?>
                                        <button type="submit" class="btn float-leff login_btn" name="BtnRecuperar" value="<?php echo $row['Enlace'] ?>">
                                            <img src='media/token.png' width="30" height="30">
                                        </button>
                                    <?php
                                    }
                                    ?> 
                                    </td>
                                </tr>
                            <?php 
                            } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php require_once('footer.php')?>