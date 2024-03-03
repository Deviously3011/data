<?php
include('../db.php');
require_once('../header.php');

// reservering.php
class Reservering {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertReservering($datum, $tijd, $tafel, $klant) {
        try {
            $sql = "INSERT INTO reserveringen (Datum, Tijd, TafelID, KlantID) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->exec($sql, [$datum, $tijd, $tafel, $klant]);
            return true; // Return true on success
        } catch (Exception $e) {
            // Capture the specific error message
            $errorMessage = $e->getMessage();
            return $errorMessage; // Return the error message on failure
        }
    }
}


