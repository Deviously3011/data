<?php
include('../db.php');
require_once('../header.php');


class Rekening {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertRekening($datum, $tijd, $tafel, $afdeling, $totaalBedrag, $btwPercentage, $inclBTW, $exclBTW) {
        try {
            $sql = "INSERT INTO bonnen (Datum, Tijd, Tafel, Afdeling, TotaalBedrag, BTWPercentage, InclBTW, ExclBTW) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->exec($sql, [$datum, $tijd, $tafel, $afdeling, $totaalBedrag, $btwPercentage, $inclBTW, $exclBTW]);
            return true; // Return true on success
        } catch (Exception $e) {
            // Handle the exception or log the error message
            return false; // Return false on failure
        }
    }
}
?>
