<?php
require_once "core/init.php";

if(isset($_POST['submit'])){
$logErrors = array();
if(isset($_POST['userName'], $_POST['password'], $_POST['logToken'])){
if(!empty($_POST['userName']) && !empty($_POST['password']) && !empty($_POST['logToken'])){
$userName = trim($_POST['userName']);
$password = trim($_POST['password']);
$logToken = trim($_POST['logToken']);

$userName = strip_tags($userName);
$password = strip_tags($password);
$logToken = strip_tags($logToken);

$user = login($userName, $password);
if($user){
header("Location: " . $_SERVER['HTTP_REFERER']);
}else{
$logSuccess = "Fehlgeschlagene Anmeldung Versuchen Sie es nochmal.";
header("Location: " . $_SERVER['HTTP_REFERER']);
}
}//end empty
else
$logErrors[] = " Alle Felder müssen ausgefüllt werden.";
}//endd isset
else
$logErrors[] = "Alle Daten müssen gesendet werden";
}

if(count($logErrors) > 0)
$_SESSION['logErrors'] = $logErrors;

if(isset($logSuccess))
$_SESSION['logSuccess'] = $logSuccess;

header("Location: " . $_SERVER['HTTP_REFERER']);
