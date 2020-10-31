<?php
class RouterController extends Controller
{

    protected $controller;

    public function process($input) {
        if(!isset($_SESSION)) {
            session_start();
        };
        // Get parsed URL 
        $parsedUrl = $this->parseUrl($input[0]);
        if(empty($parsedUrl[0])) {
            $this->controller = new HomepageController();
        } else {
            // Initialize controller class based on URL
            $controllerClass = $this->toCamelCase(array_shift($parsedUrl)) . "Controller";
            if(file_exists("src/Controller/" . $controllerClass . ".php")){
            $this->controller = new $controllerClass;
            } else {
            $this->redirect("error");
            }
        }
        // Process nested controller
        $this->controller->process($parsedUrl);
        $this->data["title"] = $this->controller->header["title"];
        $this->data["metaDescription"] = $this->controller->header["metaDescription"];

        // Create session variables on the first loading
        if(!isset($_SESSION["totalQuantity"])) {
            $_SESSION["totalQuantity"] = 0;
            $_SESSION["totalPrice"] = 0;
            $_SESSION["products"] = array();
        }
 
        // Load basic template
        $this->view = "template";   
    }

    private function toCamelCase($text) {
        // Replace dashes by whitespaces
        $camelCase = str_replace("-", " ", $text);
        // Uppercase first letters
        $sentence = ucwords($camelCase);
        // Remove whitespaces
        $camelCase = str_replace(" ", "", $camelCase);
        
        return $camelCase;
    }

    private function parseUrl($url) {
        // Parse URL into an associative array
        $parsedURL = parse_url($url);
         // Remove leading slash and whitespaces
        $parsedURL["path"] = ltrim($parsedURL["path"],"/");
        $parsedURL["path"] = trim($parsedURL["path"]);
        // Split by slashes and return array
        $dividedURL = explode("/", $parsedURL["path"]);

        return $dividedURL; 
    }

}