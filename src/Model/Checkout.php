<?php

class Checkout {

    public function __construct($checkoutInfo){
        $this->checkoutInfo = $checkoutInfo;
    }

    public function validateForm() {
        // Check if there is some empty argument
        $fields = $this->checkoutInfo;
        foreach($fields as $field){
            if(empty($field)) return false;
            }
        return true;    
    }

    // public function saveToDB($products) {
    //     foreach($products as $product) {
            

    //         // Create order Details
    //         $product["id"]
    //         $product["product-quantity"]
    //         order_id
    //         status


    //         // Create order
    //         $this->checkoutInfo["firstName"]
    //         $this->checkoutInfo["lastName"]
    //         $this->checkoutInfo["email"]
    //         $this->checkoutInfo["address"]
    //         $this->checkoutInfo["country"]
    //         $this->checkoutInfo["postalCode"]
    //         $this->checkoutInfo["payment"]
            

    //     }
    // }


}


?>