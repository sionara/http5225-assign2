<?php

include('../includes/connect.php');

$id = "";
$item = "";
$price = "";
$inventory = "";
$category = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $item = $_POST['item'];
    $price = $_POST['price'];
    $inventory = $_POST['inventory'];
    $category = $_POST['category'];

    $errorMessage = "";

    do {
        if (empty($id) || empty($item) || empty($price) || empty($inventory) || empty($category)) {
            $errorMessage = "All the fields are required";
            break;
        }
        $query = "INSERT INTO stock_items (id, item, price, inventory, category)
        VALUES ('$id', '$item', '$price', '$inventory', '$category')";
        $result = mysqli_query($connect, $query);
        if (!$result) {
            $errorMessage = "Invalid query: " . mysqli_error($connect);
            break;
        }

        $id = "";
        $item = "";
        $price = "";
        $inventory = "";
        $category = "";


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
    <title>Pet Store - Add Sale</title>
</head>
<body>
    <div class="container my-5">
        <h2>Add Sale</h2>

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
                    <input type="text" class="form-control" placeholder="1234" name="id" value="<?php echo $id; ?>">
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