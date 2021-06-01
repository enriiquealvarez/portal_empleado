<?php

    //Icluir las librerias, clases y documentos php
    session_start();
    require_once('conexion.php');
    require_once('Clases/DatosDelEmpleado.php');
    require_once('menu.php');


    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }

    $tipo_usuario =$_SESSION['tipo_usuario'];
    $id = $_SESSION['id'];
    $enlace = $_SESSION['fk_enlace'];
    
    //Validación para comprobar si es un Tipo_Usuario =1 (admin), de lo contrario si es un Tipo_Usuario=2 (usuario)
    if($tipo_usuario==1){
        $where="WHERE fk_empleado=$enlace";
    }else if ($tipo_usuario==2){
    $where = "WHERE fk_empleado=$enlace";
    }
    
    //Validación para obtener todos los datos siendo ADMIN o individuales siendo USUARIO
    if ($tipo_usuario==1){
        $sql= "SELECT id_cfdi, emp_rfc, fk_empleado, CONVERT(CONCAT(emp_nombres, ' ', emp_paterno, ' ', emp_materno) USING utf8) 
        AS empleado, cfdi_fecha_timbrado, cfdi_mensaje, nom_concepto, cfdi_xml_cfdi, cfdi_pdf_timbrado FROM pri_cfdi 
        INNER JOIN pri_nomina  ON fk_nomina = id_nom_nomina 
        INNER JOIN pri_empleado ON fk_empleado = id_emp_empleado where cfdi_cancelado=0";

        $resultado = $mysqli->query($sql);
        $ResultadosEmpleado = $resultado->fetch_assoc();

        $NombreEmpleado= $ResultadosEmpleado['empleado'];
        $EnlaceEmpleado= $ResultadosEmpleado['fk_empleado'];
        $RFCEmpleado= $ResultadosEmpleado['emp_rfc'];

    }
    
    else if($tipo_usuario==2){
        $sql= "SELECT id_cfdi, emp_rfc, fk_empleado, CONVERT(CONCAT(emp_nombres, ' ', emp_paterno, ' ', emp_materno) USING utf8) 
        AS empleado, cfdi_fecha_timbrado, cfdi_mensaje, nom_concepto, cfdi_xml_cfdi, cfdi_pdf_timbrado FROM pri_cfdi 
        INNER JOIN pri_nomina  ON fk_nomina = id_nom_nomina 
        INNER JOIN pri_empleado ON fk_empleado = id_emp_empleado where cfdi_cancelado=0 AND fk_empleado=$enlace";
        $resultado = $mysqli->query($sql);
        $ResultadosEmpleado = $resultado->fetch_assoc();

        $NombreEmpleado= $ResultadosEmpleado['empleado'];
        $EnlaceEmpleado= $ResultadosEmpleado['fk_empleado'];
        $RFCEmpleado= $ResultadosEmpleado['emp_rfc'];
    }

    $sqlreporte= "SELECT u.id, u.link As Enlace, CONVERT(CONCAT(u.nombre, ' ',u.paterno, ' ',u.materno) USING utf8) AS Empleado, IF(s.closed=2, 'Terminada', 'Pendiente') As Estado
    FROM users u
    INNER JOIN statements s ON u.id=s.user_id ORDER BY s.closed DESC";

    
    //Se accede a las funciones de la clase DatosDelEmpleado para obtener su información
    $objDatosEmpleado = new DatosDelEmpleado();

    //Se accede a las funciones de la clase PermisosEmpleado para obtener los permsiso del sistema
    $objDatosEmpleado-> PermisosUsoSistema($enlace);
?>
    <!-- Contenido de la página después del menu -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tribunal Administrativo del Poder Judicial del Estado de Chiapas</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> RFC: <?php echo $RFCEmpleado; ?> | ENLACE: <?php echo $EnlaceEmpleado; ?></h6>

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
    <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Tribunal Administrativo del Poder Judicial del Estado de Chiapas &copy; Todos los Derechos Reservados</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Realmente deseas salir del Sistema?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div> 
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="index.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>