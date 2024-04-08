<?php
require_once('product.php');

// Check if KlantID is set
if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];

    // Create a new product object
    $product = new product($myDb);

    // Delete the product record
    $product->deleteproduct($productID);

    // Redirect to the view product page after deletion
    header("Location: view-product.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete product</title>
</head>
<body>
    <h2>Delete product</h2>
    <p>Are you sure you want to delete this product?</p>
    <form method="POST">
        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
    </form>
</body>
</html>
