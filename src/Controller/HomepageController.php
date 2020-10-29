<?php
class HomepageController extends Controller {
    
    public function process($url){
        $returnProducts = new ReturnProducts();
        $products = $returnProducts->returnProducts();
        $this->data["products"] = $products;
        $this->header = array(
            "title" => "This is homepage",
            "metaDescription" => "Welcome here!"
        );
        $this->view = "homepage";
    }
}