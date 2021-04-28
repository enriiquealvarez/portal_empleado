<?php
    session_start();
    require 'conexion.php';
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }

    $nombre = $_SESSION['nombre'];
    $apellidos= $_SESSION['apellidos'];
    $nombre_completo= $nombre . ' ' . $apellidos;
    $tipo_usuario =$_SESSION['tipo_usuario'];
    $id = $_SESSION['id'];
    $rfc= $_SESSION['rfc'];
    $enlace = $_SESSION['fk_enlace'];


    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    
    //Validación para comprobar si es un Tipo_Usuario =1 (admin), de lo contrario si es un Tipo_Usuario=2 (usuario)
    if($tipo_usuario==1){
        $where="WHERE fk_empleado=$enlace";
    }else if ($tipo_usuario==2){
    $where = "WHERE fk_empleado=$enlace";
    }
    
    //Validación para obtener todos los datos siendo ADMIN o individuales siendo USUARIO
    if ($tipo_usuario==1){
        $sql= "SELECT id_cfdi, fk_empleado, CONVERT(CONCAT(emp_nombres, ' ', emp_paterno, ' ', emp_materno) USING utf8) 
        AS empleado, cfdi_fecha_timbrado, cfdi_mensaje, nom_concepto, cfdi_xml_cfdi, cfdi_pdf_timbrado FROM pri_cfdi 
        INNER JOIN pri_nomina  ON fk_nomina = id_nom_nomina 
        INNER JOIN pri_empleado ON fk_empleado = id_emp_empleado";

        $resultado = $mysqli->query($sql);

    }
    
    else if($tipo_usuario==2){
    $sql= "SELECT id_cfdi, fk_empleado, CONVERT(CONCAT(emp_nombres, ' ', emp_paterno, ' ', emp_materno) USING utf8) 
    AS empleado, cfdi_fecha_timbrado, cfdi_mensaje, nom_concepto, cfdi_xml_cfdi, cfdi_pdf_timbrado FROM pri_cfdi 
    INNER JOIN pri_nomina  ON fk_nomina = id_nom_nomina INNER JOIN pri_empleado ON fk_empleado = id_emp_empleado where fk_empleado=$enlace";
    $resultado = $mysqli->query($sql);
    }
    ?>

<!DOCTYPE html>

<html lang="es">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal del Empleado</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">Portal del Empleado</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa fa-table"></i>
                    <span>Nóminas</span></a>
            </li>
              <!-- CONTROL DE TOKEN PARA LINK DECLARACIONES -->
              <li class="nav-item active">

                <?php switch ($enlace) {
                case 1:?>
                    <a class="nav-link" href="http://declaraciones/auth/MS0xZGFkbSYlLTMtNA==">
                <?php
                break;

                case 2:?>
                    <a class="nav-link" href="http://declaraciones/auth/Mi0yZGFkbSYlLTMtNA=="> 
                <?php
                break;

                case 4:?>
                    <a class="nav-link" href="http://declaraciones/auth/NC00ZGFkbSYlLTMtNA=="> 
                <?php
                break;

                case 5:?>
                    <a class="nav-link" href="http://declaraciones/auth/NS01ZGFkbSYlLTMtNA=="> 
                <?php
                break;

                case 6:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 7:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 8:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 9:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 10:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 11:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 12:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 13:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 14:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 15:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 16:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 17:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 18:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 19:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 20:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 21:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 23:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 24:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 25:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 27:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 28:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 29:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 30:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 31:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 32:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 33:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 34:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 35:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 36:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 38:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 41:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 43:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 44:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 45:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 46:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 47:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 48:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 50:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 51:?>
                    <a class="nav-link" href="http://declaraciones/auth/NTEtNTFkYWRtJiUtMy00"> 
                <?php
                break;
                case 52:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 63:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 66:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 68:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 70:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 71:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 72:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 73:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 74:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 75:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 76:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 78:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 79:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 80:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 81:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 82:?>
                    <a class="nav-link" href="http://declaraciones/auth/MS0xZGFkbSYlLTMtNA==">
                <?php
                break;

                case 83:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 84:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 85:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 86:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 87:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 88:?>
                    <a class="nav-link" href=""> 
                <?php
                break;

                case 89:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 90:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 91:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 96:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 98:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 99:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 100:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 101:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 102:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 103:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 105:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 106:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 107:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 108:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 109:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 110:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 111:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 115:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 116:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 118:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 119:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 120:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 121:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 123:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 124:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 125:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 126:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 127:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 128:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 129:?>
                    <a class="nav-link" href=""> 
                <?php
                break;
                case 122:?>
                    <a class="nav-link" href="http://declaraciones/auth/MTIyLTEyMmRhZG0mJS0zLTQ="> 
                <?php
                break;
                }
                ?>

                <i class="fa fa-table"></i>
                <span>Declaraciones</span></a>
                </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre_completo; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tribunal Administrativo del Poder Judicial del Estado de Chiapas</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">RFC: <?php echo $rfc; ?> | ENLACE: <?php echo $enlace; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form class="form-horizontal" action="descargaxml.php" name="form" method="POST">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>FECHA DE TIMBRADO</th>
                                            <th>CONCEPTO DE NÓMINA</th>
                                            <th>MENSAJE</th>
                                            <th>XML</th>
                                            <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>NOMBRE</th>
                                            <th>FECHA DE TIMBRADO</th>
                                            <th>CONCEPTO DE NÓMINA</th>
                                            <th>MENSAJE</th>
                                            <th>XML</th>
                                            <th>PDF</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($row = $resultado->fetch_assoc()){ ?>
                                            <tr>
                                                    <td><?php echo $row['empleado'] ?></td>
                                                    <td><?php echo $row['cfdi_fecha_timbrado']?></td>
                                                    <td><?php echo $row['nom_concepto']?></td>
                                                    <td><?php echo $row['cfdi_mensaje']?></td>

                                                    
                                                    <td>
                                                        <button type="submit" name="descargamxl" value="<?php echo $row['id_cfdi']?>">
                                                            <img src='media/xml.png' width="40" height="40" >
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="descargapdf" value="<?php echo $row['id_cfdi']?>">
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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