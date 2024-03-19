<?php
include('../../includes/database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Pet Store - Employees</title>
</head>

<body>
    <div class="container my-5">
        <h2>Employees List</h2>
        <a href="./add.php" class="btn btn-primary" role="button">Add New Employee</a>

        <!-- Added back to home button for easier navigation -->
        <a class="btn btn-primary" href="../../login.php" role="button">Back to Home</a>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Sin Number</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM employees
                      ORDER BY last_name ASC";

                $employees = mysqli_query($connect, $query);
                if (mysqli_connect_error()) {
                    die("Connection error: " . mysqli_connect_error());
                }


                while ($result = $employees->fetch_assoc()) {
                    echo "
                <tr>
                    <td>$result[id]</td>
                    <td>$result[first_name]</td>
                    <td>$result[last_name]</td>
                    <td>$result[sin]</td>
                    <td>$result[phone]</td>
                    <td>$result[role]</td>
                    <td>
                        <a href='./update.php?id=$result[id]' class='btn btn-sm btn-warning'>Update</a>
                        <a href='./delete.php?id=$result[id]' class='btn btn-sm btn-danger'>Delete</a>
                    </td>
                </tr>
                ";
                }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>