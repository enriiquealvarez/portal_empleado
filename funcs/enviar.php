<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';
    require "../conexion.php";


    
            $mail = new PHPMailer(true);
    
            try {
                //Server settings                    //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'portaldelempleado.tachiapas@gmail.com';                     //SMTP username
                $mail->Password   = 'TA2021Chiapas';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
                //Recipients
                $mail->setFrom('portaldelempleado.tachiapas@gmail.com', 'Portal del empleado');
                $mail->addAddress('valdesnanduca@gmail.com');     //Add a recipient
    
    
                //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Restablecer contraseña';
                $mail->Body    = 'Usa el siguiente código para restablecer tu contraseña en el portal del empleado: ';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                $mail->send();
                echo "se envio";
                } catch (Exception $e) {
                    echo "Hubo un error al enviar en mensaje: {$mail->ErrorInfo}";
            }

?>