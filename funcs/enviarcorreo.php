<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';
    require "../conexion.php";
    if(!empty($_POST))
    {
       $correo=$_POST['correo'];
       $sql= "SELECT id, contrasena, tipo_usuario, fk_enlace, correo_electronico FROM empleado WHERE correo_electronico= '$correo' LIMIT 1 ";
       $resultado = $mysqli->query($sql);
       $ResultadosEmpleado = $resultado->fetch_assoc();
       $Contrasena= $ResultadosEmpleado['contrasena'];

    }

    $mail = new PHPMailer(true);

try {
    //Server settings                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'descansototalhoy@gmail.com';                     //SMTP username
    $mail->Password   = 'Superman11122034';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('descansototalhoy@gmail.com', 'Servicios portal del empleado');
    $mail->addAddress($correo);     //Add a recipient


    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'RECUPERACION DE CONTRASEÑA - PORTAL DEL EMPLEADO';
    $mail->Body    = 'contraseña: '.$Contrasena;
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'EL mensaje se envió correctamente';
} catch (Exception $e) {
    echo "Hubo un error al enviar en mensaje: {$mail->ErrorInfo}";
}

?>