<?php 
include 'connection.php';

	$refral = $_REQUEST['refral'];
	$userid = $_REQUEST['userid'];
	$amount = $_REQUEST['amount'];

	$sql = "SELECT * FROM payment_details where user_id = $userid ORDER BY `id` DESC LIMIT 1";
	$result = $conn->query($sql);

	//calculate cashback on current amount
	$cashbackamt = ($amount*10)/100;

	//calculate cashback + wallet amount
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$walletInitialAmt = $row["wallet_amount"];
			$total_wallet = $cashbackamt+$row["wallet_amount"];
			$useWalletAmt = ($row["wallet_amount"]*10)/100;
			//Refresh wallet amount
			if($useWalletAmt > 0){
				$total_wallet = ($cashbackamt+$row["wallet_amount"])-$useWalletAmt;		
			}			
		}
	}else{
		$total_wallet = $cashbackamt;
		$useWalletAmt = 0;
		$walletInitialAmt = 0;
	}
	//calculate 
	$amtToPay = $amount-$useWalletAmt;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wallet</title>
	<link rel="stylesheet" type="text/css" href="../wallet/assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	  	<div class="row">
	    	<div class="col align-self-center">
			<br><br>
			<h3>Payment Confirmation</h3><br>
			<h4>Wallet Amount <span class="badge badge-secondary"><?php echo $walletInitialAmt ?></span></h4>
			<br>
				<form name="paydata" method="post" id="paydata" action="complete_payment.php">

					<input type="hidden" name="refral" id="refral" value="<?php echo $refral ?>">
					<input type="hidden" name="cashback" id="cashback" value="<?php echo $cashbackamt ?>">
					<input type="hidden" name="wallet_amount" id="wallet_amount" value="<?php echo $total_wallet ?>">

					<div class="form-group">
						<label>
							User Id:
							<input type="text" name="userid" id="userid" value="<?php echo $userid ?>" class="form-control" readonly required>
						</label>
					</div>
					<div class="form-group">
						<label>
							Amount:
							<input type="text" name="paid_amount" id="paid_amount" value="<?php echo $amount ?>" class="form-control" readonly required>
						</label>
					</div>
					<div class="form-group">
						<label>
							Use Wallet:
							<input type="text" name="walletamt" id="walletamt" value="<?php echo $useWalletAmt?>" class="form-control" readonly required>
						</label>
					</div>
					<div class="form-group">
						<label>
							Final Payment:
							<input type="text" name="finalpay" id="finalpay" value="<?php echo $amtToPay ?>" class="form-control" readonly required>
						</label>
					</div>
				</form>
				<button type="submit" form="paydata" class="btn btn-success">Pay $ <?php echo $amtToPay ?></button>
				<a href="index.php" class="btn btn-danger">Back</a>
			</div>
		</div>
	</div>	
</body>
</html>