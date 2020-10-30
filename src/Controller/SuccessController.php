<?php
class SuccessController extends Controller
{

    public function process($url) {
        $this->header = array(
            "title" => "",
            "metaDescription" =>""
        );

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
        // Save data to database
        // $checkout->saveToDB($_SESSION["products"],$_SESSION["totalPrice"],$_SESSION["totalQuantity"])    


            $this->view = "success";
            
        }
        
    }


}


?>