<?php
include 'connection.php';

	$refral = $_REQUEST['refral'];
	$userid = $_REQUEST['userid'];
	$amount = $_REQUEST['paid_amount'];
	$cashback = $_REQUEST['cashback'];
	$wallet_amount = $_REQUEST['wallet_amount'];

	$sql = "INSERT INTO payment_details (referral_code, user_id, paid_amount, cashback, wallet_amount)
	VALUES ('$refral', '$userid', '$amount', '$cashback', '$wallet_amount')";

	if ($conn->query($sql) === TRUE) {
	    $message = "Payment successful your cashback amount ". $cashback." added in you wallet";
	    header("Location:thank_you.php?message=".$message);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>
