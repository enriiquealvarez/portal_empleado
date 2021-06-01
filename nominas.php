<?php
    session_start();
    $title='Portal del Empleado | Nóminas';
    require_once('conexion.php');
    require_once('menu.php');

    $enlace = $_SESSION['fk_enlace'];

    //Validación para obtener todos los datos siendo ADMIN o individuales siendo USUARIO
    if ($_SESSION['tipo_usuario']==1)
    {
        //Se accede a las funciones de la clase DatosDelEmpleado para obtener su información
        $objDatosEmpleado = new DatosDelEmpleado();
        $objDatosEmpleado->DatosTodosLosEmpleados();
        $NombreEmpleado=$objDatosEmpleado->NombreEmpleado;
        $EnlaceEmpleado=$objDatosEmpleado->EnlaceEmpleado;
        $RFCEmpleado=$objDatosEmpleado->FCEmpleado;
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
    ?>


                <!-- Begin Page Content -->
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
                                        <?php while($objDatosEmpleado->resultadoArreglo){ ?>
                                            <tr>
                                            <?php if($tipo_usuario==1)
                                            {?>
                                                    <td><?php echo $row['empleado'] ?></td>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
                </div>
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
                    <button class="btn btn-primary" type="submit" name="logout" >Cerrar Sesión</button>
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