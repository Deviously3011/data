<?php
require_once('product.php');
require_once('../header.php');   

// Check if both productnaam and productID are set
if (isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['description']) && isset($_GET['productID'])) {
    $productID = $_GET['productID'];
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
   


   
    $product = new product($myDb);

    $product->editproduct($productID, $productName, $price, $description );

    header("Location: view-product.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
    <!-- Bootstrap CSS -->
    
</head>
<body>
<div class="container">
    <h2>Edit product</h2>
    <form method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="productName" placeholder="Enter productName">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="price" placeholder="Enter price">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="description" placeholder="Enter description">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Edit</button>
    </form>
</div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>