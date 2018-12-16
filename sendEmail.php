<?php
require_once "core/init.php";

$errors = 0;
if(isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['vehicle'], $_POST['dateStart'], $_POST['dateEnd'], $_POST['token'])){
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['vehicle']) && !empty($_POST['dateStart']) && !empty($_POST['dateEnd']) && !empty($_POST['token'])){
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$vehicle = trim($_POST['vehicle']);
$dateStart = trim($_POST['dateStart']);
$dateEnd = trim($_POST['dateEnd']);
$token = trim($_POST['token']);

$firstName = strip_tags($firstName);
$lastName = strip_tags($lastName);
$email = strip_tags($email);
$phone = strip_tags($phone);
$vehicle = strip_tags($vehicle);
$dateStart = strip_tags($dateStart);
$dateEnd = strip_tags($dateEnd);
$token = strip_tags($token);

$dateStartStr = $dateStart;
$dateEndStr = $dateEnd;
if((isset($token) && isset($_SESSION['token']) && $token == $_SESSION['token']) == false){
echo "<p>Problem mit dem Token.</p>"; /*Problem with the token. */
$errors ++;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "<p>Email ist ungültig.</p>"; /*Email is not valid.*/ 
$errors ++;
}

$pattern = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
if((preg_match($pattern, $dateStart) == 0) || (preg_match($pattern, $dateEnd) == 0)){
 echo "Datumsangaben müssen im richtigen Format (JJJJ-MM-TT) vorliegen.</pp>"; /*Dates must be in the proper format (yyyy-mm-dd).*/ 
$errors ++;
}

$currDate = new DateTime();
$currDate = $currDate->format("Y-m-d");
$currDate = strtotime($currDate);
$dateStart = strtotime($dateStart);
$dateEnd = strtotime($dateEnd);

if(($dateStart < $currDate) || ($dateEnd < $currDate)){
echo "<p>Sie können keine Daten in der Vergangenheit auswählen.</p>"; /*You can't chose dates in the past.*/
$errors ++;
}

if($dateEnd < $dateStart){
echo "<p>Das Enddatum kann nicht vor dem Startdatum liegen.</p>";/**End date can't be before start date.*/
$errors ++;
}

$vehicle = explode("|", $vehicle);
$vehicleId = $vehicle[0];
$vehicle = $vehicle[1];

$mail = new PHPMailer();

$mail->CharSet = "UTF-8";
$mail->addReplyTo($email, $firstName . " " . $lastName);
$mail->SetFrom = "reservation@fernweh-wohnmobilvermietung.de";//site address
$mail->FromName = "Wohnmobile";

$mail->addAddress("info@fernweh-wohnmobilvermietung.de", "Fernweh");//admin address SEND TO 
//$mail->addCC("name@example.com", "Name Surname");
$mail->isHTML(true);

$mail->Subject = "Reservierung auf Ihrer Website"; /*Reservation on your website*/
/*A client made an reservation on your website with the following data:*/
$mail->Body = "<p>Ein Kunde hat auf Ihrer Website eine Reservierung mit folgenden Daten vorgenommen:</p> 
<h2>Kundendaten</h2>
<p>Vorname: $firstName</p>
<p>Nachname: $lastName</p>
<p>Email: $email</p>
<p>Telefon: $phone</p>
<h2>Reservierungsdaten</h2>
<p>Fahrzeug: $vehicle</p>
<p>Anfangsdatum " . date("F d, Y", strtotime($dateStartStr)) . "</p>
<p>Endtermin " . date("F d, Y", strtotime($dateEndStr)) . "</p>
<p><a href=\"". Config::get("url") . "admin/insertReservation.php?vehicleId=$vehicleId&dateStart=$dateStartStr&dateEnd=$dateEndStr&firstName=$firstName&lastName=$lastName&email=$email&phone=$phone\">Insert reservation</a></p>
<p><a href=\"tel:$phone\">Client anrufen</a></p>";
//$mail->AltBody = $body;

}//end empty
else{
echo "<p>Alle Felder müssen ausgefüllt werden.</p>";
$errors ++;
}
}// end isset 
else{
echo "<p>Alle Daten sind notwendig.</p>";
$errors ++;
}

if($errors == 0){
// if there are no error send mail
if(!$mail->send()){
echo "<p>Reservierung nicht erfolgreich. Benachrichtigungs-E-Mail wurde nicht an den Administrator gesendet. Versuchen Sie es nochmal.</p>";
}else{
echo "<p>Eine E-Mail wird an den Administrator gesendet. Er wird Ihre Reservierung bestätigen und Sie darüber informieren.</p>";
}//end else, end of php mailer
}// end no errors
