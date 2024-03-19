<?php

include('../includes/connect.php');

$id = "";
$first_name = "";
$last_name = "";
$sin = "";
$phone = "";
$role = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sin = $_POST['sin'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    $errorMessage = "";

    do {
        if (empty($id) || empty($first_name) || empty($last_name) || empty($sin) || empty($phone) || empty($role)) {
            $errorMessage = "All the fields are required";
            break;
        }
        $query = "INSERT INTO employees (id, first_name, last_name, sin, phone, role)
        VALUES ('$id', '$first_name', '$last_name', '$sin', '$phone', '$role')";
        $result = mysqli_query($connect, $query);
        if (!$result) {
            $errorMessage = "Invalid query: " . mysqli_error($connect);
            break;
        }

        $id = "";
        $first_name = "";
        $last_name = "";
        $sin = "";
        $phone = "";
        $role = "";


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
    <title>Pet Store - Add New Employee</title>
</head>
<body>
    <div class="container my-5">
        <h2>Add New Employee</h2>

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
                <label class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="123" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Sin Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="123456789" name="sin" value="<?php echo $sin; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="role" value="<?php echo $role; ?>">
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