<?php
include('../db.php');
require_once('../header.php');
class Tafels {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertTafel($nummer, $capaciteit) {
        try {
            $sql = "INSERT INTO tafels (TafelNummer, Capaciteit) VALUES (?, ?)";
            $stmt = $this->db->exec($sql, [$nummer, $capaciteit]);
            return $stmt; // Return the PDO statement
        } catch (Exception $e) {
            // Throw an exception to be handled by the caller
            throw new Exception("Error inserting tafel: " . $e->getMessage());
        }
    }
    
}
