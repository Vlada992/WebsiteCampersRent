<?php
require_once "core/init.php";

if(isset($_SESSION['user_id'])){
if(isset($_POST['submit'])){
$errors = array();
if(isset($_POST['userId'], $_POST['password'])){
if(!empty($_POST['userId']) && !empty($_POST['password'])){
$userId = trim($_POST['userId']);
$password = trim($_POST['password']);
$userId = strip_tags($userId);
$password = strip_tags($password);

if(strlen($password) < 6)
$errors[] = "Die Mindestlänge des Passworts beträgt 6 Zeichen.";

$password = md5($password);

}//end empty
else
$errors[] = "Das Feld muss ausgefüllt sein.";
}// end isset 
else
$errors[] = "Passwort und Benutzername sind erforderlich.";

if(count($errors) > 0){
$_SESSION['errors'] = $errors;
}else{
//if number of errors is 0 update password
if(updatePassword($userId, $password))
$_SESSION['success'] = "Erfolgreiches Update.";
else
$_SESSION['success'] = "Update fehlgeschlagen. Versuchen Sie es nochmal.";
}//end else errors > 0

header("Location: " . $_SERVER['HTTP_REFERER']);
}//end submit
}//end session userId
else
header("Location: index.php");
