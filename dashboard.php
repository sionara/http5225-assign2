<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');

?>

<h1>This is the dashboard. We will show data about employees and sales here</h1>

<a href="./assignment2-OwenLaing/employees/list.php">See list of employees</a>

<a href="./assignment2-OwenLaing/sales/list.php">List of Sales</a>

<a href="logout.php">
  Logout
</a>

<?php

include("includes/footer.php");

?>