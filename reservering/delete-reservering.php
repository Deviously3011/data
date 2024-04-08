<?php
require_once('reservering.php');

// Check if KlantID is set
if (isset($_GET['reserveringsID'])) {
    $klantID = $_GET['reserveringsID'];

    // Create a new Klant object
    $reservering = new $reservering($myDb);

    // Delete the klant record
    $reservering->deletereservering($reserveringsID);

    // Redirect to the view klant page after deletion
    header("Location: view-reservering.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete reservering</title>
</head>
<body>
<h2>Delete reservering</h2>
    <p>Are you sure you want to delete this reservering?</p>
    <form method="POST">
        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
    </form>
</body>
</html>
