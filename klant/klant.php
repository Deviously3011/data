<?php
include '../db.php';
class Klant {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertKlant($klantname)
    { 
        return $this->db->exec("INSERT INTO klanten (KlantNaam) VALUES (?)", [$klantname]);
    }
    public function selectKlant()
    {
        return $this->db->exec("SELECT * from klanten");
    }
    public function selectSingleKlant($klantID)
    {
    return $this->db->exec("SELECT * FROM klanten WHERE KlantID = ?", array($klantID));
     }


    public function editKlant($klantNaam, $klantID)
    {
        return $this->db->exec("UPDATE klanten SET KlantNaam = ? WHERE KlantID = ?", [$klantNaam, $klantID]);
    }
    public function deleteKlant($klantID)
    {
    return $this->db->exec("DELETE FROM klanten WHERE KlantID = ?", array($klantID));
    }



}