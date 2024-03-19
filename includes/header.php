<!doctype html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

  <title>Website Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>

</head>

<body>

  <?php if (isset($_SESSION['id'])) : ?>


    <!-- <p style="padding: 0 1%; text-align: center;">
      <a href="dashboard.php">Dashboard</a> |
      <a href="logout.php">Logout</a>
    </p> -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <!-- flex: space between  -->
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Admin Manager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./assignment2-OwenLaing/employees/list.php">Employees</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./assignment2-OwenLaing/sales/list.php">Sales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./assignment2-OwenLaing/stock_items/list.php">Stock</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <h1>Employees manager</h1>

  <?php endif; ?>

  <hr>

  <?php echo get_message(); ?>

  <div style="max-width: 1500px; margin: auto; padding: 0 1%;">