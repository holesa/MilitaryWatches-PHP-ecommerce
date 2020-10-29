<?php
class CheckoutController extends controller {

    public function process($url) {

        $this->header = array(
            "title" => "",
            "metaDescription" =>""
        );
        
        $this->view = "checkout";
    }

}
?>