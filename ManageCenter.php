<?php?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PSC | Paddy Pricing</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
	
	<?php
			session_start();
			require_once "config.php";

			$id = 0;
			$update = false;
			$sell = '';
			$buy = '';
			
			if (isset($_GET['updt'])) 
			{

				$id = $_GET['updt'];
				$update = true;
				$result = $link-> query("SELECT * FROM tbl_seed_pricing WHERE id=$id")or die($link->error()) ;

				if(is_array($result) && count($result)==1)
				{

				}
				else
				{

					$row = $result->fetch_array();
					$sell  = $row['selling'];
					$buy  = $row['buying'];
					
					
				}
			}
			
			if (isset($_POST['update'])) 
			{

				$id = $_POST['id'];
				$sell  = $_POST['selling'];
				$buy  = $_POST['buying'];

				$link ->query("UPDATE tbl_seed_pricing SET selling ='$sell', buying ='$buy' WHERE id = '$id' ") or die($link->error());
				header('location:ManageCenter.php');
			}
		?>
        <!--Header -->
        <?php include('includes/header.php');?>
        <!--/Header -->

        <div id="layoutSidenav">
           	<!--Sidebar -->
			
			<?php 
				$result = $link->query("SELECT * FROM tbl_seed_pricing") or die($mysqli->error());
			?>
			<!-- /Sidebar--> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Paddy Pricing</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Paddy Pricing</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Today Price
                            </div>
                            <div class="card-body">
							<form method="POST">
								<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
								
										<table style="width:100%;">
											<tr>
												<th >Buying Price</th>
												<th >Selling Price</th>
												<th >Action</th>
											</tr>
										</table>
										
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                       
										
										<?php 
											while ($row = $result->fetch_assoc()):
										?>
                                        <tbody>
                                          
                                            <tr>
											
												<td><?php echo $row['buying'];; ?></td>
												<td><?php echo$row['selling'];; ?></td>
											
												<td><a href="ManageCenter.php?updt=<?php echo $row['id']; ?>" class="btn btn-info" >Update</a></td>
												
                                            </tr>
										<?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
								
								<div class="form-row">
                                       
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="buying">Current buying price (1KG)</label>
                                                <input class="form-control py-4" id="buying" name="buying" type="text" value="<?php echo $buy; ?>" placeholder="Enter Price of 1 KG"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="selling">Current selling price (1KG)</label>
                                                <input class="form-control py-4" id="selling" name="selling" type="text" value="<?php echo $sell; ?>" placeholder="Enter Price of 1 KG"/>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Batton Save-->

                                    <div class="form-group mt-4 mb-0">
									<?php
											if($update == true):
										?>
										<button class="btn btn-primary btn-block" name="update" type="submit">Update</button>
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
