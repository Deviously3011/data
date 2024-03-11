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
    <div class="container">
        <h1>Overzicht Klanten</h1>
        
            <table class="w-100 p-3 table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
              
                    <?php foreach ($alleklanten as $Klant) { ?>
                        <tr>
                            <td><?php echo $Klant['KlantID']; ?></td>
                            <td><?php echo $Klant['KlantNaam']; ?></td>
                            <td>
                                <button class="btn btn-primary">Edit</button> 
                                </td>
                                <td>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
             
            </table>
        
    </div>
</body>
</html>
