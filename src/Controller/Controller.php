<?php
abstract class Controller
{
    // Data to be rendered
    protected $data = array();
    // Name of the HTML template
    protected $view = "";
    // Header of the HTML template
    protected $header = array("title" => "", "metaDescription" => "");
    
    // The main controller method
    abstract function process($input);

    //  Render specific view
    public function renderView() {
        if($this->view) {
            extract($this->data);
            require("views/" . $this->view . ".php");
        }
    }

   // Redirects to a given URL
    public function redirect($url) {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }


}