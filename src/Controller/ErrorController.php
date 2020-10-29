<?php
class ErrorController extends Controller {

    public function process($url){
        header("HTTP/1.0 404 Not Found");
        $this->header["title"] = "404 - page not found";
        $this->header["meta_description"] = "";
        $this->view = "error";
    }

    



}