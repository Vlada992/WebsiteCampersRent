<?php
class Config{
public static function get($path){
$result = $GLOBALS['config'];
$path = explode("/", $path);
foreach($path as $p){
if(isset($result[$p]))
$result = $result[$p];
}
return $result;
}
}
