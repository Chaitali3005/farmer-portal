<?php
include "conn.php";
 ?>

<html>
<head>
	<link rel="stylesheet" href="loginpage.css">

</head>
<body>

	<script>
		function valemail() {
			var mail=document.myform.email.value;
			var at=mail.indexOf("@");
			var dot=mail.lastIndexOf(".");
			var phone=document.myform.phone.value;
			var upperCaseLetters = /[A-Z]/g;
			var lowerCaseLetters = /[a-z]/g;
			var pass=document.myform.pass.value;
			var numbers = /[0-9]/g;
			if (at<1||dot<at+2||dot+2>=mail.length) {
				alert("enter valid email");
				return false;
			}
			if (phone.length!==10) {
				alert("Enter 10 digit Number")
				return false;
			}
			else if (phone.match(upperCaseLetters)||phone.match(lowerCaseLetters)) {
				alert("In Phone Number Feild enter digits Only")
				return false;
			}
			if (pass.length<8 || pass.length>16) {
				alert("Password should be 8 to 16 characters long")
				return false;
			}
			else if (!pass.match(numbers)||!pass.match(upperCaseLetters)||!pass.match(lowerCaseLetters)) {
				alert("Password must contain atleast one Number,one Upper Case Character and one Lower Case Character ");
				return false;
			}
			else{
				return true;
			}
			var cpass=document.myform.cpsw.value;
			if(cpass!==pass){
				alert("Both Password should Match")
			}
		}
		</script>
		<div id="div" class="wrapper">
			<h1>Farmer Portal</h1>

			<form name="myform" action="" method="post" onsubmit="return valemail();">
				<div class="form-group">
  			<input id="fname" class="textbox" type="text" name="fname" placeholder="first name" required>

        <input id="lname" class="textbox" type="text" name="lname" placeholder="last name" required>

				<label for="birthday">Date Of Birth:</label>
				<input type="date" id="birthday" name="birthday" required>

				<p>Please select your gender:<br>
				<input type="radio" id="male" name="gender" value="male">
				<label for="male">Male</label><br>
				<input type="radio" id="female" name="gender" value="female">
				<label for="female">Female</label><br>
				<input type="radio" id="other" name="gender" value="other">
				<label for="other">Other</label></p>

				<input id="phone" class="textbox" type="text" name="phone" placeholder="phone" required><br>

				<input id="email" class="textbox" type="text" name="email" placeholder="email" required><br>

				<input id="psw" class="textbox" type="password" name="pass" placeholder="password" required><br>

				<input id="cpsw" class="textbox" type="password" name="cpsw" placeholder="confirm password" required><br>
				<button id="btn" class="btn" type="submit" name="button">Sign Up</button>
				</div>
			</form>
      <?php if (isset($_POST['button'])){
          $email = $_POST['email'];
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $phone = $_POST['phone'];
          $gender = $_POST['gender'];
          $dob = $_POST['birthday'];
          $pass = $_POST['pass'];

          $query = mysqli_query($mysqli,"SELECT * FROM register where email = '$email'");
          $email_count = mysqli_num_rows($query);

          if ($email_count > 0) {
            echo "email already registered ";
          }
          else{

          $result = mysqli_query($mysqli,"INSERT into register values('','$email','$fname','$lname','$phone','$gender','$pass','$dob')");
          if ($result) {
            echo "success";
          }
          else {
            echo "error";
          }
      }
    }
         ?>
		</div>
    <div class="wrapper2">
      <p id="login">Already Have an Account? <a href="loginpage.php" class="login">Login</a></p>
    </div>

</body>
</html>
