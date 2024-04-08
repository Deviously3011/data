<?php
require_once('product.php'); 
require_once('../header.php');

$message = ''; // Variable to hold success/error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $description = $_POST['description'];



        // Create product instance with the DB instance
        $product = new product($myDb);

        // Attempt to insert customer data
        $success = $product->insertProduct($productName, $price, $description);

        // Set message based on success or failure
        if ($success) {
            $message = " product toegevoegd!";
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
    <title>Add product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-lSU2FvWswfFZ3s6dODmKgoNX5Up6OA3cRfhYJidwYPpA9zw/bfvcf/L8JC6zr4F2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Add product</h1>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="add-product.php" method="POST">
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name:</label>
                <input type="text" class="form-control" id="productName" name="productName">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>  
       
            <div class="mb-3">
                <label for="description" class="form-label">description:</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>  
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <!-- Bootstrap JavaScript (Optional, only needed if you use Bootstrap JS components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-bTjDol6Dv6fB9sr+ZHCrzpHuA3v+57vpvXcfn8XMFRZ0J4cEAimQNenRTk0RmoPt" crossorigin="anonymous"></script>
</body>
</html>