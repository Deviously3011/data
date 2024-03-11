<?php
include '../db.php';
class Klant {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertKlant($klantNaam) {
        try {
            return $this->db->exec("INSERT INTO klanten (KlantNaam) VALUES (?)", [$klantNaam]);
        } catch (Exception $e) {
            throw new Exception("Error inserting klant: " . $e->getMessage());
        }
    }
    public function selectKlant()
    {
        return $this->db->exec("SELECT * from klanten");
    }

}

