<?php

include('includes/check_session.php');
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

if (isset($_POST['email'])) {

  $query = 'SELECT *
    FROM users
    WHERE email = "' . $_POST['email'] . '"
    AND password = "' . md5($_POST['password']) . '"
    AND active = "Yes"
    LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (mysqli_num_rows($result)) {

    $record = mysqli_fetch_assoc($result);

    $_SESSION['id'] = $record['id'];
    $_SESSION['email'] = $record['email'];

    // redirects to dashboard.php
    header('Location: dashboard.php');
    die();
  } else {

    set_message('Incorrect email and/or password');

    header('Location: login.php');
    die();
  }
}

include('includes/header.php');

?>

<div style="max-width: 400px; margin:auto">

  <form method="post">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <br>

  <a class="btn btn-secondary" href="register.php" role="button">Not registered? Click here to register as an Admin</a>

</div>

<?php

include('includes/footer.php');

?>