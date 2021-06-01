<?php
require 'conexion.php';

    if(isset($_POST['descargamxl']))
    {
      $idEmpleado = $_POST['descargamxl'];
      $query = mysqli_query($mysqli,"SELECT CAST(cfdi_xml_cfdi AS character) as XML FROM pri_cfdi WHERE id_cfdi=".$idEmpleado) or die(mysqli_error());

      $row = mysqli_fetch_array($query);
      $dato=$row["XML"];

      header('Content-Type: text/xml');
      header('Content-Disposition: attachment;filename=Nomina.xml');
      header('Cache-Control: no-cache, no-store, must-revalidate');
      header('Expires:0');
      $XML = fopen("php://output", 'w');
      fwrite($XML, $dato);
      fclose($XML);
      exit;
    }
    else if (isset($_POST['descargapdf'])) 
    {
      $idEmpleado = $_POST['descargapdf'];
      $query = mysqli_query($mysqli,"SELECT cfdi_pdf_timbrado FROM pri_cfdi WHERE id_cfdi=".$idEmpleado) or die(mysqli_error());
      $row = mysqli_fetch_array($query);
      $dato=$row['cfdi_pdf_timbrado'];
      
    header("Content-type: application/pdf");
    header('Content-Disposition: attachment;filename=Nomina.pdf');
   // header('Content-Disposition: attachment; filename="downloaded.pdf"'); //solo para forzar descarga
    //si está e base 64 seria:
    echo base64_decode($dato);
    exit;
    }
    else if (isset($_POST['logout'])) 
    {
      session_destroy();
      header("Location: index.php");
    }
?> 

