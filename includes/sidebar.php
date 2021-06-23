<?php?>
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                             </a>

                             <!-- User Control -->    
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#InterfaceL" aria-expanded="false" aria-controls="InterfaceL">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Farmer
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="InterfaceL" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="UserRegistration.php">Farmer Registration</a>
                                    <a class="nav-link" href="ManageUsers.php">Manage Farmer</a>
                                </nav>
                            </div>


                            <!-- Seed Categories -->    
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#SeedCategoriesL" aria-expanded="false" aria-controls="SeedCategoriesL">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-window-restore"></i></div>
                                Paddy
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="SeedCategoriesL" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="PurchaseOrder.php">Collect Paddy</a>
                                    <a class="nav-link" href="ManageCenter.php">Paddy Pricing</a>
                                </nav>
                            </div>


                            <!-- Purchase Seed -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#PcrchaseSeedL" aria-expanded="false" aria-controls="PcrchaseSeedL">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                               Orders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="PcrchaseSeedL" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="place_order.php">Issue Orders </a>
                                    <a class="nav-link" href="view_order.php">View Orders</a>
                                    <a class="nav-link" href="order_history.php">Order History</a>
                                </nav>
                            </div>


                             <!-- Payments -->
                              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#paymentL" aria-expanded="false" aria-controls="paymentL">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                payment 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="paymentL" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="payment.php">Issue payment </a>
                                    <a class="nav-link" href="payment_history.php">Payment History</a>
                                </nav>
                            </div>

                             <!-- Reports -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#as" aria-expanded="false" aria-controls="as">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                                Reports
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="as" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#"> Generate Reports </a>
                                    
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
                                    <a class="nav-link" href="#"> Manage Stock </a>
                                    <!-- <a class="nav-link" href="#">Manage Order</a> -->
                                </nav>
                            </div>
							
							 <!-- Vehicles -->
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vehicleL" aria-expanded="false" aria-controls="vehicleL">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                                Vehicles
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="vehicleL" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#"> Allocate Vehicles</a>
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
                      
                </nav>
            </div>