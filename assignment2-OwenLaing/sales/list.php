<?php
include('../includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Pet Store - Sales</title>
</head>

<body>
    <div class="container my-5">
        <h2>Sales Records</h2>
        <a href="./add.php" class="btn btn-primary" role="button">New Sale</a>

        <!-- Added back to home button for easier navigation -->
        <a class="btn btn-primary" href="../../login.php" role="button">Back to Home</a>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Item</th>
                    <th>Employee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Updated SQL query to fetch sales records along with employee names and item names
                $query = "SELECT s.id, s.date, si.item AS item_name, CONCAT(e.first_name, ' ', e.last_name) AS employee_name
                      FROM sales s
                      JOIN employees e ON s.employee = e.id
                      JOIN stock_items si ON s.item = si.id";

                $sales = mysqli_query($connect, $query);
                if (mysqli_connect_error()) {
                    die("Connection error: " . mysqli_connect_error());
                }


                while ($result = $sales->fetch_assoc()) {
                    echo "
                <tr>
                    <td>$result[id]</td>
                    <td>$result[date]</td>
                    <td>$result[item_name]</td>
                    <td>$result[employee_name]</td>
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