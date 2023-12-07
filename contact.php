<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$field_name = $_POST['name'];
$field_phone = $_POST['phone'];
$field_email = $_POST['email'];
$field_bedrooms = $_POST['bedrooms'];
// $field_utm = $_POST['utm_parameter'];
$field_ip = $_SERVER['REMOTE_ADDR'];
// $field_lead = "Emaar Beachfront";
// $field_lead_source = "Landing Page";
// $field_campagin_id = "80";
// $field_lead_type = "2";

$field_url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$utm_campaign = $_POST['utm_campaign'];
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_content = $_POST['utm_content'];
$utm_term = $_POST['utm_term'];


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// $link = mysqli_connect("localhost", "edgerealty_crm", "crm@12345@$", "edgerealty_crm");
 
// // Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }
 
// // Attempt insert query execution

//  $sql_campaign_agent = "SELECT count(leads.id) as lead_count, campaign_agent.agent_id from campaign_agent
//                         left join leads on leads.campaign_id = campaign_agent.campaign_id and leads.agent_id = campaign_agent.agent_id
//                         where campaign_agent.campaign_id = $field_campagin_id group by campaign_agent.agent_id order by lead_count, agent_id";



// $b = mysqli_query($link, $sql_campaign_agent);
// $result=mysqli_fetch_assoc($b); 

// $agent_id = $result['agent_id'];



// $sql_last = "SELECT * FROM leads ORDER BY id DESC LIMIT 1";

// $a = mysqli_query($link, $sql_last);
// $rr=mysqli_fetch_assoc($a); 

// $ref_no = $rr['ref_no'];

// $ref_no_add = ++$ref_no;


// $sql = "INSERT INTO `leads` (  `ref_no` , `inquiry` ,  `source` , `full_name` , `agent_id` , `phone`, `email`, `qualified_question`,`lead_type` , `campaign_id` )
// VALUES ( '$ref_no_add' ,'$field_lead', '$field_lead_source', '$field_name', '$agent_id' , '$field_phone' , '$field_email' , '$field_bedrooms' , '$field_lead_type' ,  '$field_campagin_id' )";



// if(mysqli_query($link, $sql)){
//      header("Location: https://edgerealty.ae/emaar-beachfront/thankyou.php");

 
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
    
// }
 
// // Close connection
// mysqli_close($link);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = false;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'premium97.web-hosting.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'edge@edgerealty.ae';                     //SMTP username
    // $mail->Password   = 'Dubai@12345@$';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    // $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'premium97.web-hosting.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'send@edgerealty.ae';                     //SMTP username
    $mail->Password   = 'R4mRTD7J}R3j';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;

    //Recipients
	$mail->From = "lead@edgerealty.ae";
	$mail->FromName = "Edge Realty";
	
	$mail->addAddress("lead@edgerealty.ae", "Edge Realty");

  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Binghatti Jacob & Co';
    $mail->Body    = ' <b>Binghatti Jacob & Co </b> <br><br> Name: '.$field_name.' <br><br> Phone: '.$field_phone.' <br><br> Email: '.$field_email
    .'<br><br> Bedrooms: '.$field_bedrooms.'<br><br> Url: '.$field_url.
    // '<br> UTM Parameter:'
    // .$field_utm.
    '<br><br><br> UTM Campaign:'.$utm_campaign.'<br> UTM Source:'.$utm_source.'<br> UTM Medium:'.$utm_medium.'<br> UTM Content:'.$utm_content.'<br> UTM Term:'.$utm_term;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    header("Location: http://www.binghattijacob.com/thankyou.php");

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}