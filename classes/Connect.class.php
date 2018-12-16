<?php
class Connect{
private static $_instance = null;

private function __construct(){}

public static function getInstance(){
if(self::$_instance == null){
try{
self::$_instance = new PDO("mysql:host=" . Config::get("db/host") . ";dbname=" . Config::get("db/dbname") . ";charset=utf8", Config::get("db/user"), Config::get("db/password"));
}catch(Exception $e){
echo "Connection error number" . $e->getCode() . ": " . $e->getMessage();
die();
}
}
return self::$_instance;
}
}
