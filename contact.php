<?php


$field_name = $_POST['name'];
$field_phone = $_POST['phone'];
$field_email = $_POST['email'];
$field_bedrooms = $_POST['bedrooms'];
$field_utm = $_POST['utm_parameter'];
$field_ip = $_SERVER['REMOTE_ADDR'];
$field_lead = "Six Senses Residence";
$field_lead_source = "Landing Page";
$field_campagin_id = "80";
$field_lead_type = "2";

$field_url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$utm_campaign = $_POST['utm_campaign'];
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_content = $_POST['utm_content'];
$utm_term = $_POST['utm_term'];





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
    $mail->Subject = 'Six Senses Residence Enquiry';
    $mail->Body    = ' <b>Six Senses Residence</b> <br> Name:'.$field_name.' <br> Phone: '.$field_phone.' <br> Email: '.$field_email
    .'<br> Bedrooms: '.$field_bedrooms.'<br> Url:'.$field_url.'<br> UTM Parameter:'
    .$field_utm.'<br> UTM Campaign:'.$utm_campaign.'<br> UTM Source:'.$utm_source.'<br> UTM Medium:'.$utm_medium.'<br> UTM Content:'.$utm_content.'<br> UTM Term:'.$utm_term;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    header("Location: https://dxb-projects.net/six-senses-residence-palm-jumeirah-dubai/questions.php");
    

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}