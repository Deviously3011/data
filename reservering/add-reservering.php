<?php
include('reservering.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $ReserveringsID = $_POST['reserveringsid'] ?? ''; // Use the null coalescing operator to handle undefined index
    $Tijdslot = $_POST['tijdslot'] ?? '';
    $TafelNummer = $_POST['tafelnummer'] ?? '';
    $KlantNaam = $_POST['klantnaam'] ?? ''; // Fix the variable name
    $KlantID = $_POST['klant'] ?? '';

    // Create Reservering instance
    $reservering = new Reservering($myDb);

    // Attempt to insert reservation data
    $success = $reservering->insertReservering($ReserveringsID, $Tijdslot, $TafelNummer, $KlantNaam, $KlantID);

    // Set message based on success or failure
    if ($success) {
        $message = "Reservering toegevoegd!";
    } else {
        $message = "Er is een fout opgetreden bij het toevoegen van de reservering";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservering</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add Reservering</h1>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="add-reservering.php" method="POST">
            <div class="form-group">
                <label for="reserveringsid">Reserverings ID:</label>
                <input type="text" id="reserveringsid" name="reserveringsid" class="form-control">
            </div>
            <div class="form-group">
                <label for="tijdslot">Tijdslot:</label>
                <input type="text" id="tijdslot" name="tijdslot" class="form-control">
            </div>
            <div class="form-group">
                <label for="tafelnummer">Tafelnummer:</label>
                <input type="number" id="tafelnummer" name="tafelnummer" class="form-control">
            </div>
            <div class="form-group">
                <label for="klantnaam">KlantNaam:</label> <!-- Fix the label -->
                <input type="text" id="klantnaam" name="klantnaam" class="form-control"> <
            </div>
            <div class="form-group">
                <label for="klant">Klant ID:</label>
                <input type="number" id="klant" name="klant" class="form-control">
            </div>
         
            <button type="submit" class="btn btn-primary">Voeg Reservering Toe</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional, only if you need Bootstrap JavaScript components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
