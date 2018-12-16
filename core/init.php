<?php
session_start();
session_regenerate_id(true);

require "config.php";

spl_autoload_register(function ($className){
if(file_exists("classes/$className.class.php"))
require_once "classes/$className.class.php";
});

require_once "lib/admin.php";
require_once "lib/client.php";
