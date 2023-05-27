<?php 
	include "config.php";
	$tm = $_GET['time'];

	$del = mysqli_query($connect, "DELETE FROM scores WHERE scores.time = '$tm'");
	if ($del) {
		// Data berhasil dihapus
		echo "<script>alert('Data berhasil dihapus.');</script>";
		header("Location:history.php");
	} else {
		// Terjadi kesalahan saat menghapus data
		echo "<script>alert('Gagal menghapus data.');</script>";
		header("Location:history.php");
	}
?>