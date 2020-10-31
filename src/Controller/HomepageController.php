<?php
class HomepageController extends Controller {
    
    public function process($input){
        $returnProducts = new Products();
        $products = $returnProducts->returnProducts();
        $this->data["products"] = $products;
        $this->header = array(
            "title" => "MilitaryWatches",
            "metaDescription" => "Choose from a new collection of military watches at militarywatches.site"
        );
        $this->view = "homepage";
    }
}