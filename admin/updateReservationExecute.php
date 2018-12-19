<?php
require_once "core/init.php";

if(isset($_SESSION['user_id'])){
if(isset($_POST['submit'])){
$errors = array();
if(isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['vehicleId'], $_POST['dateStart'], $_POST['dateEnd'], $_POST['reservation_id'])){
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['vehicleId']) && !empty($_POST['dateStart']) && !empty($_POST['dateEnd']) && !empty($_POST['reservation_id'])){
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$vehicleId = trim($_POST['vehicleId']);
$dateStart = trim($_POST['dateStart']);
$dateEnd = trim($_POST['dateEnd']);
$reservation_id = trim($_POST['reservation_id']);

$firstName = strip_tags($firstName);
$lastName = strip_tags($lastName);
$email = strip_tags($email);
$phone = strip_tags($phone);
$vehicleId = strip_tags($vehicleId);
$dateStart = strip_tags($dateStart);
$dateEnd = strip_tags($dateEnd);
$reservation_id = strip_tags($reservation_id);

$dateStart = explode(".", $dateStart);
$dateStart = $dateStart[2] . "-" . $dateStart[1] . "-" . $dateStart[0];
$dateEnd = explode(".", $dateEnd);
$dateEnd = $dateEnd[2] . "-" . $dateEnd[1] . "-" . $dateEnd[0];

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
$errors[] = "Email ist ungültig.";

$dateStart = date("Y-m-d", strtotime($dateStart));
$dateEnd = date("Y-m-d", strtotime($dateEnd));

}//end empty
else
$errors[] = "Alle Felder müssen ausgefüllt werden";
}// end isset 
else
$errors[] = "Alle Daten sind notwendig.";

if(count($errors) > 0){
$_SESSION['errors'] = $errors;
header("Location: " . $_SERVER['HTTP_REFERER']);
}else{

if(updateReservation($vehicleId, $dateStart, $dateEnd, $firstName, $lastName, $email, $phone, $reservation_id)){
header("Location: reservations.php");
}else{
$_SESSION['success'] = "Update fehlgeschlagen. Versuchen Sie es nochmal.";
header("Location: " . $_SERVER['HTTP_REFERER']);
}

}//end if errors = 0
}//end submit
}//end session userId
else
header("Location: index.php");
