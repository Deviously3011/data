<?php
include('../db.php');
require_once('../header.php');


class Rekening {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertRekening($Datum, $Tijd, $tafel, $afdeling,  $TotaalBedrag, $BTWPercentage, $inclBTW, $exclBTW)
    { 
        return $this->db->exec("INSERT INTO bonnen (Datum, Tijd, Tafel, Afdeling, TotaalBedrag, BTWPercentage, InclBTW, ExclBTW) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$Datum, $Tijd, $tafel, $afdeling, $TotaalBedrag, $BTWPercentage, $inclBTW, $exclBTW]);
    }
    
}
?>
