<?php
class SuccessController extends Controller
{
    public function process($url) {
        if(!isset($_SESSION)) {
            session_start();
        }

        $this->header = array(
            "title" => "Thank you!",
            "metaDescription" =>"Your order was completed successfuly."
        );

         // Invalid request
         if(!isset($_POST["first-name"])) {
            $this->redirect("");
        }

        $checkout = new Checkout(array(
            "firstName"=> $_POST["first-name"],
            "lastName"=> $_POST["last-name"],
            "email"=> $_POST["email"],
            "address"=> $_POST["address"],
            "country"=> $_POST["country"],
            "postalCode"=> $_POST["postal-code"],
            "payment"=> $_POST["payment"],
        ));

        if(!$checkout->validateForm()) {
            $this->redirect("checkout");
        } else {
        // Save the order to the database
            $orderId = $checkout->saveOrderToDb();
        // Save the order details to the database
            $orderDetails = $checkout->saveOrderDetailsToDb($_SESSION["products"], $orderId);
        // Clear session
            $_SESSION["totalQuantity"] = 0;
            $_SESSION["totalPrice"] = 0;
            $_SESSION["products"] = array();

            $this->view = "success";
        }
        
    }


}


?>