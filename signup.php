<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
</head>
<body>
	<a href="index.php"><p style="text-align: right;">Back to homepage</p></a>
	<script>
		function togglePassword(id) {
 	 		var x = document.getElementById(id);
			var button = x.nextElementSibling;

		 	if (x.type === "password") {
		    	x.type = "text";
		    	button.textContent = "Hide";
		  	} 
		  	else {
		    	x.type = "password";
		    	button.textContent = "Show";
		  	}
		}

		function checkPassword() {
			var password = document.getElementById("pwd").value;
			var confirmPassword = document.getElementById("c_pwd").value;
			if (password != confirmPassword) {
			    alert("Password and confirm password do not match!");
			    document.getElementById("Myform").reset();
			} 
			else {
			    document.getElementById("Myform").submit();
			}
		}
	</script>

	<form id="Myform" action="signup.php" method="post">
		<label>Full Name</label><br>
		<input type="text" name="fullname" placeholder="Enter your fullname" 
		required><br>
		<label>Username</label><br>
		<input type="text" name="username" placeholder="Create username" 
		required><br>

		<label>Date of Birth</label><br>
		<input type="date" name="dob" placeholder="" required><br>

		<label>Email</label><br>
		<input type="email" name="email" placeholder="Enter email" required><br>

		<label>Gender</label><br>
		<input type="radio" id="Male" name="gender" value="Male" required>
		<label for="Male">Male</label>
		<input type="radio" id="Female" name="gender" value="Female">
		<label for="Female">Female</label><br>

		<label>Phone Number</label><br>
		<input type="text" name="phone" placeholder="Enter phone number"><br>

		<label>Password</label><br>
		<input type="password" id="pwd" name="password" placeholder="Create password">
		<button type="button" onclick="togglePassword('pwd')">Show</button><br>
		<label>Confirm Password</label><br>
		<input type="password" id="c_pwd" name="c_pwd" placeholder="Enter password">
		<button type="button" onclick="togglePassword('c_pwd')">Show</button><br>

		<button type="submit" name="Submit" onclick="checkPassword()">Submit</button>
	</form>

	<?php
		include "config.php";

		if(isset($_POST['Submit'])){

			$fname = $_POST['fullname'];
			$uname = $_POST['username'];
			$dob = $_POST['dob'];
			$email = $_POST['email'];
			$gen = $_POST['gender'];
			$phone = $_POST['phone'];
			$pwd = $_POST['password'];
		

			$sign_up = "insert into users(
			`username`,`fullname`,`gender`,`phone`,`dob`,`email`,`password`)
			values('$uname','$fname','$gen','$phone','$dob','$email','$pwd')";
			$do = mysqli_query($connect, $sign_up);
			if($do){
				echo "<script>alert('Sign Up Succesfully!!!')</script>";
			}
			else{
				echo("Fail");
			}
		}
	?>
</body>
</html>