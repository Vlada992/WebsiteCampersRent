<?php
require_once "core/init.php";

if(isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['subject'], $_POST['message'])){
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['subject']) && !empty($_POST['message'])){
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);

$firstName = strip_tags($firstName);
$lastName = strip_tags($lastName);
$email = strip_tags($email);
$phone = strip_tags($phone);
$subject = strip_tags($subject);
$message = strip_tags($message);

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "<p>Email ist ungültig.</p>"; /*Email is not valid. */
die();
}

$mail = new PHPMailer();

$mail->CharSet = "UTF-8";
$mail->addReplyTo($email, $firstName . " " . $lastName);
$mail->SetFrom = "contact@fernweh-wohnmobilvermietung.de";//site address
$mail->FromName = "Wohnmobile";

$mail->addAddress("info@fernweh-wohnmobilvermietung.de", "Fernweh");//admin address SEND TO
//$mail->addCC("name@example.com", "Name Surname");
$mail->isHTML(true);


/*
visitor  sent you  a message:*/ 
/*Visitor's data
First name:
Last name:
Email:phone:
message
Call sender
*/

$mail->Subject = "Wohnmobile - $subject";
$mail->Body = "<p>Besucher hat Ihnen eine Nachricht geschickt:</p> 
<h2>Daten des Besuchers</h2>
<p>Vorname: $firstName</p>
<p>Vorname: $lastName</p>
<p>Email: $email</p>
<p>Telefon: $phone</p>
<h2>Botschaft</h2>
<p>$message</p>
<p><a href=\"tel:$phone\">Absender anrufen</a></p>";
//$mail->AltBody = $body;

if(!$mail->send()){
echo "<p>E-Mail wurde nicht gesendet. Versuchen Sie es nochmal.</p>"; /*Email was not sent. Try again*/ 
}else{
echo "<p>E-Mail wird gesendet. Vielen Dank für Ihre Kontaktaufnahme.</p>"; /*Email sent. Thannk you for contacting us*/ 
}//end of php mailer

}//end empty
else
echo "<p>Alle Felder müssen ausgefüllt werden.</p>"; /*All fields must be filledd.*/ 
}// end isset 
else
echo "<p>Alle Daten sind notwendig.</p>"; /*All data are necessary.*/ 

