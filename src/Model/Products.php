<?php
class Products 
{

    public function returnProduct($url) {
        return Database::querySingle("SELECT *
        FROM products WHERE url=?", array($url));
    }


    public function returnProducts() {
        return Database::queryAll("SELECT * FROM products");
    }



}