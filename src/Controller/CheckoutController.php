<?php
class CheckoutController extends controller {

    public function process($url) {
        if(!isset($_SESSION)) {
            session_start();
        }

        // If the cart is empty redirect to homepage
        if(empty($_SESSION["products"])) {
            $this->redirect("");
        }
        
        $this->header = array(
            "title" => "",
            "metaDescription" =>""
        );

        // Create variables for template
        $this->data["products"] = $_SESSION["products"];
        $this->data["totalPrice"] = $_SESSION["totalPrice"];
        $this->data["totalQuantity"] = $_SESSION["totalQuantity"];
        
        $this->view = "checkout";
    
       
    }

}
?>