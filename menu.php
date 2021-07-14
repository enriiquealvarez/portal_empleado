<?php
    require_once('conexion.php');
    require_once('Clases/DatosDelEmpleado.php');
    require_once('top.php');
    $objDatosEmpleado = new DatosDelEmpleado();

    //Validación para obtener todos los datos siendo ADMIN o individuales siendo USUARIO
    if ($_SESSION['tipo_usuario']==1)
    {        
        $objDatosEmpleado-> DatosTodosLosEmpleados();
    }
    else if($_SESSION['tipo_usuario']==2)
    {
        $objDatosEmpleado->DatosEmpleadoNominas($_SESSION['fk_enlace']);
    }

    //Se obtiene los datos del empleado, para saber el estado de la declaracion (reporte)
    $sqlreporte= "SELECT u.id, u.link As Enlace, CONVERT(CONCAT(u.nombre, ' ',u.paterno, ' ',u.materno) USING utf8) AS Empleado, IF(s.closed=2, 'Terminada', 'Pendiente') As Estado
    FROM users u
    INNER JOIN statements s ON u.id=s.user_id ORDER BY s.closed DESC";

    //Se accede a las funciones de la clase PermisosEmpleado para obtener los permsiso del sistema
    $objDatosEmpleado-> PermisosUsoSistema($_SESSION['fk_enlace']);
    $objDatosEmpleado-> DatosResguardoEquiposInformaticos($_SESSION['fk_enlace']);
?>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #6c2d43;" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3">Portal del Empleado</div>
            </a>

            <!-- Permiso para ver -->
            <hr class="sidebar-divider">
                <li class="nav-item active">
                    <a class="nav-link" href="nominas.php">
                        <i class="fa fa-table"></i>
                        <span>Nóminas</span>
                    </a>
                </li>
            
              <!-- CONTROL DE TOKEN PARA LINK DECLARACIONES, SE CONTROLA MEDIANTE (1) SI TIENE PERMISO PARA VER EL SISTEMA, (2) POR MEDIO DEL ENLANCE SE DIRIGE SI LINK -->
              <li class="nav-item active">
              <?php
                if($objDatosEmpleado->Sistema2==1)
                {?>
                    <?php switch ($_SESSION['fk_enlace']) {
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
                        <a class="nav-link" href="http://declaraciones/auth/Ni02ZGFkbSYlLTMtNA=="> 
                    <?php
                    break;

                    case 7:?>
                        <a class="nav-link" href="http://declaraciones/auth/Ny03ZGFkbSYlLTMtNA=="> 
                    <?php
                    break;

                    case 8:?>
                        <a class="nav-link" href="http://declaraciones/auth/OC04ZGFkbSYlLTMtNA=="> 
                    <?php
                    break;

                    case 9:?>
                        <a class="nav-link" href="http://declaraciones/auth/OS05ZGFkbSYlLTMtNA=="> 
                    <?php
                    break;
                    case 10:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTAtMTBkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 11:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTEtMTFkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 12:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTItMTJkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 13:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTMtMTNkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 14:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTQtMTRkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 15:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTUtMTVkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 16:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTYtMTZkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 17:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTctMTdkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 18:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTgtMThkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 19:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTktMTlkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 20:?>
                        <a class="nav-link" href="http://declaraciones/auth/MjAtMjBkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 21:?>
                        <a class="nav-link" href="http://declaraciones/auth/MjEtMjFkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 23:?>
                        <a class="nav-link" href="http://declaraciones/auth/MjMtMjNkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 24:?>
                        <a class="nav-link" href="http://declaraciones/auth/MjQtMjRkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 25:?>
                        <a class="nav-link" href="http://declaraciones/auth/MjUtMjVkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 27:?>
                        <a class="nav-link" href="http://declaraciones/auth/MjctMjdkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 28:?>
                        <a class="nav-link" href="http://declaraciones/auth/MjgtMjhkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 29:?>
                        <a class="nav-link" href="http://declaraciones/auth/MjktMjlkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 30:?>
                        <a class="nav-link" href="http://declaraciones/auth/MzAtMzBkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 31:?>
                        <a class="nav-link" href="http://declaraciones/auth/MzEtMzFkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 32:?>
                        <a class="nav-link" href="http://declaraciones/auth/MzItMzJkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 33:?>
                        <a class="nav-link" href="http://declaraciones/auth/MzMtMzNkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 34:?>
                        <a class="nav-link" href="http://declaraciones/auth/MzQtMzRkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 35:?>
                        <a class="nav-link" href="http://declaraciones/auth/MzUtMzVkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 36:?>
                        <a class="nav-link" href="http://declaraciones/auth/MzYtMzZkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 38:?>
                        <a class="nav-link" href="http://declaraciones/auth/MzgtMzhkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 41:?>
                        <a class="nav-link" href="http://declaraciones/auth/NDEtNDFkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 43:?>
                        <a class="nav-link" href="http://declaraciones/auth/NDMtNDNkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 44:?>
                        <a class="nav-link" href="http://declaraciones/auth/NDQtNDRkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 45:?>
                        <a class="nav-link" href="http://declaraciones/auth/NDUtNDVkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 46:?>
                        <a class="nav-link" href="http://declaraciones/auth/NDYtNDZkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 47:?>
                        <a class="nav-link" href="http://declaraciones/auth/NDctNDdkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 48:?>
                        <a class="nav-link" href="http://declaraciones/auth/NDgtNDhkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 49:?>
                        <a class="nav-link" href="http://declaraciones/auth/NDktNDlkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 50:?>
                        <a class="nav-link" href="http://declaraciones/auth/NTAtNTBkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 51:?>
                        <a class="nav-link" href="http://declaraciones/auth/NTEtNTFkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 52:?>
                        <a class="nav-link" href="http://declaraciones/auth/NTItNTJkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 63:?>
                        <a class="nav-link" href="http://declaraciones/auth/NjMtNjNkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 66:?>
                        <a class="nav-link" href="http://declaraciones/auth/NjYtNjZkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 68:?>
                        <a class="nav-link" href="http://declaraciones/auth/NjgtNjhkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 70:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzAtNzBkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 71:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzEtNzFkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 72:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzItNzJkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 73:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzMtNzNkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 74:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzQtNzRkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 75:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzUtNzVkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 76:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzYtNzZkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 78:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzgtNzhkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 79:?>
                        <a class="nav-link" href="http://declaraciones/auth/NzktNzlkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 80:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODAtODBkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 81:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODEtODFkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 82:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODItODJkYWRtJiUtMy00">
                    <?php
                    break;

                    case 83:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODMtODNkYWRtJiUtMy00"> 
                    <?php
                    break;

                    case 84:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODQtODRkYWRtJiUtMy00"> 
                    <?php
                    break;

                    case 85:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODUtODVkYWRtJiUtMy00"> 
                    <?php
                    break;

                    case 86:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODYtODZkYWRtJiUtMy00"> 
                    <?php
                    break;

                    case 87:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODctODdkYWRtJiUtMy00"> 
                    <?php
                    break;

                    case 88:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODgtODhkYWRtJiUtMy00"> 
                    <?php
                    break;

                    case 89:?>
                        <a class="nav-link" href="http://declaraciones/auth/ODktODlkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 90:?>
                        <a class="nav-link" href="http://declaraciones/auth/OTAtOTBkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 91:?>
                        <a class="nav-link" href="http://declaraciones/auth/OTEtOTFkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 96:?>
                        <a class="nav-link" href="http://declaraciones/auth/OTYtOTZkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 98:?>
                        <a class="nav-link" href="http://declaraciones/auth/OTgtOThkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 99:?>
                        <a class="nav-link" href="http://declaraciones/auth/OTktOTlkYWRtJiUtMy00"> 
                    <?php
                    break;
                    case 100:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTAwLTEwMGRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 101:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTAxLTEwMWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 102:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTAyLTEwMmRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 103:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTAzLTEwM2RhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 105:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTA1LTEwNWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 106:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTA2LTEwNmRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 107:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTA3LTEwN2RhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 108:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTA4LTEwOGRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 109:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTA5LTEwOWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 110:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTEwLTExMGRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 111:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTExLTExMWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 115:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTE1LTExNWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 116:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTE2LTExNmRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 118:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTE4LTExOGRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 119:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTE5LTExOWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    /*case 120:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTIwLTEyMGRhZG0mJS0zLTQ="> 
                    <?php
                    break;*/
                    case 121:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTIxLTEyMWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 122:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTIyLTEyMmRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    /*case 123:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTIzLTEyM2RhZG0mJS0zLTQ="> 
                    <?php
                    break;*/
                    /*case 124:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTI0LTEyNGRhZG0mJS0zLTQ="> 
                    <?php
                    break;*/
                    /*case 125:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTI1LTEyNWRhZG0mJS0zLTQ="> 
                    <?php
                    break;*/
                    /*case 126:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTI2LTEyNmRhZG0mJS0zLTQ="> 
                    <?php
                    break;*/
                    case 127:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTI3LTEyN2RhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    /*case 128:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTI4LTEyOGRhZG0mJS0zLTQ="> 
                    <?php
                    break;*/
                    case 129:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTI5LTEyOWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 130:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTMwLTEzMGRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 131:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTMxLTEzMWRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    case 132:?>
                        <a class="nav-link" href="http://declaraciones/auth/MTMyLTEzMmRhZG0mJS0zLTQ="> 
                    <?php
                    break;
                    }
                    ?>

                <i class="fa fa-file"></i>
                    <span>Declaraciones</span></a>
                </li>
                <?php
                }
                    if ($objDatosEmpleado->Sistema3==1 )
                    {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="reporte.php">
                            <i class="fa fa-table"></i>
                                <span>Reportes</span></a>
                            </li>
                    <?php
                    }
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="resguardoequipos.php">
                        <i class="fa fa-table"></i>
                            <span>Resguardo equipos informáticos</span>
                    </a>
                </li>

            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $objDatosEmpleado->NombreEmpleado; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="nominas.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            
