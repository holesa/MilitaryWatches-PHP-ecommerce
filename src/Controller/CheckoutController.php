<?php
class CheckoutController extends controller {

    public function process($url) {
        if(!isset($_SESSION)) {
            session_start();
        }

        // Return the checkout page if there are some products in the cart
        if(!empty($_SESSION["products"])) {
            $this->header = array(
                "title" => "",
                "metaDescription" =>""
            );
    
            // Create variables for template
            $this->data["products"] = $_SESSION["products"];
            $this->data["totalPrice"] = $_SESSION["totalPrice"];
            $this->data["totalQuantity"] = $_SESSION["totalQuantity"];
            
            $this->view = "checkout";
        } else {
            $this->redirect("");
        }
       
    }

}
?>