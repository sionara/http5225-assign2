<?php

include('../includes/connect.php');

$id = "";
$item = "";
$price = "";
$inventory = "";
$category = "";

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: ./list.php");
        exit;
    }

    $id = $_GET['id'];

    $query = "SELECT * FROM stock_items WHERE id = $id";
    $result = $connect->query($query);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ./list.php");
        exit;
    }

    $id = $row['id'];
    $item = $row['item'];
    $price = $row['price'];
    $inventory = $row['inventory'];
    $category = $row['category'];

}
else {
    $id = $_POST['id'];
    $item = $_POST['item'];
    $price = $_POST['price'];
    $inventory = $_POST['inventory'];
    $category = $_POST['category'];

    do {
        if (empty($id) || empty($item) || empty($price) || empty($inventory) || empty($category)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $query = "UPDATE stock_items 
                SET item = '$item', price = '$price', inventory = '$inventory', category = '$category' 
                WHERE id = $id";
        $result = $connect->query($query);
        if (!$result) {
            $errorMessage = "Invalid query: " . $connect->error;
            break;
        }

        header("location: ./list.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pet Store - Update Stock Item</title>
</head>
<body>
    <div class="container my-5">
        <h2>Update Stock Item</h2>

        <?php 
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
        <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Item ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="123" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Item Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item" value="<?php echo $item; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Item Price</label>
                <div class="col-sm-6">
                    <input type="decimal" class="form-control" name="price" value="<?php echo $price; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Inventory Count</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="inventory" value="<?php echo $inventory; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="category" value="<?php echo $category; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="./list.php">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>
</html>