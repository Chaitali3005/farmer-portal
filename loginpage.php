<?php
  include "conn.php";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="loginpage.css">
  </head>
  <body>
    <div class="wrapper">
      <h1>Farmer Portal</h1>
      <form class="" action="mainpage.html" method="post">
        <input class="textbox" type="email" name="email" value="" placeholder="email" required>
        <input class="textbox" type="password" name="pass" value="" placeholder="password" required>
        <button id="btn" class="btn" type="submit" name="button">Log In</button>
      </form>
      <?php
      if (isset($_POST['button'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $result = mysqli_query($mysqli,"SELECT * From register Where email = '$email' and pass = '$pass' ");

            $row = mysqli_fetch_array($result);
            if ($row['email'] == $email && $row['pass'] == $pass) {
               echo "success";
            }
            else {
              echo "invalid credentials";
            }
          }
          ?>
        <a href="forgotpass.html">
          <p class="forgot">Forgot Password</p>
        </a>
    </div>

    <div class="wrapper2">
      <p id="signup">Don't Have an Account? <a href="signup.php" class="signup">Sign up</a></p>
    </div>

  </body>
</html>
