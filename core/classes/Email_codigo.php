<?php
namespace core\classes;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\SMTP;
use  PHPMailer\PHPMailer\Exception;
class Email_codigo{
    public function email_codigo($email, $nome){

        //Cria uma instância; passar `true` habilita exceções 
        try {
        $mail = new  PHPMailer(true);
        
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = MAIL_USERNAME;                     //SMTP username
        $mail->Password   = MAIL_PASSWORD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = MAIL_PORT;
        $mail->CharSet    = MAIL_CHARSET;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom(MAIL_USERNAME, APP_NAME);
        $mail->addAddress($email);     //Add a recipient
       
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recuperar senha';
        $mail->Body    = '<h1>codigo de recuperação</h1></b> <p>Ola '.$nome.', esse é o seu codigo de recuperação <strong>'.$_SESSION['codigo'].'</strong>';
        
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }

    }
}
