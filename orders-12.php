<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>View Order</title>
	  <meta charset="utf-8">
	<!--   <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	  <link rel="stylesheet" href="assets/css/style.css">
	  
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  
	  <style type="text/css"></style>
	
	</head>
	<body>
		<div class = "container" style="border:1px solid #cecece;">
			<h1 align="center">Orders</h1><br>
			
			
			<div class="row">	
				<div class="col-sm-3">	
					<div class="row justify-content-left">
						<form action="#" method="POST">
							<div class="form-group">
								<label for="oID">Order ID:</label>
								<input type="text" name="oID" id="oID" class="form-control">
							</div>
							
							<div class="form-group">
								<label for="rKg">Requested KG:</label>
								<input type="text" name="rKg" id="rKg" class="form-control">
							</div>
													
						</form>
					</div>	
				</div>	
				
				<div class="col-sm-3">
				
					<div class="row justify-content-left">
						<form action="#" method="POST">
							<div class="form-group">
								<label for="dte">Date:</label>
								<input type="text" name="dte" id="dte" class="form-control">
							</div>
							
							<div class="form-group">
								<label for="stock">Available Stock:</label><br>
								<input type="text" name="stock" id="stock" class="form-control">
							</div>
						
						</form>
					</div>	
				</div>	
				
				<div class="col-sm-6">
				
					<div class="row justify-content-left">
						<table class="table" id="table">
							<tr>
								<th>Order ID</th>
								<th>Seed Category</th>
								<th>Number Of KG</th>
								<th>Date</th>								
							</tr>
						</table>
					</div>	
				</div>	
			</div><br>	
			
			<div class="row">
				<div class="col-sm-6">
					<div class="row justify-content-end">
						<table class="table" style="height:150px;">
							<tr>
								<th>Seed Category</th>
								<th>Stock (KG)</th>
							</tr>
						</table>
					</div>	
				</div>	
				<div class="col-sm-6">
					<div class="row justify-content-end">
							<div class="form-group">
								<button type="submit" id="send" name="send" class="btn btn-primary">Send Order</button>
							</div>
					</div>	
				</div>	
				
			</div>		
		</div>
		<script>
			
		</script>

	</body>
</html>
