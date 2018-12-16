<?php
require_once "core/init.php";

if(isset($_SESSION['user_id'])){
if(isset($_POST['submit'])){
$errors = array();
if(isset($_POST['userId'], $_POST['userName'])){
if(!empty($_POST['userId']) && !empty($_POST['userName'])){
$userId = trim($_POST['userId']);
$userName = trim($_POST['userName']);
$userId = strip_tags($userId);
$userName = strip_tags($userName);

if(updateUserName($userId, $userName)){
$_SESSION['userName'] = $userName;
header("Location: index.php");
}else{
$_SESSION['success'] = "Update fehlgeschlagen. Versuchen Sie es nochmal.";
header("Location: " . $_SERVER['HTTP_REFERER']);
}
}//end empty
else
$errors[] = "Das Feld muss ausgefüllt sein.";
}// end isset 
else
$errors[] = "Benutzername und Benutzername sind erforderlich.";

if(count($errors) > 0){
$_SESSION['errors'] = $errors;
header("Location: " . $_SERVER['HTTP_REFERER']);
}

}//end submit
}//end session userId
else
header("Location: index.php");
