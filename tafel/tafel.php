<?php
include('../db.php');
require_once('../header.php');
class Tafels {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertTafel($Tafelnummer, $capaciteit)
    {
        return $this->db->exec("INSERT INTO tafels (tafelnummer, capaciteit) VALUES ('$Tafelnummer', '$capaciteit')");
    }
    public function selectTafel()
    {
        return $this->db->exec("SELECT * from tafels");
    }
    public function editTafel($TafelID, $TafelNummer, $Capaciteit)
    {
        return $this->db->exec("UPDATE tafels SET tafelnummer = ?, capaciteit = ? WHERE TafelID = ?", [$TafelNummer, $Capaciteit, $TafelID]);
    }
    
    public function deleteTafel($TafelID)
    {
        return $this->db->exec("DELETE FROM tafels WHERE TafelID = ?", [$TafelID]);
    }
    
}
