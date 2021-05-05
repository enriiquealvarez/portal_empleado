
<?php
require 'conexion.php';

    if(isset($_POST['validar']))
    {
      $idEmpleado = $_POST['descargamxl'];
      $query = mysqli_query($mysqli,"SELECT CAST(cfdi_xml_cfdi AS character) as XML FROM pri_cfdi WHERE id_cfdi=".$idEmpleado) or die(mysqli_error());

      $row = mysqli_fetch_array($query);
      $dato=$row["XML"];

    }
?> 