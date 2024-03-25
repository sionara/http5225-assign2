<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');

?>

<table class="table">
  <thead>
    <tr>
      <th>Employee_ID</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Year Week</th>
      <th>Week Start Date</th>
      <th>Week End Date</th>
      <th>Total Sales</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT 
                e.id AS employee_id,
                e.last_name AS last_name,
                e.first_name AS first_name,
                YEARWEEK(s.date) AS year_week,
                DATE_FORMAT(MIN(s.date), '%Y-%m-%d') AS week_start_date,
                DATE_FORMAT(MAX(s.date), '%Y-%m-%d') AS week_end_date,
                COUNT(*) AS total_sales
            FROM 
                sales s
            JOIN 
                employees e ON s.employee = e.id
            GROUP BY 
                e.id, e.last_name, e.first_name, YEARWEEK(s.date)
            ORDER BY 
                e.id, YEARWEEK(s.date)";

    $query = mysqli_query($connect, $query);
    if (mysqli_connect_error()) {
      die("Connection error: " . mysqli_connect_error());
    }


    while ($result = $query->fetch_assoc()) {
      echo "
                <tr>
                    <td>$result[employee_id]</td>
                    <td>$result[last_name]</td>
                    <td>$result[first_name]</td>
                    <td>$result[year_week]</td>
                    <td>$result[week_start_date]</td>
                    <td>$result[week_end_date]</td>
                    <td>$result[total_sales]</td>
                </tr>
                ";
    }
    ?>

  </tbody>
</table>
<?php

include("includes/footer.php");

?>