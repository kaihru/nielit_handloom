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
$sql="SELECT batch_tbl.id,training_tbl.training_name, venue_tbl.venue_name,batch_tbl.batch_id,batch_tbl.duration,batch_tbl.starting_date,batch_tbl.created_at from 
((batch_tbl INNER JOIN training_tbl ON batch_tbl.training_id=training_tbl.id)INNER JOIN venue_tbl ON batch_tbl.venue_id=venue_tbl.id)";
//$batches = array();
$batches = mysqli_query($connection,$sql);
/* if ($result = $db -> query($sql)) {
  $batches[] = $result;
  var_dump($batches);
 // $result -> free_result();
} */

//Get Dashboard information
//$batches = $db->get("batch_tbl"); 

$trainingdb = getDbInstance(); 

$selectTraining = $trainingdb->get("training_tbl"); 

$venuedb = getDbInstance(); 

$selectVenue = $venuedb->get("venue_tbl"); 
if ($edit)
{
    $db->where('id', $id);
    // Get data to pre-populate the form.
    $batch = $db->getOne('batch_tbl');  
    echo"<script language='javascript'> 
    $(window).on('load', function() {
      $('#add-new').modal('show');
      $('#opt_lesson_list').show();
      $('#opt_level').attr('disabled', 'disabled');
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
    if(isset($_GET['operation']) && !empty($_GET['operation'])){
        
      $db->where('id', $id);
      $stat = $db->update('batch_tbl', $data_to_db);
      if ($stat)
      {
        $_SESSION['success'] = 'Batch updated successfully';
        $statusType = 'alert-success';
        $statusMsg = 'Batch updated successfully';
        header('location: view_all_batches.php');
        exit;
      }
      
    } else {
        
      $data_to_db['created_at'] = date('Y-m-d H:i:s');

      // Reset db instance
      $dbtwo = getDbInstance();
      $last_id = $dbtwo->insert('batch_tbl', $data_to_db);

      if ($last_id)
      {
        $_SESSION['success'] = 'Batch added successfully';
        $statusType = 'alert-success';
        $statusMsg = 'Batch Added successfully';
        header('location: view_all_batches.php');
        exit;
      }
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
            <h1>Batches All Datas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Batches</li>
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
                <h3 class="card-title">Batches Lists</h3> 
                <div class="col-md-12 head">
                    <div class="float-right">
                        <a href="view_all_batches.php?add=new" class="btn btn-default plus_btn">Add New</a>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped" style="width:100%;white-space: nowrap;">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Training Name</th>
                    <th>Venue Name</th>
                    <th>Batch Id</th>
                    <th>Duration</th> 
                    <th>Starting Date</th> 
                    <th>Created At</th> 
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($batches) {
                  while($row = mysqli_fetch_array($batches)) {
                     ?> 
                  <tr>
                    <td><?php echo htmlspecialchars( $row['id'] ); ?> </td>
                    <td> <?php echo htmlspecialchars( $row['training_name'] ); ?></td>
                    <td> <?php echo htmlspecialchars( $row['venue_name'] ); ?></td>
                    <td> <?php echo htmlspecialchars( $row['batch_id'] ); ?></td>
                    <td> <?php echo htmlspecialchars( $row['duration'] ); ?></td>
                    <td> <?php echo htmlspecialchars( $row['starting_date'] ); ?></td> 
                    <td><?php echo htmlspecialchars( $row['created_at'] ); ?> </td>  
                    <td> 
                        <a href="view_all_batches.php?id=<?php echo $row['id']; ?>&operation=edit" class="btn btn-success"  >Edit</a>
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
                                      <button type="button" class="close" data-dismiss="modal" id="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                      <input type="hidden" name="del_id" id="del_batch_id" value="<?php echo $row['id']; ?>"> 
                                      <p>Are you sure you want to delete?</p>
                                  </div>
                                  <div class="modal-footer">
                                      <!-- <button type="submit" class="btn btn-default pull-left">Yes</button> -->
                                      <a href="javascript:void(0);" onclick="deleteBatch('<?php echo $row['id']; ?>')" class="btn btn-danger">Delete</a>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                  <!-- //Delete Confirmation Modal -->

                    <!-- add Confirmation Modal -->
                    <div class="modal fade" id="add-new" role="dialog">
                      <div class="modal-dialog modal-lg" role="document">     
                        <form class="well form-horizontal" action="" method="post" id="venue_form" enctype="multipart/form-data">
                          <!-- Modal content -->
                          <div class="modal-content"> 
                              <div class="modal-header">
                                  <h4 class="modal-title">Batch Form</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>               
                              </div> 
                              <div class="modal-body">
                                <?php include BASE_PATH . '/forms/addBatch.php'; ?>
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- //add Confirmation Modal --> 
                  <?php  } }?>
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


    <script>
    function deleteBatch(id){  
            $.post( "../common/generic_delete.php", {action_type:"batch_delete",id:id}, function(resp) {      
                    alert('Data deleted successfully');
                    location.replace("view_all_batches.php");  
            }); 
    }
    function trainingCount() {
        var level = $('#opt_level').val();
        if(level){
            $.ajax ({
                type: 'POST',
                url: 'count_batches.php',
                data: { hps_level: '' + level + '' },
                success : function(htmlresponse) {
                  htmlresponse++;
                  $('#opt_lesson_list').show();
                    $('#batch_id').val(htmlresponse); 
                }
            });
        } 
      }
    </script>
    <style> 
    .w3-text-red {
        color:red;
      }
      #opt_lesson_list {
        color:red;
      }
    </style>
<?php include '../common/footer.php';?>
