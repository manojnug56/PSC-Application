</html><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PSC | Dashboard</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <!--Header -->
    <?php include('includes/header.php');?>
     <!--/Header -->
    <div id="layoutSidenav">
        <!--Sidebar -->
        <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                             </a>

                           
                            <!-- Paddy  -->    
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#SeedCategoriesL" aria-expanded="false" aria-controls="SeedCategoriesL">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-window-restore"></i></div>
                                Paddy
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="SeedCategoriesL" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="PurchaseOrder.php">Collect Paddy</a>
                                </nav>
                            </div>


                            <!-- stock -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#storeManagemetL" aria-expanded="false" aria-controls="storeManagemetL">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                                Stock
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="storeManagemetL" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#"> View Stock </a>
                                    <!-- <a class="nav-link" href="#">Manage Order</a> -->
                                </nav>
                            </div>
							
							


							<!-- All Pages -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesL" aria-expanded="false" aria-controls="pagesL">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                All Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesL" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                

                                </nav>
                            </div>
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Collection Officer
                </nav>
            </div>
        <!-- /Sidebar--> 
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><small>Dashboard</li>
                    </ol>


                    <div class="row">
                    <div class="col-xl-12 col-md-6">
                            <div style="height: 10rem" class="card  bg-new  text-white mb-4">
                                
                            </div>
                        </div>
                    </div>

                    <!-- Cards -->

                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="h5 card-body">My Account</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="h5 card-body">Collect Paddy</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="PurchaseOrder.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="h5 card-body">View Stock</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Cards -->
                </div>
            </main>
            <!--Footer -->
            <?php include('includes/footer.php');?>
            <!--/Footer -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>