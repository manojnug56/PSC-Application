<?php?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PSC | Issue Payment</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		<script>
	
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 2000);
			
		</script>
		
		<style>
			.my-custom-scrollbar
				{
					position: relative;
					height: 180px;
					width: 90%;
					overflow: auto;
				}
			.table-wrapper-scroll-y 
				{
					display: block;
				}
			
		</style>
    </head>
    <body class="sb-nav-fixed">
	
	<?php
			session_start();
			require_once "config.php";

			$id = 0;
			$update = false;
			$inNumber = '';
			$far_id = '';
			$kg = '';
			$tot = '';
			
			
			if (isset($_GET['updt'])) 
			{

				$id = $_GET['updt'];
				$update = true;
				$result = $link-> query("SELECT * FROM tbl_purchase_seed WHERE id=$id")or die($link->error()) ;

				if(is_array($result) && count($result)==1)
				{

				}
				else
				{

					$row = $result->fetch_array();
					$inNumber  = $row['id'];
					$far_id  = $row['farmer_id'];
					$kg  = $row['kg'];
					$tot  = $row['amount'];					
												
				}
			}
			
			if (isset($_GET['del'])) 
			{
				$id = $_GET['del'];
				$link-> query("DELETE FROM tbl_place_order WHERE id = '$id' ") or die($link->error());
				header("location: view_order.php");
			}
			
			
			if (isset($_POST['update'])) 
			{
		
				$invoiceNum  = $_POST['inNum'];
				$far_id = $_POST['farId'];
				$kg = $_POST['KG'];
				$tot = $_POST['tot'];
				$date =  date('Y-m-d H:i:s');
												
				$link -> query("INSERT INTO tbl_payments(invoice_num,farmer_id,kg,tot,date)VALUES('$invoiceNum','$far_id','$kg','$tot','$date' )") or die($link->error()) ;

				$_SESSION['message'] = "Payment has been send!";
				$_SESSION['msg_type'] = "success";
				
				$link-> query("DELETE FROM tbl_purchase_seed WHERE id = '$id' ") or die($link->error());
				header("location: payment.php");
				exit();	
			}
		?>
        <!--Header -->
        <?php include('includes/header.php');?>
        <!--/Header -->

        <div id="layoutSidenav">
           	<!--Sidebar -->
			
			<?php 
				$result = $link->query("SELECT * FROM tbl_purchase_seed") or die($mysqli->error());
			?>
			<!-- /Sidebar--> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Issue Payment</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Issue Payment</li>
                        </ol>
						<?php
	
							if(isset($_SESSION['message'])): ?>
							<div class="alert alert-<?= $_SESSION['msg_type'] ?>">
							
							<?php 
								echo $_SESSION['message'];
								unset($_SESSION['message']);
							?>
							</div>
						<?php endif ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Pending Payments
                            </div>
                            <div class="card-body">
							<form method="POST">
								<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
								<table style="width:105%">
									<thead>
										<tr>
											<th>Invoice</th>
											<th>Farmer ID</th>
											<th>KG</th>
											<th>Amount (LKR)</th>
											<th>Print Token</th>
										</tr>
									 </thead>
								</table>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table class="table table-bordered table-striped mb-0" id="dataTable" width="100%" cellspacing="0">
                                       
										
										<?php 
											while ($row = $result->fetch_assoc()):
										?>
                                        <tbody>
                                          
                                            <tr>
											
												<td><?php echo $row['id'];; ?></td>
												<td><?php echo$row['farmer_id'];; ?></td>
												<td><?php echo$row['kg'];; ?></td>
												<td><?php echo$row['amount'];; ?></td>
											
												<td><a href="payment.php?updt=<?php echo $row['id']; ?>" class="btn btn-info">Select</a></td>
												
                                            </tr>
										<?php endwhile; ?>
                                        </tbody>
                                    </table>                                                     
                                </div>
								
								<div class="form-row">
                                       
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inNum">Invoice Number</label>
                                                <input class="form-control py-4" id="inNum" name="inNum" type="text" value="<?php echo $inNumber; ?>" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="farId">Farmer ID</label>
                                                <input class="form-control py-4" id="farId" name="farId" type="text" value="<?php echo $far_id; ?>" required />
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="KG">Amount(KG)</label>
                                                <input class="form-control py-4" id="KG" name="KG" type="text" value="<?php echo $kg; ?>" required />
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="tot">Total (LKR)</label>
                                                <input class="form-control py-4" id="tot" name="tot" type="text" value="<?php echo $tot; ?>" required />
                                            </div>
                                        </div>
                                    </div>

                                    <!--Batton Save-->

                                    <div class="form-group mt-4 mb-0">
									<?php
											if($update == true):
										?>
										<button class="btn btn-primary btn-block" name="update"  type="submit" onclick="myFunction()">Pay</button>
									<?php endif; ?>
                                    </div>

                                    <!--Batton Cancel-->
                                    <div class="form-group mt-4 mb-0"><button class="btn btn-secondary btn-block" type="reset" >Cancel</button></div>
									
							</form>
                            </div>
                        </div>


                    </div>
                </main>

                <!--Footer -->
                <?php include('includes/footer.php');?>
                <!--/Footer -->
        </div>
		
		
		
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>

        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
		
    </body>
</html>
