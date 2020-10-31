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

    // Insert new order into orders table
    public function saveOrderToDb() {
        $params = array(
            $this->checkoutInfo["firstName"],
            $this->checkoutInfo["lastName"],
            $this->checkoutInfo["email"],
            $this->checkoutInfo["address"],
            $this->checkoutInfo["country"],
            $this->checkoutInfo["postalCode"],
            $this->checkoutInfo["payment"]
        );

        return Database::insertAndReturnID("INSERT INTO orders (
        first_name, last_name, email, address, country, postal_code, payment)
        VALUES (?,?,?,?,?,?,?)", $params);  
  }

  // Insert order detail into order_details table
    public function saveOrderDetailsToDb($products, $orderId) {
        foreach($products as $product) {
            $params = array(
                $orderId,
                $product["id"],
                $product["product-quantity"]
            );
            
            Database::insert("INSERT INTO orders_details (
                order_id, product_id, quantity, date)
                VALUES (?,?,?,now())", $params);  

        }
    }
}


?>