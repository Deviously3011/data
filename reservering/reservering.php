<?php
include('../db.php');
require_once('../header.php');

// reservering.php
class Reservering {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertreservering($ReserveringsID, $Tijdslot, $TafelNummer, $KlantNaam, $KlantID)
    { 
        return $this->db->exec("INSERT INTO reserveringen (ReserveringsID, Tijdslot, TafelNummer, KlantNaam, KlantID ) VALUES (?, ?, ?, ?, ?)", [$ReserveringsID, $Tijdslot, $TafelNummer, $KlantNaam, $KlantID]);
    }
    public function selectreserveringen()
    {
        return $this->db->exec("SELECT * from reserveringen");
    }    
    
    public function selectSinglereservering($reserveringsID)
    {
    return $this->db->exec("SELECT * FROM reserveringen WHERE reserveringenID = ?", array($reserveringsID));
    }
    public function editreservering($productID, $productName, $price, $description)
    {
        return $this->db->exec("UPDATE product SET productName = ?, price = ?, description = ? WHERE productID = ?", [$productName, $price, $description, $productID]);
    }
    
    public function deletereservering($reserveringsID)
    {
        return $this->db->exec("DELETE FROM reserveringen WHERE reserveringsID = ?", array($reserveringsID));
    }
}


