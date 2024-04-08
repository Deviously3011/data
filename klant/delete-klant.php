<?php
require_once('klant.php');

// Check if KlantID is set
if (isset($_GET['KlantID'])) {
    $klantID = $_GET['KlantID'];

    // Create a new Klant object
    $klant = new Klant($myDb);

    // Delete the klant record
    $klant->deleteKlant($klantID);

    // Redirect to the view klant page after deletion
    header("Location: view-klant.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Klant</title>
</head>
<body>
    <h2>Delete Klant</h2>
    <p>Are you sure you want to delete this klant?</p>
    <form method="POST">
        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
    </form>
</body>
</html>
