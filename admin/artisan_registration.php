<?php
session_start();
require_once 'config/config.php';
require_once 'include/auth_validate.php';

// Sanitize if you want
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_SPECIAL_CHARS); 
($operation == 'edit') ? $edit = true : $edit = false;

// Server POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// Sanitize input post if we want
	$data_to_db = filter_input_array(INPUT_POST);
 /*  print_r($data_to_db);
  $db = getDbInstance(); */
	// Check whether the details already exists
	$db = getDbInstance();
	$db->where('full_name', $data_to_db['full_name']); 
	$db->get('artisan_reg_tbl');

	if ($db->count >= 1)
	{
		$_SESSION['failure'] = 'Data already exists'; 
		header('location: artisan_registration.php');
		exit;
	}
   /*if(isset($_GET['operation']) && !empty($_GET['operation'])){
    
    $db->where('id', $id);
    $stat = $db->update('artisan_reg_tbl', $data_to_db);
    if ($stat)
    {
      $_SESSION['success'] = 'Artisan updated successfully';
      header('location: artisan_registration.php');
      exit;
    }
    
  } else { */
      
    $data_to_db['created_at'] = date('Y-m-d H:i:s');
    /* $data_to_db['created_by'] = $_SESSION('user_id'); */
    //$vpn1 =implode(',', $data_to_db);
    // Reset db instance
    $db = getDbInstance();
    $last_id = $db->insert('artisan_reg_tbl', $data_to_db);
  
    if ($last_id)
    {
      $_SESSION['success'] = 'Artisan added successfully';
      header('location: artisan_registration.php');
      exit;
    }
 /*  } */

}
?>
<?php include 'include/header.php';?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Artisan Registration Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Artisan Form</li>
            </ol>
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
            <?php include BASE_PATH . '/include/flash_messages.php'; ?>
              <div class="card-header">
                <h3 class="card-title">Add Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->   
              <form class="well form-horizontal" action="" method="post" id="artisan_form" enctype="multipart/form-data">
                <?php include BASE_PATH . '/forms/addArtisans.php'; ?>
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
      .w3-text-red {
        color:red;
      }
    </style>
 <?php include 'include/footer.php';?>
