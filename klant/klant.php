<?php
class Klant {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertKlant($klantNaam) {
        try {
            $sql = "INSERT INTO klanten (KlantNaam) VALUES (?)";
            $stmt = $this->db->exec($sql, [$klantNaam]);
            return $stmt;
        } catch (Exception $e) {
            throw new Exception("Error inserting klant: " . $e->getMessage());
        }
    }
}
?>
