<?php
include('../db.php');
include('tafel.php');
require_once('../header.php');


$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nummer = $_POST['nummer'];
    $capaciteit = $_POST['capaciteit'];

    // Create Tafels instance
    $tafels = new Tafels($pdo);

    // Attempt to insert tafel data
    $success = $tafels->insertTafel($nummer, $capaciteit);

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
        <h1 class="mt-5">Add Tafel</h1>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="add-tafel.php" method="POST">
            <div class="form-group">
                <label for="nummer">Tafel Nummer:</label>
                <input type="number" class="form-control" id="nummer" name="nummer">
            </div>
            <div class="form-group">
                <label for="capaciteit">Capaciteit:</label>
                <input type="number" class="form-control" id="capaciteit" name="capaciteit">
            </div>
            <button type="submit" class="btn btn-primary">Voeg Tafel Toe</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional, only if you need Bootstrap JavaScript components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
