<?php
require_once('product.php'); 
require_once('../header.php');

$product = new product($myDb);
$AlleProducten = $product->selectProduct()->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prductview</title>
 
    
</head>
<body>
    <div class="container">
        <h1>Overzicht product</h1>
        
            <table class="w-100 p-3 table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Price</th>
                        <th>description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
              
                    <?php foreach ($AlleProducten as $product) { ?>
                        <tr>
                            <td><?php echo $product['productID']; ?></td>
                            <td><?php echo $product['productName']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['description']; ?></td>
                            <td>
                            <a class="btn btn-primary" href="edit-product.php?productID=<?php echo $product['productID']; ?>">edit</a>
                             </td>
                            <td>
                            <a class="btn btn-danger" href="Delete-product.php?productID=<?php echo $product['productID']; ?>">Delete</a>
                        </td>
                        </tr>
                    <?php } ?>
             
            </table>
        
    </div>
</body>
</html>
