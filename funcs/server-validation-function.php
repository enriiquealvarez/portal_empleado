<!--Código para ocultar Warnings-->
<?php error_reporting (0);?>

<?php
//correo_electronico
//contrasena
//fk_enlace
function reglas(){
    $validacion = [
        'correo_electronico' => [
            'patron' => '/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/',
            'error' => 'Proporciona un correo electrónico válido.'
        ],
        'contrasena' => [
            'patron' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/',
            'error' => 'Por favor, ingresa una contraseña válida. Debe contener al menos 1 letra minúscula, 1 letra mayúscula, 1 número y caracteres especiales son opcionales. '
        ],
        'fk_enlace' => [
            'patron' => '1234567890',
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
                        $errores[] = $option ['error'];
                    }
                }
            }
        }
    }

    return $errores;
}

?>