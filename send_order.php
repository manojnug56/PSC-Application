<?php ?>
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
    </head>
    <body class="sb-nav-fixed">
        <!--Header -->
        <?php include('includes/header.php'); ?>
        <!--/Header -->

        <div id="layoutSidenav">
            <!--Sidebar -->
            <?php include('includes/sidebar.php'); ?>
            <!-- /Sidebar--> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Send Order</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Send Order</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">

                                        <div class="row justify-content-left">
                                            <form action="#" method="POST">
                                                <div class="form-group">
                                                    <label for="sel1">Stock (KG)</label>
													<table class="table">
														<tr>
															<th>Type of rice</th>
															<th>Amount(KG)</th>
														</tr>
														
														<tr>
															<td>Samba</td>
															<td>20000.00</td>
														</tr>
														
														<tr>
															<td>Naadu</td>
															<td>35000.00</td>
														</tr>
														<tr>
															<td>Basmathi</td>
															<td>50000.00</td>
														</tr>
													</table>
                                                </div>

                                            </form>
                                        </div>	
                                    </div>	

                                    <div class="col-sm-8">
                                        <div class="row justify-content-center">
											<label for="sel1">Orders</label>
                                            <table class="table">
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <th>Type of rice</th>
                                                    <th>Amount</th>
                                                </tr>
												<tr>
                                                    <td>1000</td>
                                                    <td>Samba</td>
                                                    <td>1000.00</td>
                                                </tr>
												<tr>
                                                    <td>1001</td>
                                                    <td>Naadu</td>
                                                    <td>1800.00</td>
                                                </tr>
												<tr>
                                                    <td>1002</td>
                                                    <td>Basmathi</td>
                                                    <td>5000.00</td>
                                                </tr>
                                            </table>
                                        </div>	
										<div class="form-group">
											<button type="submit" id="pay" name="search" class="btn btn-primary">Send Order</button>
										</div>
                                    </div>			
                                </div>
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
    </body>
</html>
