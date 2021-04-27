<?php

session_start();
require 'conexion.php';

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if($tipo_usuario==1){
    $where="";
}else if ($tipo_usuario==2){
$where = "WHERE id=$id";
}

$sql= "SELECT * FROM usuario $where";
$resultado = mysqli->query($sql);


?>