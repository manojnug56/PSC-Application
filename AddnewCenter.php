
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Charts - SB Admin</title>
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
			$province = '';
			$center_name = '';
			$max_capacity = '';

			if(isset($_POST['add']))
			{			
				
					$province  = $_POST['CenterProvince'];
					$center_name =  $_POST['inputCenterName'];
					$max_capacity = $_POST['MaxCapacity'];

					$link -> query("INSERT INTO tbl_center(province,name,max_cap)VALUES('$province','$center_name','$max_capacity')") or die($link->error()) ;

					$_SESSION['message'] = "Center has been added!";
					$_SESSION['msg_type'] = "success";
					
					header("location: AddnewCenter.php");
					exit();			
	
			}
			
			if (isset($_GET['edit'])) 
			{

				$id = $_GET['edit'];
				$update = true;
				$result = $link-> query("SELECT * FROM tbl_center WHERE id=$id")or die($link->error()) ;

				if(is_array($result) && count($result)==1)
				{

				}
				else
				{

					$row = $result->fetch_array();
					$province  = $row['province'];
					$center_name  = $row['name'];
					$max_capacity = $row['max_cap'];
					
				}
			}
			
			if (isset($_POST['update'])) 
			{

				$id = $_POST['id'];
				$province  = $_POST['CenterProvince'];
				$center_name  = $_POST['inputCenterName'];
				$max_capacity = $_POST['MaxCapacity'];
				

				$link ->query("UPDATE tbl_center SET province ='$province', name ='$center_name', max_cap ='$max_capacity' WHERE id = '$id' ") or die($link->error());
				header('location:AddnewCenter.php');
			}
		?>
        <!--Header -->
        <?php include('includes/header.php');?>
        <!--/Header -->

        <div id="layoutSidenav">
           	<!--Sidebar -->
			<?php include('includes/sidebar.php');?>
			<!-- /Sidebar--> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Add new Center</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add new Center</li>
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
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="CenterProvince">Center's Province</label>												
												<select class="form-control" id="CenterProvince" name="CenterProvince" required>
															<option value="" >--Select--</option>
															<option value="Northern" >Northern</option>
															<option value="North Western" >North Western</option>
															<option value="Western" >Western</option>
															<option value="North Central" >North Central</option>
															<option value="Central" >Central</option>
															<option value="Sabaragamuwa" >Sabaragamuwa</option>
															<option value="Eastern" >Eastern</option>
															<option value="Uva" >Uva</option>
															<option value="Southern" >Southern</option>
												</select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputCenterName">Center Name</label>
                                                <input class="form-control py-4" id="inputCenterName" name="inputCenterName" type="text"placeholder="Enter Center Name (Eg:- Nuwara, Kurunegala,Etc..)" value="<?php echo $province; ?>" required />
                                            </div>
                                        </div>
                                    </div>

                                     <div class="form-row">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="MaxCapacity">Max Seed's Capacity</label>
                                                <input class="form-control py-4" id="MaxCapacity" name="MaxCapacity" type="text" aria-describedby="emailHelp" placeholder="Enter Max Seed's Capacity (KG)" value="<?php echo $center_name; ?>" required />
                                        </div>
                                    </div>
                                  <!--   <div class="form-group">
                                                
                                    </div> -->

                                    <!--Batton Save-->
                                    <div class="form-group mt-4 mb-0">
										<?php
											if($update == true):
										?>
										<button class="btn btn-primary btn-block" name="update" type="submit">Update Center Details</button>
										
										<?php else: ?>
										<button class="btn btn-primary btn-block" name="add" type="submit">Add New Center</button>
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
    </body>
</html>
