<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title></title>
</head>
<body class="bg-dark p3">
	<?php 
		session_start();
		$id = $_SESSION['id'];
	?>
	<div class="d-flex flex-row-reverse">
	<a href="home.php?id=<?php echo $id;?>"><p style="text-align: right;">Back to home</p></a>
	</div>
	<?php
		include "config.php";
		$q = mysqli_query($connect, "SELECT * FROM scores WHERE u_id = $id ORDER BY scores.time DESC");
		$numRows = mysqli_num_rows($q);
		if($numRows > 0){
			while($do = mysqli_fetch_array($q)){
				$tm = $do['time'];
				$sc = $do['values'];
	?>
			<div class="bg-dark p3">
				<table class="table table-dark table-stripped table-hover">
					<tr>
						<th><center>Waktu tes</center></th>
						<th><center>Score</center></th>
					 	<?php if ($numRows > 0): ?>
						<td rowspan="2">
							<center>
								<a href="hapus.php?time=<?php echo $tm; ?>">Hapus</a>
							</center>
						</td>
						<?php endif;?>
					</tr>
					<tr>
						<td>
							<center>
								<?php 
								if($numRows > 0){ 
									echo $tm;
								}
								else{
									echo "Data tidak ada";
								}
								?> 
							</center>
						</td>
						<td>
							<center>
								<?php 
								if($numRows > 0){ 
									echo $sc;
								}
								else{
									echo "Data tidak ada";
								}
								?> 
							</center>
						</td>
					</tr>
	  <?php } ?>
				</table>
			</div>
	<?php
		}
		else{	
			echo "<h1>Data tidak ada<h1>";
		}
	?>
</body>
</html>