      <!-- Main content -->
  <section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputProjectname">Venue Name<span class="w3-text-red">*</span></label>
                        <input type="text" class="form-control" name="venue_name" value="<?php echo htmlspecialchars($edit ? $venue['venue_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter venue name" required>                    
                    </div>
                    <div class="col-sm-6">
                    <label for="exampleInputEmail1">Select Training<span class="w3-text-red">*</span></label>
                    <select name="training_id" class="form-control selectpicker" required>
                      <option value=" ">Please select training</option>
                      <?php foreach ($selectTraining as $row) {
                        if ($edit && $row['id'] == $venue['training_id']) {
                              $sel = 'selected';
                          } else {
                              $sel = '';
                          }
                    /*    echo'<option value="'.$row["id"].'"' . $sel . '>'.           
                        $row["training_name"].'</option>';   */ 
                        echo '<option value="'.$row["id"].'"' . $sel . '>' . $row["training_name"] . '</option>';
                          }
                      ?> 
                    </select>                      
                  </div>                      
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputProjectname">State<span class="w3-text-red">*</span></label>
                        <input type="text" class="form-control" name="state" placeholder="Enter state" value="<?php echo htmlspecialchars($edit ? $venue['state'] : '', ENT_QUOTES, 'UTF-8'); ?>">                    
                    </div>
                    <div class="col-sm-6">
                        <label for="inputProjectname">District<span class="w3-text-red">*</span></label>
                        <input type="text" class="form-control" name="district" placeholder="Enter district" value="<?php echo htmlspecialchars($edit ? $venue['district'] : '', ENT_QUOTES, 'UTF-8'); ?>">                    
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputProjectname">Venue Address<span class="w3-text-red">*</span></label> 
                        <textarea name="address" class="form-control" placeholder="Enter address" value="<?php echo htmlspecialchars($edit ? $venue['address'] : '', ENT_QUOTES, 'UTF-8'); ?>"></textarea>                    
                    </div> 
                    <div class="col-sm-6">
                        <label for="inputProjectname">Pincode<span class="w3-text-red">*</span></label> 
                        <input type="number" name="pincode" class="form-control" placeholder="Enter pincode" value="<?php echo htmlspecialchars($edit ? $venue['pincode'] : '', ENT_QUOTES, 'UTF-8'); ?>"></textarea>                    
                    </div>                     
                </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit<i class="glyphicon glyphicon-send"></i></button>
          </div>
        </div>
        <!-- /.card -->             
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content --> 