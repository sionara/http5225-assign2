<?php
include('../includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Pet Store - Stock Items</title>
</head>

<body>
    <div class="container my-5">
        <h2>Stock Items</h2>
        <a href="./add.php" class="btn btn-primary" role="button">New Sale</a>

        <!-- Added back to home button for easier navigation -->
        <a class="btn btn-primary" href="../../login.php" role="button">Back to Home</a>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Inventory Count</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM stock_items";

                $stock_items = mysqli_query($connect, $query);
                if (mysqli_connect_error()) {
                    die("Connection error: " . mysqli_connect_error());
                }


                while ($result = $stock_items->fetch_assoc()) {
                    echo "
                <tr>
                    <td>$result[id]</td>
                    <td>$result[item]</td>
                    <td>$result[price]</td>
                    <td>$result[inventory]</td>
                    <td>$result[category]</td>
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