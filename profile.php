<?php 
	session_start();
	$id = $_SESSION['id'];
	include "config.php";

	$query = mysqli_query($connect, "SELECT * FROM scores INNER JOIN users ON scores.u_id = users.user_id ORDER BY scores.time DESC");
	$res = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
</head>
<body>
	<a type="hidden" href="home.php?id=<?php echo $id;?>"><p style="text-align: right;">Back to home</p></a>
	<div>
		<table>
			<tr>
				<td>Username</td>
				<td>: <?php echo $res['username'];?></td>
			</tr>
			<tr>
				<td>Fullname</td>
				<td>: <?php echo $res['fullname'];?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>: <?php echo $res['gender'];?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>: <?php echo $res['phone'];?></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
				<td>: <?php echo $res['dob'];?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>: <?php echo $res['email'];?></td>
			</tr>
			<tr>
				<td>Loneliness score</td>
				<td>: <?php echo $res['values'];?></td>
			</tr>
		</table>
	</div>
	<a type="hidden" href="edit_profile.php?id=<?php echo $id;?>">Edit Profile</a>
</body>
</html>