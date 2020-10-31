<?php
class CheckoutController extends controller {

    public function process($input) {
        if(!isset($_SESSION)) {
            session_start();
        }

        // Redirect to the homepage if the cart is empty
        if(empty($_SESSION["products"])) {
            $this->redirect("");
        }
        
        $this->header = array(
            "title" => "Checkout",
            "metaDescription" => ""
        );

        // Create variables for template
        $this->data["products"] = $_SESSION["products"];
        $this->data["totalPrice"] = $_SESSION["totalPrice"];
        $this->data["totalQuantity"] = $_SESSION["totalQuantity"];
        
        $this->view = "checkout";
    }

}
?>