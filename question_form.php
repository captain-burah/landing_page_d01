<?php


$field_language = $_POST['language'];
$field_reason = $_POST['reason'];
$field_budget = $_POST['budget'];
$field_time_frame = $_POST['time_frame'];
$field_been_dubai = $_POST['been_dubai'];



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.aqarat.ae';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@aqarat.ae';                     //SMTP username
    $mail->Password   = 'Dubai@12345';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->From = "no-reply@edgerealty.ae";
    $mail->FromName = "Edge Realty";
    
    $mail->addAddress("cpdxb13@gmail.com", "Edge Realty");
 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Six Senses Residence Question Form';
    $mail->Body    = ' <b>Six Senses Residence Question Form</b> <br> Language:'.$field_language.' <br> Reason: '.$field_reason.' <br> Budget: '.$field_budget
    .'<br> Time Frame: '.$field_time_frame.'<br> Been Dubai:'.$field_been_dubai;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    header("Location: https://dxb-projects.net/six-senses-residence-palm-dubai/thankyou.php");

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}