
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PSC | Farmer Registration</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		
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
		$fname  = '';
		$lname  = '';
		$address = '';
		$nic = '';
		$contact = '';

		if(isset($_POST['save']))
		{
			$fname  = $_POST['inputFirstName'];
			$lname  = $_POST['inputLastName'];
			$address = $_POST['inputAddress'];
			$nic = $_POST['inputIDCardNumber'];
			$contact = $_POST['inputContactNumber'];

			$link -> query("INSERT INTO tbl_farmer(f_name,l_name,adress,NIC,contact)VALUES('$fname','$lname','$address','$nic','$contact')") or die($link->error()) ;

			$_SESSION['message'] = "Record has been saved!";
			$_SESSION['msg_type'] = "success";
			
			header("location: UserRegistration.php");
			exit();
		}
		
		if (isset($_GET['edit'])) 
			{

				$id = $_GET['edit'];
				$update = true;
				$result = $link-> query("SELECT * FROM tbl_farmer WHERE id=$id")or die($link->error()) ;

				if(is_array($result) && count($result)==1)
				{

				}
				else
				{

					$row = $result->fetch_array();
					$fname  = $row['f_name'];
					$lname  = $row['l_name'];
					$address = $row['adress'];
					$nic = $row['NIC']; 
					$contact = $row['contact'];
				}
			}
		
		if (isset($_POST['update'])) 
		{

			$id = $_POST['id'];
			$fname  = $_POST['inputFirstName'];
			$lname  = $_POST['inputLastName'];
			$address = $_POST['inputAddress'];
			$nic = $_POST['inputIDCardNumber'];
			$contact = $_POST['inputContactNumber'];

			$link ->query("UPDATE tbl_farmer SET f_name ='$fname', l_name ='$lname', adress ='$address', NIC ='$nic', contact ='$contact' WHERE id = '$id' ") or die($link->error());
			header('location:UserRegistration.php');
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
                        <h1 class="mt-4">Farmer Registration</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Farmer Registration</li>
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
                                <form action="" method="POST">
								<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">First Name<span style="color:red">*</span></label>
                                                <input class="form-control py-4" id="inputFirstName" name="inputFirstName" type="text"  value="<?php echo $fname; ?>" placeholder="Enter first name" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputLastName">Last Name<span style="color:red">*</span></label>
                                                <input class="form-control py-4" id="inputLastName" name="inputLastName" type="text" value="<?php echo $lname; ?>" placeholder="Enter last name"  required />
                                            </div>
                                          </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="small mb-1" for="inputAddress">Address</label>
                                        <input class="form-control py-4" id="inputAddress" name="inputAddress" type="text" value="<?php echo $address; ?>" placeholder="Enter Address" />
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputIDCardNumber">ID card No<span style="color:red">*</span></label>
                                                <input class="form-control py-4" id="inputIDCardNumber" name="inputIDCardNumber" type="text" value="<?php echo $nic; ?>" placeholder="Enter ID card Number"  required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputContactNumber">Contact number</label>
                                                <input class="form-control py-4" id="inputContactNumber" name="inputContactNumber" type="text" value="<?php echo $contact; ?>" placeholder="Enter Contact number" minlength="0" maxlength="10" size="10"/>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Batton Save-->
                                    <div class="form-group mt-4 mb-0">
										<?php
											if($update == true):
										?>
										<button class="btn btn-primary btn-block" name="update" type="submit">Update User</button>
										
										<?php else: ?>
										<button class="btn btn-primary btn-block" name="save" type="submit">Save New User</button>
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
		
		<script type="text/javascript">
			$(".remove").click(function(){
				var id = $(this).parents("tr").attr("id");


				if(confirm('Are you sure to remove this record ?'))
				{
					$.ajax({
					   url: 'ManageUsers.php',
					   type: 'GET',
					   data: {id: id},
					   error: function() {
						  alert('Something is wrong');
					   },
					   success: function(data) {
							$("#"+id).remove();
							alert("Record removed successfully");  
					   }
					});
				}
			});

		</script>
    </body>
</html>
