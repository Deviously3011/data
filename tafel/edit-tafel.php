<?php
require_once('Tafel.php');
require_once('../header.php');

// Check if TafelID is set in the URL
if (isset($_GET['TafelID'])) {
    // Retrieve TafelID from the URL
    $TafelID = $_GET['TafelID'];

    // Check if form is submitted to update Tafel details
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve Tafelnummer and Capaciteit from the form
        $TafelNummer = $_POST['TafelNummer'];
        $Capaciteit = $_POST['Capaciteit'];
        
        // Create a new Tafel object
        $tafel = new Tafels($myDb);

        // Update the Tafel details
        $tafel->editTafel($TafelID, $TafelNummer, $Capaciteit);

        // Redirect to view-tafel.php page after editing
        header("Location: view-tafel.php");
        exit();
    }
} else {
    // Redirect to view-tafel.php page if TafelID is not set
    header("Location: view-tafel.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tafel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Tafel</h2>
        <!-- Display tafel details in the form -->
        <form method="POST">
            <div class="form-group">
                <label for="TafelNummer">Tafelnummer:</label>
                <input type="text" class="form-control" id="TafelNummer" name="TafelNummer" placeholder="Enter Tafelnummer">
            </div>
            <div class="form-group">
                <label for="Capaciteit">Capaciteit:</label>
                <input type="text" class="form-control" id="Capaciteit" name="Capaciteit" placeholder="Enter Capaciteit">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Edit</button>
        </form>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
