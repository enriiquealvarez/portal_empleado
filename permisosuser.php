<?php
    session_start();
    require_once('menu.php');
    require_once('Clases/DatosDelEmpleado.php');

    if(isset($_POST['BtnRecuperar']))
    {
        $idEmpleado = $_POST['BtnRecuperar'];

       //Se accede a las funciones de la clase DatosDelEmpleado para obtener su información
        $objDatosEmpleado = new DatosDelEmpleado();
        $objDatosEmpleado->DatosGeneralesEmpleados($idEmpleado);
        $enlace =  $objDatosEmpleado->EnlaceEmpleado;

        //Se accede a las funciones de la clase PermisosEmpleado para obtener los permsiso del sistema
        $objDatosEmpleado-> PermisosUsoSistema($enlace);
    }

?>
 <div class="container-fluid">

<!-- Nombre del empleado -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Empleado: <?php echo $objDatosEmpleado->NombreEmpleado; ?> </h1>
</div>

<div class="row">

    <!-- Declaracion -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Declaración</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $objDatosEmpleado->EstadoDeclaracionEmpleado; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- rol-->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Enlace
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $enlace ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Disponible 2</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Dato 2</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-6">
    <form class="form-horizontal" action="/Clases/InsertarPermisos.php" name="form" method="POST">
        <!-- permiso de sistema -->
        <div class="card mb-4">
            <div class="card-header">
                sistema
            </div>
            <div class="card-body">
                
            <?php
                //Se declaran las variables en 0 (No marcadas)
                $R_S1="";   $R_S2="";   $R_S3="";   $R_S4="";   $R_S5="";   $R_S6="";   $R_S7="";

                if($objDatosEmpleado->Sistema1==1)
                {
                    $R_S1="checked";
                }
                if($objDatosEmpleado->Sistema2==1)
                {
                    $R_S2="checked";
                }
                if($objDatosEmpleado->Sistema3==1)
                {
                    $R_S3="checked";
                }
                if($objDatosEmpleado->Sistema4==1)
                {
                    $R_S4="checked";
                }
                if($objDatosEmpleado->Sistema5==1)
                {
                    $R_S5="checked";
                }
                if($objDatosEmpleado->Sistema6==1)
                {
                    $R_S6="checked";
                }
                if($objDatosEmpleado->Sistema7==1)
                {
                    $R_S7="checked";
                }
            ?>
            <label><input type="checkbox" name="Sistema_1"  <?php echo $R_S1 ?> > Nómina</label><br>
            <label><input type="checkbox" name="Sistema_2"  <?php echo $R_S2 ?> > Declaraciones</label><br>
            <label><input type="checkbox" name="Sistema_3"  <?php echo $R_S3 ?> > Reportes</label><br>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <!-- Rol del sistema -->
        <div class="card mb-4">
            <div class="card-header">
                Rol
            </div>
            <div class="card-body">
            <?php
                $R_R1="";   $R_R2="";   $R_R3="";   $R_R4="";   $R_R5="";   $R_R6=""; $R_R7="";
                if($objDatosEmpleado->Rol1==1)
                {
                    $R_R1="checked";
                }
                if($objDatosEmpleado->Rol2==1)
                {
                    $R_R2="checked";
                }
                if($objDatosEmpleado->Rol3==1)
                {
                    $R_R3="checked";
                }
                if($objDatosEmpleado->Rol4==1)
                {
                    $R_R4="checked";
                }
                if($objDatosEmpleado->Rol5==1)
                {
                    $R_R5="checked";
                }
                if($objDatosEmpleado->Rol6==1)
                {
                    $R_R6="checked";
                }
                if($objDatosEmpleado->Rol7==1)
                {
                    $R_R7="checked";
                }
                
            ?>
            <label><input type="checkbox" name="rol_1"  <?php echo $R_R1 ?>> Administrador</label><br>
            <label><input type="checkbox" name="rol_2"  <?php echo $R_R2 ?>> Usuario</label><br>
            <label><input type="checkbox" name="rol_3"  <?php echo $R_R3 ?>> Contraloría</label><br>
            </div>
        </div>
    </div>

    <div class="col-lg-6">

        <!-- Permiso para las acciones -->
        <div class="card mb-4">
            <div class="card-header">
                Acciones
            </div>
            <div class="card-body">
            <?php
                $R_P1="";   $R_P2="";
                if($objDatosEmpleado->Accion1==1)
                {
                    $R_P1="checked";
                }
                if($objDatosEmpleado->Accion1==1)
                {
                    $R_P2="checked";
                }
            ?>
            <label><input type="checkbox" name="accion_1" <?php echo $R_P1 ?> > Editar usuarios</label><br>
            </div>
        </div>

        
        <a class="btn btn-success btn-icon-split">
            <button type="submit" name="BtnGuardar" value="<?php echo $enlace?>">Guardar</button>
        </a>
    </div>
    </div>
</div>
</div>
</div>
</div>


<?php
    require_once('footer.php');
?>

                            