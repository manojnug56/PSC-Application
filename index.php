<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="bg-new">

<?php

	require_once "config.php";
	
	$error = ''; 
	if(isset($_POST['login']))
	{			
		
			$uId  = $_POST['inputUserId'];
			$pwrd =  $_POST['inputPassword'];

			$sql = ("SELECT * FROM tbl_user WHERE id='$uId' AND pswrd='$pwrd'");
			$result = mysqli_query($link,$sql);
			$count = mysqli_num_rows($result);
			
			if($count>0)
			{
				$row = mysqli_fetch_assoc($result);
				$_SESSION['ROLE'] = $row['role'];
				$_SESSION['IS_LOGIN'] = 'yes';
				
				if($row['role']==1)
				{
					header('location:adDash.php');
					die();
				}
				
				else if($row['role']==2)
				{
					header('location:headDash.php');
					die();
				}
				
				else if($row['role']==3)
				{
					header('location:collectionDash.php');
					die();
				}
				
				else if($row['role']==4)
				{
					header('location:payDash.php');
					die();
				}
				
				else
				{
					header('location:centerDash.php');
					die();
				}
				
				
			}
			
			else
			{
					$error = 'Please Enter Correct Login Credentials !'; 

			}
			
	
	}
?>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <img src="./assets/img/Capture-removebg-preview.png" id="icon" alt="User Icon" />
                                </div>

                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUserId">User Id</label>
                                            <input class="form-control py-4" id="inputUserId" name="inputUserId" type="username"
                                                placeholder="Enter user id" required />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" name="inputPassword" type="password"
                                                placeholder="Enter password" required />
                                        </div>
                                        
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" style="color:red;"><?php  echo $error?></a>
											<input type="submit" class="btn btn-primary" value="Login" id="login" name="login">
			
                                        </div>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>