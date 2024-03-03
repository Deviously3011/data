<?php
include('../db.php');
require_once('../header.php');

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertProduct($productName, $price) {
        try {
            $sql = "INSERT INTO product(ProductName, Price) VALUES (?, ?)";
            $stmt = $this->db->exec($sql, [$productName, $price]);
            return true; // Return true on success
        } catch (Exception $e) {
            // Capture the specific error message
            $errorMessage = $e->getMessage();
            return $errorMessage; // Return the error message on failure
        }
    }
}

?>
