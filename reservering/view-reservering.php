<?php
require_once('reservering.php');
require_once('../header.php');

$reservering = new Reservering($myDb);
$alleReserveringen = $reservering->selectReserveringen()->fetchAll(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservering View</title>
</head>
<body>
    <div class="container">
        <h1>Overzicht reserveringen</h1>
        
        <table class="w-100 p-3 table">
            <thead class="thead-dark">
                <tr>
                    <th>Reserverings ID</th>
                    <th>Tijdslot</th>
                    <th>Tafelnummer</th>
                    <th>Klant ID</th>
                    <th>Klantnaam</th> <!-- Assuming Klantnaam is stored in the database -->
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($alleReserveringen)) {
                    foreach ($alleReserveringen as $reservering) { 
                ?>
                    <tr>
                        <td><?php echo isset($reservering['reserveringsid']) ? $reservering['reserveringsid'] : 'N/A'; ?></td>
                        <td><?php echo isset($reservering['tijdslot']) ? $reservering['tijdslot'] : 'N/A'; ?></td>
                        <td><?php echo isset($reservering['tafelnummer']) ? $reservering['tafelnummer'] : 'N/A'; ?></td>
                        <td><?php echo isset($reservering['klantid']) ? $reservering['klantid'] : 'N/A'; ?></td>
                        <td><?php echo isset($reservering['klantnaam']) ? $reservering['klantnaam'] : 'N/A'; ?></td>
                        <td>
                            <a class="btn btn-primary" href="edit-reservering.php?reserveringsid=<?php echo isset($reservering['reserveringsid']) ? $reservering['reserveringsid'] : ''; ?>">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete-reservering.php?reserveringsid=<?php echo isset($reservering['reserveringsid']) ? $reservering['reserveringsid'] : ''; ?>">Delete</a>
                        </td>
                    </tr>
                <?php 
                    } 
                } else {
                    echo '<tr><td colspan="7">No reservations found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
