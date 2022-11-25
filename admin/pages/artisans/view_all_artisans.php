<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<?php 
session_start();
require_once '../../config/config.php'; 
require_once '../../include/auth_validate.php';
  // Sanitize if you want
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_SPECIAL_CHARS); 
$add = filter_input(INPUT_GET, 'add', FILTER_SANITIZE_SPECIAL_CHARS); 
($operation == 'edit') ? $edit = true : $edit = false;
($add == 'new') ? $new = true : $new = false;
//Get DB instance. function is defined in config.php
$db = getDbInstance();

$connection = mysqli_connect('localhost', 'root', '','nielit_handloom_db'); 
$sql="SELECT artisan_reg_tbl.id,artisan_reg_tbl.full_name,artisan_reg_tbl.email,artisan_reg_tbl.date_of_birth,artisan_reg_tbl.phone_no,
artisan_reg_tbl.gender,artisan_reg_tbl.caste,artisan_reg_tbl.id_card_type,artisan_reg_tbl.card_no,artisan_reg_tbl.address,
artisan_reg_tbl.district,artisan_reg_tbl.block_village,artisan_reg_tbl.pincode,artisan_reg_tbl.working_organisation,
artisan_reg_tbl.economic_group,artisan_reg_tbl.bank_account,artisan_reg_tbl.craft_practices,
artisan_reg_tbl.education_qualification,training_tbl.training_name,artisan_reg_tbl.batch_id,artisan_reg_tbl.id_proof,artisan_reg_tbl.passport_photo
,artisan_reg_tbl.created_at from 
artisan_reg_tbl INNER JOIN training_tbl ON artisan_reg_tbl.training_id=training_tbl.id";

$artisans = mysqli_query($connection,$sql);
//Get Dashboard information
//$artisans = $db->get("artisan_reg_tbl"); 

$trainingdb = getDbInstance(); 

$selectTraining = $trainingdb->get("training_tbl"); 

$batchdb = getDbInstance(); 

$selectBatch = $batchdb->get("batch_tbl"); 
if ($edit)
{
    $db->where('id', $id);
    // Get data to pre-populate the form.
    $artisan = $db->getOne('artisan_reg_tbl');  
    echo"<script language='javascript'>
    $(window).on('load', function() {
      $('#add-new').modal('show');
    }); 
    </script>
    ";
 }  else if ($new){
  echo"<script language='javascript'>   
  $(window).on('load', function() {
    $('#add-new').modal('show');
  });
  </script>
  ";
} 
// Server POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Sanitize input post if we want
    $data_to_db = filter_input_array(INPUT_POST);
    $idProof_image = $_FILES["id_proof"]["name"];
    $passport_image = $_FILES["passport_photo"]["name"];
    $img = getDbInstance();
    $img->where('id', $id); 
    $prevData = $img->get('artisan_reg_tbl'); 

    foreach($prevData as $img) { 
       if($idProof_image== NULL) {
         $images = $img['id_proof'];
       } else {
           if($uploadDir_path = "../assets/imgUploads/id_proof/".$img['id_proof']) {
                unlink($uploadDir_path);
                $images = $_FILES["id_proof"]["name"];
           }
       }

      if($passport_image== NULL) {
        $images_two = $img['passport_photo'];
      } else {
          if($uploadDir_path = "../assets/imgUploads/passport_photo/".$img['passport_photo']) {
               unlink($uploadDir_path);
               $images_two = $_FILES["passport_photo"]["name"];
          }
      }
    }
    $data_to_db['id_proof'] = $images;
    $data_to_db['passport_photo'] = $images_two;

    if(isset($_GET['operation']) && !empty($_GET['operation'])){
        
      $db->where('id', $id);
      $stat = $db->update('artisan_reg_tbl', $data_to_db);
      if ($stat)
      {
        if($idProof_image== NULL) {
            $_SESSION['success'] = 'ID Proof Image updated with existing one!';
            // Redirect to the listing page
            /* header('Location: show_all_projects.php'); */
        } else { 
            move_uploaded_file($_FILES["id_proof"]["tmp_name"], "../assets/imgUploads/id_proof/".$_FILES["id_proof"]["name"]);
            $_SESSION['success'] = 'ID Image updated successfully!';
            // Redirect to the listing page
            /* header('Location: show_all_projects.php'); */
        }
        if($passport_image== NULL) {
          $_SESSION['success'] = 'Passport Image updated with existing one!';
            // Redirect to the listing page
            /* header('Location: show_all_projects.php'); */
        } else { 
            move_uploaded_file($_FILES["passport_photo"]["tmp_name"], "../assets/imgUploads/passport_photo/".$_FILES["passport_photo"]["name"]);
            $_SESSION['success'] = 'Passport Image updated successfully!';
            // Redirect to the listing page
            /* header('Location: show_all_projects.php'); */
        }
        $_SESSION['success'] = 'Artisan data updated successfully';
        $statusType = 'alert-success';
        $statusMsg = 'Artisan updated successfully';
        header('location: view_all_artisans.php');
        exit;
      }
      
    } else {
        
      $uploadedFile='';
      $uploadDir = '../assets/imgUploads/id_proof/'; 
      if(isset($_FILES['id_proof']['name'])) {
          // File path config 
          $fileName = basename($_FILES["id_proof"]["name"]); 
          $targetFilePath = $uploadDir . $fileName; 
          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
          
          // Allow certain file formats 
          $allowTypes = array('jpeg','jpg','png','PNG','JPEG','JPG','gif','GIF');
          if(in_array($fileType, $allowTypes)){ 
              // Upload file to the server 
              if(move_uploaded_file($_FILES["id_proof"]["tmp_name"], $targetFilePath)){ 
                  $uploadedFile = $fileName; 
              }else{ 
                  $uploadStatus = 0; 
                  $_SESSION['info']  = 'Sorry, there was an error uploading your images.'; 
              } 
          }else{ 
              $uploadStatus = 0; 
              $_SESSION['failure'] = 'Files were not selected. Please select image '; 
          } 
      }
  
      $uploadedFiletwo='';
      $uploadDirTwo = '../assets/imgUploads/passport_photo/'; 
      if(isset($_FILES['passport_photo']['name'])) {
          // File path config 
          $fileName = basename($_FILES["passport_photo"]["name"]); 
          $targetFilePath = $uploadDirTwo . $fileName; 
          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
          
          // Allow certain file formats 
          $allowTypes = array('jpeg','jpg','png','PNG','JPEG','JPG','gif','GIF');
          if(in_array($fileType, $allowTypes)){ 
              // Upload file to the server 
              if(move_uploaded_file($_FILES["passport_photo"]["tmp_name"], $targetFilePath)){ 
                  $uploadedFiletwo = $fileName; 
              }else{ 
                  $uploadStatus = 0; 
                  $_SESSION['info']  = 'Sorry, there was an error uploading your images.'; 
              } 
          }else{ 
              $uploadStatus = 0; 
              $_SESSION['failure'] = 'Files were not selected. Please select image '; 
          } 
      }

      $data_to_db['id_proof'] = $uploadedFile;
      $data_to_db['passport_photo'] = $uploadedFiletwo;
      $data_to_db['created_at'] = date('Y-m-d H:i:s');

      // Reset db instance
      $dbtwo = getDbInstance();
      $last_id = $dbtwo->insert('artisan_reg_tbl', $data_to_db);

      if ($last_id)
      {
        $_SESSION['success'] = 'Artisan added successfully';
        $statusType = 'alert-success';
        $statusMsg = 'Artisan Added successfully';
        header('location: view_all_artisans.php');
        exit;
      }
    }
}
 
// Load the database configuration file
include_once 'dbConfig.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?> 
<?php include '../common/header.php';?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Artisans All Datas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Artisans</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php include BASE_PATH . '/include/flash_messages.php'; ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">          
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Artisans Lists</h3>
                <!-- Display status message -->
                <?php if(!empty($statusMsg)){ ?>
                <div class="col-xs-12">                     
                    <div class="alert <?php echo $statusType; ?> alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color:#010000;font-weight:bold;">×</a>
                      <?php echo $statusMsg; ?>
                    </div> 
                </div>
                <?php } ?>
                 <!-- Import link -->
                <div class="col-md-12 head">
                    <div class="float-right">
                      <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import Bulk Data</a>
                      <a href="view_all_artisans.php?add=new" class="btn btn-default plus_btn">Add New</a>
                    </div>
                </div>
                <!-- CSV file upload form -->
                <div class="col-md-12" id="importFrm" style="display: none;">
                    <form action="importData.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-6">
                              <label for="inputProjectname">Training Name<span class="w3-text-red">*</span></label>
                              <select name="training_id" class="form-control selectpicker" required>
                                    <option value=" ">Please select training</option>
                                    <?php
                                    foreach ($selectTraining as $row) { 
                                        echo'<option value="'.$row["id"].'">'.         
                                        $row["training_name"].'</option>';  
                                    }
                                    ?>
                                </select>  
                            </div>
                            <div class="col-sm-6">
                              <label for="inputProjectname">Batch No:<span class="w3-text-red">*</span></label>
                              <select name="batch_id" class="form-control selectpicker" required>
                                    <option value=" ">Please select batch</option>
                                    <?php
                                    foreach ($selectBatch as $row) { 
                                        echo'<option value="'.$row["batch_id"].'">'.         
                                        $row["batch_id"].'</option>';  
                                    }
                                    ?>
                                </select>  
                            </div>                     
                        </div>                        
                        <input type="file" name="file" />
                        <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT CSV">
                        <p><a href="sample-csv-artisans.csv" download="">Download sample file</a></p>
                    </form> 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped" style="width:100%;white-space: nowrap;">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Phone No</th>
                    <th>Gender</th>
                    <th>Caste</th>
                    <th>Id Card Type</th>
                    <th>Card No</th>
                    <th>Address</th>
                    <th>District</th>
                    <th>Block/Village</th>
                    <th>Pincode</th>
                    <th>Working Organisation</th>
                    <th>Economic Group</th>
                    <th>Craft Practices</th>
                    <th>Education Qualification</th>
                    <th>Training</th>
                    <th>Batch</th>
                    <th>Id Proof</th>
                    <th>Passport Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody> 
                  <?php  $i = 0;
                  if($artisans) {
                  while($row = mysqli_fetch_array($artisans)) {
                     ?> 
                  <tr>
                    <td><?php echo ++$i;?></td>
                    <td><?php echo htmlspecialchars( $row['full_name'] ); ?></td>
                    <td><?php echo htmlspecialchars( $row['email'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['date_of_birth'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['phone_no'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['gender'] ); ?> </td>
                    <td> <?php echo htmlspecialchars( $row['caste'] ); ?></td>
                    <td><?php echo htmlspecialchars( $row['id_card_type'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['card_no'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['address'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['district'] ); ?> </td>
                    <td> <?php echo htmlspecialchars( $row['block_village'] ); ?></td>
                    <td><?php echo htmlspecialchars( $row['pincode'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['working_organisation'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['economic_group'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['craft_practices'] ); ?> </td>
                    <td> <?php echo htmlspecialchars( $row['education_qualification'] ); ?></td>
                    <td><?php echo htmlspecialchars( $row['training_name'] ); ?> </td> 
                    <td><?php echo htmlspecialchars( $row['batch_id'] ); ?> </td>  
                    <?php                                 
                       $imageURLIDProof = '../assets/imgUploads/id_proof/'.$row["id_proof"];      
                       $imageURLPassport = '../assets/imgUploads/passport_photo/'.$row["passport_photo"];                                                   
                    ?>
                    <td>
                      <?php if($row["id_proof"]!==NULL)  {   echo' 
                      <img src="'.$imageURLIDProof.'" style="width: 18%; height: 20%;" onclick="showImage(this)" class="myImg" /> '  ?><?php } ?>
                    </td>  
                    <td>
                      <?php if($row["passport_photo"]!==NULL)  {   echo' 
                      <img src="'.$imageURLPassport.'" style="width: 18%; height: 20%;" onclick="showImage(this)" class="myImg"/> '  ?><?php } ?>
                    </td>  
                    <td> 
                        <a href="view_all_artisans.php?id=<?php echo $row['id']; ?>&operation=edit" class="btn btn-success"  >Edit</a>
                        <a href="#" class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['id']; ?>">Delete</a>
                      </td>
                  </tr>
                  <!-- Delete Confirmation Modal -->
                  <div class="modal fade" id="confirm-delete-<?php echo $row['id']; ?>" role="dialog">
                      <div class="modal-dialog">
                          <form action="../common/generic_delete.php" method="POST">
                              <!-- Modal content -->
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title">Confirm</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                      <input type="hidden" name="del_id" id="del_artisan_id" value="<?php echo $row['id']; ?>">
                                      <input type="hidden" name="email" id="email" value="<?php echo $row['email']; ?>">
                                      <p>Are you sure you want to delete?</p>
                                  </div>
                                  <div class="modal-footer">
                                      <!-- <button type="submit" class="btn btn-default pull-left">Yes</button> -->
                                      <a href="javascript:void(0);" onclick="deleteArtisan('<?php echo $row['id']; ?>')" class="btn btn-danger">Delete</a>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                  <!-- //Delete Confirmation Modal -->
                  <?php } } ?>
                  </tbody> 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- add Confirmation Modal -->
    <div class="modal fade" id="add-new" role="dialog">
      <div class="modal-dialog modal-lg" role="document">  
        <form class="well form-horizontal" action="" method="post" id="artisan_form" enctype="multipart/form-data">
          <!-- Modal content -->
          <div class="modal-content"> 
              <div class="modal-header">
                  <h4 class="modal-title">Artisan Registration Form</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>               
              </div> 
              <div class="modal-body">    
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
                          <?php include BASE_PATH . '/forms/addArtisans.php'; ?>     
                          </div>
                          <!-- /.card -->             
                        </div>
                        <!--/.col (right) -->
                      </div>
                      <!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </section>
                  <!-- /.content -->                                     
              </div>
          </div>
        </form>                 
      </div>
    </div>
    <!-- //add Confirmation Modal -->

    <!-- The ImageModal -->
    <div id="myModal" class="modalImage">
        <span class="close" id="close">&times;</span>
        <img class="modal-img-content" id="img01">
        <div id="caption"></div>
    </div>
    <!-- End of ImageModal -->

    <!-- Show/hide CSV upload form -->
    <script>
    function formToggle(ID){
        var element = document.getElementById(ID);
        if(element.style.display === "none"){
            element.style.display = "block";
        } else{
            element.style.display = "none";
        }
    }
    function deleteArtisan(id){  
            $.post( "../common/generic_delete.php", {action_type:"artisan_delete",id:id}, function(resp) {      
                    alert('Data deleted successfully');
                    location.replace("view_all_artisans.php");  
            }); 
    }

    /*--Image Modal Script--*/
    var modal = document.getElementById('myModal'); 
    var modalImg = document.getElementById('img01');

    function showImage(imgElement) { 
      var src = imgElement.getAttribute("src");
      modal.style.display = "block";
      modalImg.src = src;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementById("close");

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {  
      modal.style.display = "none";
    } 
    </script>
    <style>
    #importFrm {
        text-align: center;
        margin-bottom: 10px;
        padding: 10px;
        border: 2px dashed #c2c5cb;
    }
    .w3-text-red {
        color:red;
      }
      li {
        list-style:none;
      } 
    .myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    .myImg:hover {opacity: 0.7;}
    /* The Modal (background) */
    .modalImage {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-img-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }

    /* Add Animation */
    .modal-img-content, #caption {  
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
      from {-webkit-transform:scale(0)} 
      to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
      from {transform:scale(0)} 
      to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
      .modal-img-content {
        width: 100%;
      }
    }
 </style> 
<?php include '../common/footer.php';?>
