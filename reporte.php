<?php
    //Icluir las librerias, clases y documentos php
    session_start();
    $title='Reportes';
    require_once('Clases/DatosDelEmpleado.php');
    require_once('menu.php');
    
?>
    <!-- Contenido de la página después del menu -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tribunal Administrativo del Poder Judicial del Estado de Chiapas</h1>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> RFC: <?php echo $objDatosEmpleado->RFCEmpleado; ?> | ENLACE: <?php echo$objDatosEmpleado->EnlaceEmpleado; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="form-horizontal" action="permisosuser.php" name="form" method="POST">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ENLACE</th>
                                <th>EMPLEADO</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ENLACE</th>
                                <th>EMPLEADO</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                         </tfoot>
                        <tbody>
                        <?php $reporte = $mysqlilocal->query($sqlreporte); ?>
                            <?php while($row = $reporte->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $row['Enlace'] ?></td>
                                    <td><?php echo $row['Empleado']?></td>
                                    <td><?php echo $row['Estado']?></td>
                                    <td>
                                    <?php
                                    if($objDatosEmpleado->Accion1==1)
                                    {
                                    ?>
                                        <button type="submit" class="btn float-leff login_btn" name="BtnRecuperar" value="<?php echo $row['Enlace'] ?>">
                                            <img src='media/editar_user.png' width="30" height="30">
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