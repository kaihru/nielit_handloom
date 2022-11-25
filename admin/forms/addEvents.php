<?php 
require_once 'config/config.php'; 
  // Sanitize if you want
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_SPECIAL_CHARS); 
($operation == 'edit') ? $edit = true : $edit = false;
//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Get Dashboard information
$all_events = $db->get("nielit_events"); 
$centreId;
if ($edit)
{
    $db->where('id', $id);
    // Get data to pre-populate the form.
    $events = $db->getOne('nielit_events');
    $centreId= $events['centre_id'];
} 
$centredb = getDbInstance();
/* $centredb->where('id', $centreId); */
$selectCentres = $centredb->get("nielit_centres"); 
/* echo '<pre>'
 print_r($selectCentres);
 echo '</pre>' */
?>
<div class="form-elements-wrapper" style="margin-top:2%;">
            <div class="row">
              <div class="col-lg-6">
                <!-- input style start -->
                <div class="card-style mb-30">
                  <h6 class="mb-25">Add Event</h6>
                  <div class="input-style-1">
                  <label class="col-md-4 control-label">Event Name</label>
                    <input type="text" name="event_name" value="<?php echo htmlspecialchars($edit ? $events['event_name'] : '', ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Add Event Name"/>
                  </div> 
                  <div class="input-style-1">
                  <label class="col-md-4 control-label">Event Date</label>
                    <input type="date" name="event_date" placeholder="Add date" value="<?php echo htmlspecialchars($edit ? $events['event_date'] : '', ENT_QUOTES, 'UTF-8'); ?>" />
                  </div>
                  <!-- end input -->
                  <div class="input-style-2">
                    <label class="col-md-4 control-label">Centres</label>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select name="centre_id" class="form-control selectpicker" required>
                      <option value=" ">Please select centres</option>
                      <?php foreach ($selectCentres as $row) {
                        if ($edit && $row == $events['centre_id']) {
                              $sel = 'selected';
                          } else {
                              $sel = '';
                          }
                       echo'<option value="'.$row["id"].'"' . $sel . '>'.           
                        $row["centre_name"].'</option>';  
                        /* echo '<option value="'.$row.'"' . $sel . '>' . $row . '</option>'; */
                          
                          }
                      ?> 
                    </select>  
                  </div> 
                  <div class="input-style-1">
                  <label class="col-md-4 control-label">Time Slot</label>
                    <input type="date" name="time_slot" placeholder="Add Time Slot" value="<?php echo htmlspecialchars($edit ? $events['time_slot'] : '', ENT_QUOTES, 'UTF-8'); ?>"/>
                  </div>
                  <div class="input-style-1">
                  <label class="col-md-4 control-label">Expected Audience</label>
                    <input type="text" name="expected_audience" placeholder="Add Expected Audience" value="<?php echo htmlspecialchars($edit ? $events['expected_audience'] : '', ENT_QUOTES, 'UTF-8'); ?>"/>
                  </div>
                  <div class="form-group"> 
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-warning">Submit <i class="glyphicon glyphicon-send"></i></button>
                        </div>
                    </div>
                  <!-- end input -->
                </div>
            </div>
        

            <div class="col-lg-6">
            <div class="card-style mb-30">
            <div class="table-responsive">
                  <table class="table top-selling-table">
                    <thead>
                      <tr>
                        <th>
                           # 
                        </th>      
                        <th>
                        Event Name 
                        </th>
                        <th class="min-width"> 
                            Event Date <i class="lni lni-arrows-vertical"></i>
                       
                        </th>
                        <th class="min-width"> 
                            Time Slot <i class="lni lni-arrows-vertical"></i>
                        
                        </th>
                        <th class="min-width"> 
                            Expected Audience <i class="lni lni-arrows-vertical"></i>
                        
                        </th>    
                        <th> 
                            Actions <i class="lni lni-arrows-vertical"></i> 
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_events as $row): ?>
                      <tr>
                        <td><?php echo htmlspecialchars( $row['id'] ); ?> </td>
                        <td> <?php echo htmlspecialchars( $row['event_name'] ); ?></td>
                        <td><?php echo htmlspecialchars( $row['event_date'] ); ?> </td> 
                        <td><?php echo htmlspecialchars( $row['time_slot'] ); ?> </td> 
                        <td><?php echo htmlspecialchars( $row['expected_audience'] ); ?> </td> 

                        <td> 
                        <div class="action justify-content"> 
                            <button
                              class="more-btn ml-10 dropdown-toggle"
                              id="moreAction1"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="lni lni-more-alt"></i>
                            </button> 
                            <ul
                              class="dropdown-menu dropdown-menu-end"
                              aria-labelledby="moreAction1"
                            >
                              <li class="dropdown-item">
                                <!-- <a href="#0" class="text-gray"> Remove</a> -->
                                <a href="javascript:void(0);" onclick="deleteEvent('<?php echo $row['id']; ?>')" class="btn btn-danger"><i class="lni lni-trash-can"></i>&nbsp;&nbsp;Delete</a>
                              </li>
                              <li class="dropdown-item">
                                <!-- <a href="#0" class="text-gray"> Edit</a> -->
                                <a href="add_events.php?id=<?php echo $row['id']; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit Details</a>
                              </li>
                            </ul>
                          </div>  
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <!-- End Table -->
                </div>
                </div>
        </div>
</div> 
<script>
  function deleteEvent(id){ 
    var result = confirm("Are you sure to delete?");
    if(result){
        $.post( "genericDelete.php", {action_type:"event_delete",id:id}, function(resp) {      
                alert('Data deleted successfully');
                location.reload();
        });
    }
}
</script>