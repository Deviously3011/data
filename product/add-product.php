<?php
include('../db.php');
include('product.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST['productName'];
    $price = $_POST['price'];

    // Create Product instance
    $product = new Product($pdo);

    // Attempt to insert product data
    $result = $product->insertProduct($productName, $price);

    // Check if the result is true or an error message
    if ($result === true) {
        $message = "Product toegevoegd!";
    } else {
        $message = "Er is een fout opgetreden bij het toevoegen van het product: " . $result;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add Product</h1>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="add-product.php" method="POST">
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" id="productName" name="productName">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional, only if you need Bootstrap JavaScript components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
