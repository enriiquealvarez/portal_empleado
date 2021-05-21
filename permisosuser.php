<?php
    require_once('menu.php');
    
    if(isset($_POST['BtnRecuperar']))
    {
      $idEmpleado = $_POST['BtnRecuperar'];


    }

?>
 <div class="container-fluid">

<!-- Nombre del empleado -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Empleado: <?php echo $NombreEmpleado ?> </h1>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $idEmpleado ?></div>
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
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rol
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Administrador</div>
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
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
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
        <!-- permiso de sistema -->
        <div class="card mb-4">
            <div class="card-header">
                sistema
            </div>
            <div class="card-body">
            <label><input type="checkbox" id="cbox1" value="first_checkbox"> Portal del Empleado</label><br>
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
            <label><input type="checkbox" id="cbox1" value="first_checkbox"> Administrador</label><br>
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
            <label><input type="checkbox" id="cbox1" value="first_checkbox"> Editar usuarios</label><br>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<?php
    require_once('footer.php');
?>

                            