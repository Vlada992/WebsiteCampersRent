<?php
session_start();

if(isset($_SESSION['user_id'])){
unset($_SESSION['user_id']);
}
if(isset($_SESSION['userName']))
unset($_SESSION['userName']);

header("Location: " . $_SERVER['HTTP_REFERER']);
