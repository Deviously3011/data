<?php
include('../db.php');
include('reservering.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $datum = $_POST['datum'];
        $tijd = $_POST['tijd'];
        $tafel = $_POST['tafel'];
        $klant = $_POST['klant'];
       

        // Create Reservering instance
        $reservering = new Reservering($pdo);

        // Attempt to insert reservation data
        $success = $reservering->insertReservering($datum, $tijd, $tafel, $klant);

        // Set message based on success or failure
        if ($success) {
            $message = "Reservering toegevoegd!";
        } else {
            $message = "Er is een fout opgetreden bij het toevoegen van de reservering.";
        }
    } catch (PDOException $e) {
        // Database error
        $message = "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        // Other errors
        $message = "Error: " . $e->getMessage();
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
                <label for="datum">Datum:</label>
                <input type="date" id="datum" name="datum" class="form-control">
            </div>
            <div class="form-group">
                <label for="tijd">Tijd:</label>
                <input type="time" id="tijd" name="tijd" class="form-control">
            </div>
            <div class="form-group">
                <label for="tafel">Tafel:</label>
                <input type="number" id="tafel" name="tafel" class="form-control">
            </div>
            <div class="form-group">
                <label for="klant">Klant:</label>
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
            