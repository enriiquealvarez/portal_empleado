<?php
//para borrar los Warning de aviso en php
error_reporting (0);

//IMPLEMENTANDO REGLAS
//correo_electronico
//contrasena
//fk_enlace
function reglas(){
    $validacion = [
        'correo_electronico' => [
            'patron' => "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",
            'error' => 'Proporciona un correo electrónico válido.'
        ],
        'contrasena' => [
            'patron' => "/^.*(?=.{6,})(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$/",
            'error' => 'La contraseña debe incluir mayúsculas, minúsculas, números, signos y mínimo 6 caracteres. '
        ],
        'fk_enlace' => [
            'patron' => "/^[0-9]{1,4}$/",
            'error' => 'El enlace debe contener sólo números'
        ]
    ];
    return $validacion;  
}

function validar($fields){
    $errores = [];

    foreach ($fields as $name => $display){
        if(!isset($_POST[$name]) || $_POST[$name]== NULL ){
           $errores[]= $display.' es un campo requerido'; 
        }else{
            $reglas = reglas();
            foreach($reglas as $field => $option){
                if($name == $field){
                    if(!preg_match($option['patron'], $_POST[$name])){
                        $errores[]= $option['error'];
                    }
                } 
            }
        }
    }

    return $errores;
}

?>