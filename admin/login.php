<?php
session_start();
require_once 'config/config.php';
$token = bin2hex(openssl_random_pseudo_bytes(16));

// If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE)
{
	header('Location: index.php');
}

// If user has previously selected "remember me option": 
if (isset($_COOKIE['series_id']) && isset($_COOKIE['remember_token']))
{
	// Get user credentials from cookies.
	$series_id = filter_var($_COOKIE['series_id']);
	$remember_token = filter_var($_COOKIE['remember_token']);
	$db = getDbInstance();
	// Get user By series ID: 
	$db->where('series_id', $series_id);
	$row = $db->getOne('admin_accounts');

	if ($db->count >= 1)
	{
		// User found. verify remember token
		if (password_verify($remember_token, $row['remember_token']))
        {
			// Verify if expiry time is modified. 
			$expires = strtotime($row['expires']);

			if (strtotime(date()) > $expires)
			{
				// Remember Cookie has expired. 
				clearAuthCookie();
				header('Location: login.php');
				exit;
			}

			$_SESSION['user_logged_in'] = TRUE;
			$_SESSION['user_type'] = $row['user_type'];
			header('Location: index.php');
			exit;
		}
		else
		{
			clearAuthCookie();
			header('Location: login.php');
			exit;
		}
	}
	else
	{
		clearAuthCookie();
		header('Location: login.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NIELIT Handloom</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> 
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> 
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css"> 
   <!--Flash message plugin-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">  
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> 
                    <img src="dist/img/NIELIT-Logo.png" style="width:90%;position:relative;left:50%;height:75%;top:10%;"/>
                </div> 
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sign in Form</h3>                   
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="authenticate.php">                
                <div class="card-body">
                    <?php if (isset($_SESSION['login_failure'])): ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php
                        echo $_SESSION['login_failure'];
                        unset($_SESSION['login_failure']);
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div> 
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer" style="text-align:center;">
                    <button type="submit" class="btn btn-default" style="background-color:#08538c;color:white;">Sign in</button>
                    </div>
                </form>
                </div>
                <!-- /.card -->             
            </div>
            <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <style>
            .content-wrapper {
                width:50%;
                position:relative;
                left:5%; 
            }  
            footer {
                display:none;
            }
        </style>
    <?php include 'include/footer.php';?>
