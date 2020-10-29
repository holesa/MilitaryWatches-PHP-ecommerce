<?php
class SessionController extends Controller {
    public function process($url) {
        if(!isset($_SESSION)) {
            session_start();
        }
    session_destroy(); 
    $this->header["title"] = "404 - page not found";
    $this->header["meta_description"] = "";
    $this->view = "error";
    
    }


   
}



?>