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
       $id_empleado= $ResultadosEmpleado['id'];
       $correobd= $ResultadosEmpleado['correo_electronico'];


        if($correo==$correobd)
        {
            $codigo=random_int(10000, 99999);

            $sql= "UPDATE empleado SET codigo='$codigo' WHERE id= '$id_empleado' LIMIT 1 ";
            $resultado = $mysqli->query($sql);
    
    
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
                $mail->addAddress($correo);     //Add a recipient
    
    
                //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Restablecer contraseña';
                $mail->Body    = 'Usa el siguiente código para restablecer tu contraseña en el portal del empleado: '.$codigo.' Por favor no compartas este código.';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                $mail->send();
                header('Location: http://portal-empleado/Restablecer-password.php?empleado='.$id_empleado);
                } catch (Exception $e) {
                    echo "Hubo un error al enviar en mensaje: {$mail->ErrorInfo}";
            }
        }
        else{
            echo "<script>
                    alert('El correo no existe');
                    window.location= 'http://portal-empleado/Recuperar-contrasena.php'
                 </script>";
        }

    } 
?>