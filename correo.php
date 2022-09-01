<?php
    //Todo corresponde al Mail que se va a enviar
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if($_POST['id_patient'] != 0){
        require 'src/Exception.php';
        require 'src/PHPMailer.php';
        require 'src/SMTP.php';

        $img = 'https://'.$_SERVER["HTTP_HOST"].'/assets/img/doctores.jpg';

        $sql = $con->query("SELECT * FROM pacientes WHERE id = ".$_POST['id_patient']);
        $paciente = $con->fetcharray($sql);

        $sql = $con->query("SELECT * FROM test WHERE id_paciente = ".$_POST['id_patient']);
        $test = $con->fetcharray($sql);

        $contenido = '<p style="font-size:20px;"><b>!Hola, '.$paciente['nombre'].'¡</b></p>
        <p style="font-size:15px;">Hemos recibido tu test, la clínica muy pronto te asignará a uno
        de nuestros especilistas para darte un seguimiento y poderte apoyar en este proceso.</p>
        <p style="font-size:15px;"><b>Diágnostico: </b>'.$test['diagnostico'].'</p>
        '.$formulario.'<br>
        <p style="font-size:15px;">Atentamente: Clinic Detect</p>
        <p style="font-size:15px;"><i>Favor de no responder este correo.</i></p>
        <img width="100" height="100" src="'.$img.'">';

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP(); // Set mailer to use SMTP
            //$mail->SMTPDebug = 1;
            $mail->Host = 'mail.yes-admin.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            // ---------- datos de la cuenta que Envia el correo -------------------------------
            $mail->Username = 'clinicdetect@yes-admin.com';                 // SMTP username
            $mail->Password = '*,MD=gyo*sfm';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;

            // TCP port to connect to
            $mail->From = 'clinicdetect@yes-admin.com';
            $mail->FromName = 'Clinic Detect';

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->CharSet = 'utf-8';
            $mail->Subject = 'Test Realizado';
            $mail->AddAddress($paciente['email']); // recipients email
            $mail->Body= $contenido;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>