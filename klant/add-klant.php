<?php
include('../db.php');
include('klant.php');
require_once('../header.php');
$message = ''; // Variable to hold success/error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $klantNaam = $_POST['klantNaam'];

    // Create Klant instance
    $klant = new Klant($pdo);

    // Attempt to insert customer data
    $success = $klant->insertKlant($klantNaam);

    // Set message based on success or failure
    if ($success) {
        $message = "Klant toegevoegd!";
    } else {
        $message = "Er is een fout opgetreden bij het toevoegen van de klant.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Klant</title>
</head>
<body>
    <h1>Add Klant</h1>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="add-klant.php" method="POST">
        <label for="klantNaam">Klant Naam:</label>
        <input type="text" id="klantNaam" name="klantNaam">
        <button type="submit">Voeg Klant Toe</button>
    </form>
</body>
</html>
