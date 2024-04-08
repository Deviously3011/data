<?php
require_once('klant.php');
require_once('../header.php');   

// Check if both Klantnaam and KlantID are set
if (isset($_POST['Klantnaam']) && isset($_GET['KlantID'])) {
  
    $klantnaam = $_POST['Klantnaam'];
    $klantID = $_GET['KlantID'];

   
    $klant = new Klant($myDb);

    $klant->editKlant($klantnaam, $klantID);

    header("Location: view-klant.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Klant</title>
    <!-- Bootstrap CSS -->
    
</head>
<body>
    <div class="container">
        <h2>Edit Klant</h2>
        <form method="POST">
            <input type="text" class="form-control" name="Klantnaam" placeholder="Enter Klantnaam">
            <button type="submit" class="btn btn-primary mt-2">Edit</button>
        </form>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>