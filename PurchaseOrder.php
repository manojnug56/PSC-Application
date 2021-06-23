<?php?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PSC | Collect Paddy</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 2000);	
		</script>
    </head>
    <body class="sb-nav-fixed">
	
	<?php
		session_start();
		require_once "config.php";

		$id = 0;
		$update = false;
		$f_id  = '';
		$nOfkg  = '';
		$Tot = '';
		

		if(isset($_POST['Purchase']))
		{
			$f_id   = $_POST['inputFaIDCardNumber'];
			$nOfkg  = $_POST['inputNumberOfKG'];
			$Tot = $_POST['inputTotalAmount'];
			
			$link -> query("INSERT INTO tbl_purchase_seed(farmer_id,kg,amount) VALUES('$f_id','$nOfkg','$Tot')") or die($link->error()) ;

			$_SESSION['message'] = "Record has been saved!";
			$_SESSION['msg_type'] = "success";
			
			header("location: PurchaseOrder.php");
			exit();
		}
		
	?>
        <!--Header -->
        <?php include('includes/header.php');?>
        <!--/Header -->

        <div id="layoutSidenav">
           	<!--Sidebar -->
			
			<!-- /Sidebar--> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Collect Paddy</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Collect Paddy</li>
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
                                <form method="POST">
								<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFaIDCardNumber">Farmer ID</label>
                                                <input class="form-control py-4" id="inputFaIDCardNumber" name="inputFaIDCardNumber" type="text" id = "inputFaIDCardNumber" value="<?php echo $f_id; ?>" placeholder="Enter ID " required />
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-row">
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>

                                    <div class="form-row">
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNumberOfKG">Weight</label>
                                                <input class="form-control py-4" id="inputNumberOfKG" name="inputNumberOfKG" type="text" placeholder="Enter weight" onkeyup="add()" value="<?php echo $nOfkg; ?>" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPriceOf1KG">Price of 1KG</label>
                                                <input class="form-control py-4" id="inputPriceOf1KG" type="text" value="90"placeholder="Enter Price of 1 KG" readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputTotalAmount">Total Price</label>
                                                <input class="form-control py-4" id="inputTotalAmount" name="inputTotalAmount" type="text" value="<?php echo $Tot; ?>" placeholder="Totoal price" readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <script>

                                        function add() 
										{
                                            var x = parseInt(document.getElementById("inputPriceOf1KG").value);
                                            var y = parseInt(document.getElementById("inputNumberOfKG").value);
                                            document.getElementById("inputTotalAmount").value = x * y;
										}
                                    </script>

                                    
                                    <!--Batton Cancel-->
                                    <div class="form-group mt-4 mb-0"><button class="btn btn-secondary btn-block" name="Refresh" type="reset" id="x" onclick="myFunction()">Print</button></div>
									<!--Batton Save-->
                                    <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" name="Purchase"  type="submit" >Purchase</button>

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
		
		<script>
			function myFunction() {
				
				var name = $("#inputFaIDCardNumber").val();
				var weight = $("#inputNumberOfKG").val();
				
				if (name == '' || weight == '')
				{
					swal("Missing Details!", "Please Enter details!", "warning");
				}
			  
				else
				{
					swal("Good job!", "You have Print the customer Token!", "success");
				}
				
				$('#x').click(function(e) {
						e.preventDefault();
					});
			}
		</script>
    </body>
</html>
