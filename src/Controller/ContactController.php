<?php
class ContactController extends Controller 
{

    public function process($url) {
        $this->header = array(
            "title" => "Contact us",
            "metaDescription" => "Have you any questions on us? Feel free to contact us."
        );

        if(isset($_POST["email"])) {
            if($_POST["rok"] === date("Y")) {
                $sendEmail = new SendEmail();
                $sendEmail->send("ispecant@gmail.com", "Random email", $_POST["zprava"], $_POST["email"]);
            }
        }

        $this->view="contact";
    }


}