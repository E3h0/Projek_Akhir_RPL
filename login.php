<?php 
include 'config.php';

session_start();

if (isset($_POST['submit'])){
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
	$res = mysqli_query($connect, $sql);
	if($res -> num_rows > 0){
		$row = mysqli_fetch_assoc($res);
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['user_id']; 
		header("Location: home.php");
	}
	else{
		echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
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
	</script>
	<a href="index.php"><p style="text-align: right;">Back to homepage</p></a>
	<div>
		<form action="" method="POST">
			<input type="email" name="email" placeholder="E-mail" value="" required> <br>
			<input type="password" name="password" id="pwd" 
			placeholder="Password" value="" required>
			<button type="button" onclick="togglePassword('pwd')">Show</button><br>
			<button name="submit">Login</button> <br>
			<p>Belum punya akun?</p>
			<a href="signup.php">Daftar sekarang</a>

		</form>
	</div>
</body>
</html>