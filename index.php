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
			<h3>Payment Form</h3><br>
				<form name="payment" method="post" id="payment" action="payment.php">
					<div class="form-group">
						<label>
							Refral:
							<input type="text" name="refral" id="refral" class="form-control" placeholder="Refral code" required>
						</label>
					</div>

					<div class="form-group">
						<label>
							User Id:
							<input type="text" name="userid" id="userid" class="form-control" placeholder="User id" required>
						</label>
					</div>

					<div class="form-group">		
						<label>
							Amount:
							<input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" required>
						</label>
					</div>

				</form>
				<button type="submit" form="payment" class="btn btn-info">Proceed to pay</button>
			</div>
		</div>
	</div>
</body>
</html>