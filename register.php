<?php
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$dob = $_POST['birthday'];
$pass = $_POST['pass'];

if (!empty($email) ||!empty($fname) ||!empty($lname) ||!empty($phone) ||!empty($gender) ||!empty($pass) ||!empty($dob)){
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "mydb";

  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  } else {
    $SELECT = "SELECT email From register Where email = ? Limit 1";
    $INSERT = "INSERT into register (email,fname,lname,phone,gender,pass,dob) values(?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum == 0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssisss",$email,$fname,$lname,$phone,$gender,$pass,$dob);
      $stmt->execute();
      echo "New record inserted successfully";
    }
    else{
      echo "email already in use";
    }
    $stmt->close();
    $conn->close();
  }
} else {
  echo "All fields are required";
  die();
}
 ?>
