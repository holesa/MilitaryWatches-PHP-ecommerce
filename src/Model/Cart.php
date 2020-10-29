<?php
class Cart 
{

    public function addItem($data) {
        $result = array();
        // Create associative array from the string 
        parse_str($data,$result);
        $result["itemId"] = uniqid();
        // Update the product quantity session variable
        $_SESSION["totalQuantity"] += $result["product-quantity"];
        // Add the product to the array
        $_SESSION["products"][] = $result;

        // Sum total price
        $_SESSION["totalPrice"]+=intval($result["price"]) * intval($result["product-quantity"]);
    }


    public function removeItem($id) {
        $cart = $_SESSION["products"];
        foreach($cart as $index=>$item) {
            if($item["itemId"] === $id) {
                $quantity = $item["product-quantity"];
                // Update price
                $itemPrice = intval($item["price"]) * intval($item["product-quantity"]);;
                $_SESSION["totalPrice"]-=$itemPrice;
                // Update quantity
                $_SESSION["totalQuantity"] -= $quantity;
                // Remove item from session
                array_splice($_SESSION["products"],$index,1);
            }
        }
    }


    public function updateQuantity($id, $newQuantity, $maxQuantitiy) {
        $newQuantity = intval($newQuantity);
        if(!is_int($newQuantity) || $newQuantity < 1 || $newQuantity > $maxQuantitiy) return false;
        $cart = $_SESSION["products"];
        foreach($cart as $index=>$item) {
            if($item["itemId"] === $id) {
                // Update quantity
                $oldQuantity = $item["product-quantity"];
                $_SESSION["products"][$index]["product-quantity"] = $newQuantity;
                $_SESSION["totalQuantity"] -= $oldQuantity;
                $_SESSION["totalQuantity"] += $newQuantity;
                // Update price
                $price = intval($item["price"]);
                $_SESSION["totalPrice"] = $_SESSION["totalPrice"] - ($price * intval($oldQuantity)) + ($price * intval($newQuantity));;
            }
        }   
    }


}

?>