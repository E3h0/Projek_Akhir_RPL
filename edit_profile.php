<?php 
	include 'config.php';
	session_start();
	$id = $_SESSION['id'];
	
	$query = mysqli_query($connect, "SELECT * FROM users WHERE user_id = '$id'");
	if($do = mysqli_fetch_array($query)){
		$id = $do['user_id'];
		$uname = $do['username'];
		$fname = $do['fullname'];
		$gen = $do['gender'];
		$phone = $do['phone'];
		$dob = $do['dob'];
		$email = $do['email'];
		$pass = $do['password'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
</head>
<body>
	<script>
		function togglePassword(inputId, toggleId) {
			const passwordInput = document.getElementById(inputId);
			const toggleButton = document.getElementById(toggleId);
			  
			if (passwordInput.type === "password") {
			    passwordInput.type = "text";
			    toggleButton.innerHTML = "Hide";
			} 
			else {
			    passwordInput.type = "password";
			    toggleButton.innerHTML = "Show";
			}
		}


		function checkPassword(id1, id2) {
			var password = document.getElementById(id1).value;
			var confirmPassword = document.getElementById(id2).value;
			if (password != confirmPassword) {
			    alert("Password and confirm password do not match!");
			    document.getElementById("Myform").reset();
			} 
			else {
			    document.getElementById("Myform").submit();
			}
		}
	</script>
	<a href="profile.php?id=<?php echo $id;?>"><p style="text-align: right;">Back to profile page</p></a>
	<form name="Edit profile" id="Myform" method="POST" action="edit_profile.php">
		<div>
			<table>
				<tr>
					<td>Username</td>
					<td>
						<input type="text" name="username" value="<?php
						echo $uname;?>">
					</td>
				</tr>
				<tr>
					<td>Fullname</td>
					<td>
						<input type="text" name="fullname" value="<?php
						echo $fname;?>">
					</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="text" name="gender" value="<?php
						echo $gen;?>">
					</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>
						<input type="text" name="phone" value="<?php
						echo $phone;?>">
					</td>
				</tr>
				<tr>
					<td>Date of Birth</td>
					<td>
						<input type="date" name="dob" value="<?php
						echo $dob;?>">
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" name="email" value="<?php
						echo $email;?>">
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<input type="password" id="pwd1" name="password" value="<?php echo $pass;?>">
						<button type="button" id="btn1" onclick="togglePassword('pwd1', 'btn1')">
							Show
						</button>
					</td>
				</tr>
				<td>Confirm Password</td>
				<td>
					<input type="password" name="password" id="c_pwd">
					<button type="button" id="btn2" onclick="togglePassword('c_pwd', 'btn2')">
						Show
					</button>
				</td>
			</table>
		</div>
		<button type="submit" name="update" onclick="checkPassword('pwd1', 'c_pwd')">
			Save
		</button>
	</form>
<?php 
	if(isset($_POST['update'])){
		$id = $_SESSION['id'];
		$uname = $_POST['username'];
		$fname = $_POST['fullname'];
		$gen = $_POST['gender'];
		$phone = $_POST['phone'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$res = mysqli_query($connect, 
			"UPDATE users SET username='$uname', fullname='$fname',
			gender='$gen', phone='$phone', dob='$dob', email='$email',
			password='$pass' WHERE user_id='$id'");

		header("Location: index.php");
		session_destroy();
		echo "<script>alert('Data Profile Berhasil di Update!')</script>";
	}
?>

</body>
</html>