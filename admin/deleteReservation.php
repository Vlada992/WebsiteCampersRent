<?php
require_once "core/init.php";

if(isset($_SESSION['user_id'])){
if(isset($_GET['id'])){
if(!empty($_GET['id'])){
$id = trim($_GET['id']);
$id = strip_tags($id);

deleteReservation($id);
header("Location: reservations.php");
}//end empty
}// end isset 
}//end session userId
else
header("Location: index.php");
