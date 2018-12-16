<?php
require_once "core/init.php";

if(isset($_SESSION['user_id'])){
if(isset($_POST['submit'])){
$errors = array();
if(isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['vehicleId'], $_POST['dateStart'], $_POST['dateEnd'])){
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['vehicleId']) && !empty($_POST['dateStart']) && !empty($_POST['dateEnd'])){
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$vehicleId = trim($_POST['vehicleId']);
$dateStart = trim($_POST['dateStart']);
$dateEnd = trim($_POST['dateEnd']);

$firstName = strip_tags($firstName);
$lastName = strip_tags($lastName);
$email = strip_tags($email);
$phone = strip_tags($phone);
$vehicleId = strip_tags($vehicleId);
$dateStart = strip_tags($dateStart);
$dateEnd = strip_tags($dateEnd);

$dateStart = date("Y-m-d", strtotime($dateStart));
$dateEnd = date("Y-m-d", strtotime($dateEnd));

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
$errors[] = "Email ist ungültig";
}//end empty
else
$errors[] = "Alle Felder müssen ausgefüllt werden.";
}// end isset 
else
$errors[] = "Alle Daten sind notwendig.";

if(count($errors) >0){
$_SESSION['errors'] = $errors;
}else{
if(insertReservation($vehicleId, $dateStart, $dateEnd, $firstName, $lastName, $email, $phone))
$success = "Erfolgreicher Einsatz.";
else
$success = "Nicht erfolgreicher Einsatz. Versuchen Sie es nochmal."; 
}
}//end submit

header("Location: insertReservation.php");
}else{
header("Location: insertReservation.php");
}


