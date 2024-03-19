<?php

include('../includes/connect.php');

$id = "";
$date = "";
$item = "";
$employee = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $item = $_POST['item'];
    $employee = $_POST['employee'];

    $errorMessage = "";

    do {
        if (empty($id) || empty($date) || empty($item) || empty($employee)) {
            $errorMessage = "All the fields are required";
            break;
        }
        $query = "INSERT INTO sales (id, date, item, employee)
        VALUES ('$id', '$date', '$item', '$employee')";
        $result = mysqli_query($connect, $query);
        if (!$result) {
            $errorMessage = "Invalid query: " . mysqli_error($connect);
            break;
        }

        $id = "";
        $date = "";
        $item = "";
        $employee = "";


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
                <label class="col-sm-3 col-form-label">Sales ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="12345" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Item ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="item" placeholder="1234" value="<?php echo $item; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Employee ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="123" name="employee" value="<?php echo $employee; ?>">
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