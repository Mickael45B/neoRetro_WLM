

<?php
 //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     ==> BREVO            
 
//ohcfhgxxoggsepsb
//$smtpHost = 'smtp.gmail.com';
//$smtpPort = 587;
//$smtpUsername = 'michaloiret@gmail.com';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'C:/Users/Proprietaire/Desktop/forum/vendor/autoload.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/Exception.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/PHPMailer.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'michaloiret@gmail.com';                     //SMTP username
    $mail->Password   = 'ohcfhgxxoggsepsb';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('michaloiret@gmail.com', 'Mailer');
    $mail->addAddress('michaloiret@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('michaloiret@gmail.com');               //Name is optional
    $mail->addReplyTo('michaloiret@gmail.com', 'Information');
    $mail->addCC('michaloiret@gmail.com');
    $mail->addBCC('michaloiret@gmail.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}







