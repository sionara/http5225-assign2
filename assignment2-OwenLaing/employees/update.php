<?php

include('../includes/connect.php');

$id = "";
$first_name = "";
$last_name = "";
$sin = "";
$phone = "";
$role = "";

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: ./list.php");
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM employees WHERE id = $id";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ./list.php");
        exit;
    }

    $id = $row['id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $sin = $row['sin'];
    $phone = $row['phone'];
    $role = $row['role'];
}
else {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sin = $_POST['sin'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    do {
        if (empty($id) || empty($first_name) || empty($last_name) || empty($sin) || empty($phone) || empty($role)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE employees 
                SET first_name = '$first_name', last_name = '$last_name', sin = '$sin', phone = '$phone', role = '$role' 
                WHERE id = $id";
        $result = $connect->query($sql);
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
    <title>Update Employee</title>
</head>
<body>
    <div class="container my-5">
        <h2>Update Employee</h2>

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