<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');


if (isset($_POST['first'])) {

  if ($_POST['first'] and $_POST['last'] and $_POST['email'] and $_POST['password']) {

    $query = 'INSERT INTO users (
        first,
        last,
        email,
        password,
        active
      ) VALUES (
        "' . mysqli_real_escape_string($connect, $_POST['first']) . '",
        "' . mysqli_real_escape_string($connect, $_POST['last']) . '",
        "' . mysqli_real_escape_string($connect, $_POST['email']) . '",
        "' . md5($_POST['password']) . '",
        "' . $_POST['active'] . '"
      )';
    mysqli_query($connect, $query);

    set_message('Admin has been added');
  }

  /*
  // Example of debugging a query
  print_r($_POST);
  print_r($query);
  die();
  */

  header('Location: login.php');
  die();
}

include('includes/header.php');

?>

<h2>Register an Admin</h2>

<form method="post">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First Name:</label>
    <input type="text" class="form-control" id="first" aria-describedby="emailHelp" name='first' required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name:</label>
    <input type="text" class="form-control" id="last" aria-describedby="emailHelp" name='last' required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Email: </label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Password:</label>
    <input type="password" class="form-control" id="password" aria-describedby="emailHelp" name="password" required>
  </div>

  <label for="active">Active:</label>
  <?php

  $values = array('Yes', 'No');

  echo '<select name="active" id="active">';
  foreach ($values as $key => $value) {
    echo '<option value="' . $value . '"';
    echo '>' . $value . '</option>';
  }
  echo '</select>';

  ?>

  <br>

  <button type="submit" class="btn btn-primary m-3" value="Add User">Submit</button>

</form>

<p><a href="login.php"><i class="fas fa-arrow-circle-left"></i> Return to login</a></p>


<?php

include('includes/footer.php');

?>