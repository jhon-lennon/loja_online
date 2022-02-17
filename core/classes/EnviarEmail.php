<?php
namespace core\classes;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\SMTP;
use  PHPMailer\PHPMailer\Exception;
class EnviarEmail{
    public function enviar_email($email_cliente, $nome_cliente, $purl){

        $link_purl = 'http://localhost/loja_online/public/?a=verificar_email&purl='.$purl;

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
        $mail->addAddress($email_cliente);     //Add a recipient
       
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirmaçao de email';
        $mail->Body    = '<h1>Bem vindo a '.APP_NAME.'</h1></b> <p>Ola '.$nome_cliente.' <a href="'.$link_purl.'"> cliqui aqui para ativar sua conta</a></p>';
        
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }

    }
}
