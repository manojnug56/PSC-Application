<?php?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PSC | Payment History</title>
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
					height: 250px;
					width: 100%;
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

		?>
        <!--Header -->
        <?php include('includes/header.php');?>
        <!--/Header -->

        <div id="layoutSidenav">
           	<!--Sidebar -->
			
			<?php 
				$result = $link->query("SELECT * FROM tbl_stock") or die($mysqli->error());
			?>
			<!-- /Sidebar--> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Order History</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order History</li>
                        </ol>
						
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Orders
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
										</tr>
									 </thead>
								</table>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table class="table table-bordered table-striped mb-0" id="" width="100%" cellspacing="0">
                                        
										
										<?php 
											while ($row = $result->fetch_assoc()):
										?>
                                        <tbody>
                                          
                                            <tr>
											
												<td><?php echo $row['center'];; ?></td>
												<td><?php echo$row['kg'];; ?></td>
												<td><?php echo$row['date'];; ?></td>
												
                                            </tr>
										<?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
								
								
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
