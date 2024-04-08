<?php
require_once('tafel.php');

// Check if TafelID is set
if (isset($_GET['TafelID'])) {
    $TafelID = $_GET['TafelID'];

    // Create a new Tafel object
    $Tafel = new Tafels($myDb);

    // Delete the Tafel record
    $Tafel->deleteTafel($TafelID);

    // Redirect to the view Tafel page after deletion
    header("Location: view-tafel.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete tafels</title>
</head>
<body>
    <h2>Delete tafels</h2>
    <p>Are you sure you want to delete this <table></table>?</p>
    <form method="POST">
        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
    </form>
</body>
</html>
