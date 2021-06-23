<?php?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PSC | View Order</title>
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
			$cent = '';
			$kg = '';
			$dte = '';
			
			if (isset($_GET['updt'])) 
			{

				$id = $_GET['updt'];
				$update = true;
				$result = $link-> query("SELECT * FROM tbl_place_order WHERE id=$id")or die($link->error()) ;

				if(is_array($result) && count($result)==1)
				{

				}
				else
				{

					$row = $result->fetch_array();
					$cent  = $row['seed_cat'];
					$kg  = $row['kg'];
					$dte  = $row['date'];
					
					
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
		
				$cent  = $_POST['Center'];
				$kg = $_POST['KG'];
				$date =  date('Y-m-d H:i:s');


				$link -> query("INSERT INTO tbl_stock(center,kg,date)VALUES('$cent','$kg','$date')") or die($link->error()) ;

				$_SESSION['message'] = "Order has been send!";
				$_SESSION['msg_type'] = "success";
				
				$link-> query("DELETE FROM tbl_place_order WHERE id = '$id' ") or die($link->error());
				header("location: view_order.php");
				exit();	
			}
		?>
        <!--Header -->
        <?php include('includes/header.php');?>
        <!--/Header -->

        <div id="layoutSidenav">
           	<!--Sidebar -->
			
			<?php 
				$result = $link->query("SELECT * FROM tbl_place_order") or die($mysqli->error());
			?>
			<!-- /Sidebar--> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">View Order</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">View Order</li>
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
                                Today Orders
                            </div>
                            <div class="card-body">
							<form method="POST">
								<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
								<table style="width:100%">
									<thead>
										<tr>
											<th>Center</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Action</th>
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
											
												<td><?php echo $row['seed_cat'];; ?></td>
												<td><?php echo$row['kg'];; ?></td>
												<td><?php echo$row['date'];; ?></td>
											
												<td><a href="view_order.php?updt=<?php echo $row['id']; ?>" class="btn btn-info" >Select</a></td>
												
                                            </tr>
										<?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
								
								<div class="form-row">
                                       
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="Center">Center</label>
                                                <input class="form-control py-4" id="Center" name="Center" type="text" value="<?php echo $cent; ?>" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="KG">Amount(KG)</label>
                                                <input class="form-control py-4" id="KG" name="KG" type="text" value="<?php echo $kg; ?>" required />
                                            </div>
                                        </div>
                                    </div>

                                    <!--Batton Save-->

                                    <div class="form-group mt-4 mb-0">
									<?php
											if($update == true):
										?>
										<button class="btn btn-primary btn-block" name="update" type="submit">Send Order</button>
									<?php endif; ?>
                                    </div>

                                    <!--Batton Cancel-->
                                    <div class="form-group mt-4 mb-0"><button class="btn btn-secondary btn-block" type="reset">Cancel</button></div>
									
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
