<?php
class CartController extends Controller 
{
    public function process($input) {
        $cart = new Cart();
        if(!isset($_SESSION)) {
            session_start();
        }
         // If the form has been submitted
         if(isset($_POST["productData"])) {
            // Add item to the session
            $cart->addItem($_POST["productData"]);
         }

         // If the item has been removed 
         if(isset($_POST["removeItemId"])) {
            $cart->removeItem($_POST["removeItemId"]);
         }

         // If the item quantity has been updated
         if(isset($_POST["changeQuantityId"])) {
            $cart->updateQuantity($_POST["changeQuantityId"],$_POST["newQuantity"],$_POST["maxQuantity"]);
         }

         $this->view = "cart";
         $this->header["title"] = "Cart"; 
         $this->header["metaDescription"] = "";

         // Create variables for template
         $this->data["products"] = $_SESSION["products"];
         $this->data["totalPrice"] = $_SESSION["totalPrice"];
         $this->data["totalQuantity"] = $_SESSION["totalQuantity"];
    }


}