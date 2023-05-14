<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Loneliness Test</h1>
	<?php 

		session_start();
		echo "Welcome ".$_SESSION['username']."!"."<br>";
		$id = $_SESSION['id'];
	?>
	<a href="index.php">Home</a> <br>
	<a type="hidden" href="profile.php?id=<?php echo $id;?>">Profile</a><br>
	<a href="temp/pre_test.php?id=<?php echo $id;?>">Loneliness Level Test</a><br>
	<a href="#">Psikolog</a><br>
	<a href="logout.php">Logout</a>

</body>
</html>