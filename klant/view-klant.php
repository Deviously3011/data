<?php
require_once('klant.php'); // Assuming db.php contains the DB class definition
require_once('../header.php');

$Klant = new Klant($myDb);

$alleklanten = $Klant->selectKlant()->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Overzicht Klanten</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th> colspan "2"</th>
        </tr>
        <?php foreach ($alleklanten as $Klant) { ?>
        <tr>
            <td><?php echo $Klant['KlantID']; ?></td>
            <td><?php echo $Klant['KlantNaam']; ?></td>
        </tr>
    <?php } ?> 
    </table>
</body>
</html>