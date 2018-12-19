<?php
require_once "core/init.php";

if(isset($_POST['dateStart'], $_POST['dateEnd'], $_POST['vehicle']) && !empty($_POST['dateStart']) && !empty($_POST['vehicle']) && !empty($_POST['dateEnd'])){
$dateStart = trim($_POST['dateStart']);
$dateEnd = trim($_POST['dateEnd']);
$vehicle = trim($_POST['vehicle']);

$dateStart = strip_tags($dateStart);
$dateEnd = strip_tags($dateEnd);
$vehicle = strip_tags($vehicle);

$pattern = "/^[0-9]{2}\.[0-9]{2}\.[0-9]{4}$/";
if((preg_match($pattern, $dateStart) == 0) || (preg_match($pattern, $dateEnd) == 0)){
echo "Datumsangaben müssen im richtigen Format (JJJJ-MM-TT) vorliegen.\r\n";
die();
}

$dateStart = explode(".", $dateStart);
$dateStart = $dateStart[2] . "-" . $dateStart[1] . "-" . $dateStart[0];
$dateEnd = explode(".", $dateEnd);
$dateEnd = $dateEnd[2] . "-" . $dateEnd[1] . "-" . $dateEnd[0];

$currDate = new DateTime();
$currDate = $currDate->format("Y-m-d");
$currDate = strtotime($currDate);
$vehicle = explode("|", $vehicle);
$vehicleId = $vehicle[0];
$dateStart = strtotime($dateStart);
$dateEnd = strtotime($dateEnd);
/*
if(($dateStart < $currDate) || ($dateEnd < $currDate)){
echo "Sie können keine Daten in der Vergangenheit auswählen.\r\n";
die();
}
*/
if($dateEnd < $dateStart){
echo "Das Enddatum kann nicht vor dem Startdatum liegen.\r\n";
die();
}

static $message = "";
while($dateStart <= $dateEnd){
if(checkDateStart(date("Y-m-d", $dateStart), $vehicleId))
$message .= date("d.m.Y", $dateStart). " - Dieses Datum ist voll.\r\n";
else
$message .= date("d.m.Y", $dateStart) . " - Dieser Termin ist frei.\r\n";

$dateStart = strtotime("+1 day", $dateStart);
}//end while
echo $message;
}else{
echo "Einige Daten (Fahrzeug, Datums- oder Datumsende) fehlen\r\n";
}
