<?php
require_once('Tafel.php'); // Assuming Tafel.php contains the Tafels class definition
require_once('../header.php');

$tafel = new Tafels($myDb);
$alleTafels = $tafel->selectTafel()->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Tafels</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Overzicht Tafels</h1>
        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Capaciteit</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alleTafels as $tafel) { ?>
                    <tr>
                        <td><?php echo $tafel['TafelID']; ?></td>
                        <td><?php echo $tafel['TafelNummer']; ?></td>
                        <td><?php echo $tafel['Capaciteit']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="edit-tafel.php?TafelID=<?php echo $tafel['TafelID']; ?>">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete-tafel.php?TafelID=<?php echo $tafel['TafelID']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
