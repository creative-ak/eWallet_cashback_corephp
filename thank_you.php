<!DOCTYPE html>
<html>
<head>
	<title>Wallet</title>
	<link rel="stylesheet" type="text/css" href="../wallet/assets/css/bootstrap.min.css">
</head>
<body>
	<?php
		if(isset($_GET['message'])){
		    echo '<h3>'. $_GET["message"] .'</h3>';
		}else{
			header('Location:index.php');
		}
	?>
	<h4>Thank you</h4>
	<a href="index.php" class="btn btn-danger">Back</a>
</body>
</html>