<?php
require_once __DIR__ . "/vendor/autoload.php";
// Load env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dbHost=$_ENV["DB_HOST"];
$dbUser=$_ENV["DB_USER"];
$dbPass=$_ENV["DB_PASS"];
$dbName=$_ENV["DB_NAME"];

// Set internal encoding
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
Database::connectToDB($dbHost, $dbUser, $dbPass, $dbName);

$router = new RouterController();
// Process selected controller
$router->process(array($_SERVER["REQUEST_URI"]));
// Choose appropriate template file
$router->renderView();
