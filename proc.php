<?php
	include "config.php";
	$id = $_POST["id"];
	$res = $_POST["result"];
	$time = $_POST['time']; // Misalnya, diambil dari data POST
	$dateTime = new DateTime($time);
	$formattedTime = $dateTime->format('Y-m-d h:i:s'); // Format sesuai kebutuhan



	$sql = "insert into scores(`u_id`, `values`) values('$id','$res')";

	$do = mysqli_query($connect, $sql);
	if($do){
		echo "<script>alert('success!!!')</script>";
	}
	// Contoh respons kembali ke JavaScript
	$response = "Data received: id = " . $id . ", result = " . $res . ", time = " . $formattedTime;
	echo $response;
?>
