<?php
include('tafel.php'); // Include the Tafel class
require_once('../header.php'); // Include the header file or database connection

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $TafelNummer = $_POST['TafelNummer'];
    $Capaciteit = $_POST['Capaciteit'];

    // Create Tafels instance
    $tafels = new Tafels($myDb); // Assuming $pdo is your database connection object

    // Attempt to insert tafel data
    $success = $tafels->insertTafel($TafelNummer, $Capaciteit);

    // Set message based on success or failure
    if ($success) {
        $message = "Tafel toegevoegd!";
    } else {
        $message = "Er is een fout opgetreden bij het toevoegen van de tafel.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tafel</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Add Tafels</h1>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="add-tafel.php" method="POST">
            <div class="mb-3">
                <label for="TafelNummer" class="form-label">Tafelnummer:</label>
                <input type="text" class="form-control" id="TafelNummer" name="TafelNummer">
            </div>
            <div class="mb-3">
                <label for="Capaciteit" class="form-label">Capaciteit:</label>
                <input type="text" class="form-control" id="Capaciteit" name="Capaciteit">
            </div>
            <button type="submit" class="btn btn-primary">Voeg tafel Toe</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional, only if you need Bootstrap JavaScript components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-bTjDol6Dv6fB9sr+ZHCrzpHuA3v+57vpvXcfn8XMFRZ0J4cEAimQNenRTk0RmoPt" crossorigin="anonymous"></script>
</body>
</html>
