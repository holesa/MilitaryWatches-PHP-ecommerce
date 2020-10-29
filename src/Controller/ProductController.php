<?php
class ProductController extends Controller 
{
    public function process($params) {
        $returnProducts = new ReturnProducts();
        if(!empty($params[0])){
            $product = $returnProducts->returnProduct($params[0]);
            if(!$product) {
               $this->redirect("error");
            }
            
            $this->header = array(
                "title" => $product["name"],
                "metaDescription" => $product["meta_description"]
            );
            $this->data["title"] = $product["name"];
            $this->data["metaDescription"] = $product["meta_description"];
            $this->data["id"] = $product["product_id"];
            $this->data["name"] = $product["name"];
            $this->data["url"] = $product["url"];
            $this->data["description"] = $product["description"];
            $this->data["specifications"] = $product["specifications"];
            $this->data["price"] = $product["price"];
            $this->data["avalibility"] = $product["avalibility"];
            $this->data["quantity"] = $product["quantity"];
    
            $this->view = "product";
        } else {
            $this->redirect("");
        }
       
    }



}