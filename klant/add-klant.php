<?php
require_once('klant.php'); // Assuming db.php contains the DB class definition
require_once('../header.php');

$message = ''; // Variable to hold success/error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $klantNaam = $_POST['klantNaam'];


        // Create Klant instance with the DB instance
        $klant = new Klant($myDb);

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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-lSU2FvWswfFZ3s6dODmKgoNX5Up6OA3cRfhYJidwYPpA9zw/bfvcf/L8JC6zr4F2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Add Klant</h1>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="add-klant.php" method="POST">
            <div class="mb-3">
                <label for="klantNaam" class="form-label">Klant Naam:</label>
                <input type="text" class="form-control" id="klantNaam" name="klantNaam">
            </div>
            <button type="submit" class="btn btn-primary">Voeg Klant Toe</button>
        </form>
    </div>

    <!-- Bootstrap JavaScript (Optional, only needed if you use Bootstrap JS components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-bTjDol6Dv6fB9sr+ZHCrzpHuA3v+57vpvXcfn8XMFRZ0J4cEAimQNenRTk0RmoPt" crossorigin="anonymous"></script>
</body>
</html>

