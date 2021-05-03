

<?php

function create_token(){
    $token = bin2hex(random_bytes(32));

    return $token;

}

?>