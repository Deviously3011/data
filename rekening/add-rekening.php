<?php
include('Rekening.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $datum = $_POST['datum'];
    $tijd = $_POST['tijd'];
    $tafel = $_POST['tafel'];
    $afdeling = $_POST['afdeling'];
  
    $totaalbedrag = $_POST['totaalBedrag'];
    $btwpercentage = $_POST['btwPercentage'];
    $inclbtw = $_POST['inclBTW'];
    $exclbtw = $_POST['exclBTW'];

    $Rekening = new Rekening($myDb);

    $success = $Rekening->insertRekening($datum, $tijd, $tafel, $afdeling, $totaalbedrag, $btwpercentage, $inclbtw, $exclbtw);
    if ($success) {
        $message = "rekening toegevoegd!";
    } else {
        $message = "Er is een fout opgetreden bij het toevoegen van het product";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rekening</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add Rekening</h1>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="add-rekening.php" method="POST">
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
                <label for="afdeling">Afdeling:</label>
                <input type="text" id="afdeling" name="afdeling" class="form-control">
            </div>
            <div class="form-group">
                <label for="totaalBedrag">Totaal Bedrag:</label>
                <input type="number" id="totaalBedrag" name="totaalBedrag" class="form-control">
            </div>
            <div class="form-group">
                <label for="btwPercentage">BTW Percentage:</label>
                <input type="number" id="btwPercentage" name="btwPercentage" class="form-control">
            </div>
            <div class="form-group">
                <label for="inclBTW">Incl BTW:</label>
                <input type="number" id="inclBTW" name="inclBTW" class="form-control">
            </div>
            <div class="form-group">
                <label for="exclBTW">Excl BTW:</label>
                <input type="number" id="exclBTW" name="exclBTW" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Voeg Rekening Toe</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional, only if you need Bootstrap JavaScript components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
