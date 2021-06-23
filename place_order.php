<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PSC | Issue Order</title>
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
					height: 200px;
					width: 600px;
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
		$kg = '';
		$cat = '';
		$arrErrors = '';

		if(isset($_POST['place']))
		{			
			
				$cat  = $_POST['typeOfRice'];
				$date =  date('Y-m-d H:i:s');
				$kg = $_POST['amount'];

				$link -> query("INSERT INTO tbl_place_order(seed_cat,date,kg)VALUES('$cat','$date','$kg')") or die($link->error()) ;

				$_SESSION['message'] = "Order has been placed!";
				$_SESSION['msg_type'] = "success";
				
				header("location: place_order.php");
				exit();			
				

		}
	?>
        <!--Header -->
        <?php include('includes/header.php'); ?>
		<?php 
				$result = $link->query("SELECT * FROM tbl_place_order") or die($mysqli->error());
		?>
        <!--/Header -->

        <div id="layoutSidenav">
            <!--Sidebar -->
           
            <!-- /Sidebar--> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Issue Order</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Issue Order</li>
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
                            <div class="card-body">
							    <form action="#" method="POST">
									<div class="row">
										<div class="col-sm-6">
											<div class="row justify-content-left">
													<div class="form-group">
														<label for="sel1">Center:</label>
														<select class="form-control" id="typeOfRice" name="typeOfRice" required>
															<option value="" >--Select--</option>
															<option value="Kurunegala" >Kurunegala</option>
															<option value="Kandy" >Kandy</option>
															<option value="Gampaha" >Gampaha</option>
															<option value="Colombo" >Colombo</option>
														</select>
													</div>


											</div>	
										</div>	 
									
										<div class="col-sm-3">
											<div class="row justify-content-left">
													<div class="form-group">
														<label for="sel1">Amount (KG)</label>
															<input class="form-control" type="number" id="amount" name="amount" value="<?php echo $kg; ?>" required><br>
															<button type="submit" id="place" name="place" class="btn btn-primary">Place</button>
													</div>
													
											</div>	
										</div>	
												
												
										<div class="col-sm-6">
												<table style="width:100%;">
													<tr>
														<th >Center</th>
														<th >Amount (KG)</th>
														<th >Date</th>
													</tr>
												</table>
											<div class="row justify-content-right">
												
											<div class="table-wrapper-scroll-y my-custom-scrollbar">
												<table class="table table-bordered table-striped mb-0">
												
													<?php 
													while ($row = $result->fetch_assoc()):
													?>
													
													<tr>
														<td><?php echo $row['seed_cat']; ?></td>
														<td><?php echo $row['kg']; ?></td>
														<td><?php echo $row['date']; ?></td>
													</tr>
													<?php endwhile; ?>
												</table>
											</div>	
											</div>	
										</div>			
									</div>
								</form>
                            </div>
                        </div>
                 

                    </div>

                </main>

                <!--Footer -->
                <?php include('includes/footer.php'); ?>
                <!--/Footer -->
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
		<!-- <script>
			$("#place").click(function(){
				
				var cat = $("#typeOfRice").val();
				var kg = $("#amount").val();
				
				if(cat != '' && kg != '')
				{
									swal("Here's a message!", "It's pretty, isn't it?")

				}
				
			});
		</script>-->
    </body>
</html>
