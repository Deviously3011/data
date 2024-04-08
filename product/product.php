<?php
include('../db.php');
require_once('../header.php');

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
   
    public function insertProduct($productName, $description, $price)
    { 
        return $this->db->exec("INSERT INTO product (productName, description, price) VALUES (?, ?, ?)", [$productName, $description, $price]);
    }
    public function selectProduct()
    {
        return $this->db->exec("SELECT * from product");
    }    
    
    public function selectSingleproduct($productID)
    {
    return $this->db->exec("SELECT * FROM product WHERE productID = ?", array($productID));
    }


     public function editproduct($productID, $productName, $price, $description)
     {
         return $this->db->exec("UPDATE product SET productName = ?, price = ?, description = ? WHERE productID = ?", [$productName, $price, $description, $productID]);
     }
     
     public function deleteproduct($productID)
     {
         return $this->db->exec("DELETE FROM product WHERE productID = ?", array($productID));
     }
}

