<?php
mb_internal_encoding("UTF-8");
// Automatically load a class from a directory with the same name (controllers or models) 
function autoloader($class){
    if(preg_match("/Controller$/", $class)){
      require("src/Controller/" . $class . ".php");  
    } else {
      require("src/Model/" . $class . ".php");  
    }
}

spl_autoload_register("autoloader");
  
// Connect to the database
Database::connectToDB("127.0.0.1", "root", "", "phpshop");

$router = new RouterController();
$router->process(array($_SERVER["REQUEST_URI"]));
$router->renderView();
