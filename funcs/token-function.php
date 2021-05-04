<?php
//Cliente
//Función para Crear un Token
function create_token($lenght){
    $token = bin2hex(random_bytes($lenght));
    $_SESSION['token']=$token;
    return $token;
}

//Servidor
function compare_token($token){
    if(isset($_SESSION['token']) && $_SESSION['token'] === $token){
        unset($_SESSION['token']);
        return true;
    }
        return false;
}


?>