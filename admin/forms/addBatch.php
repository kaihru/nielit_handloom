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
              <!-- form start --> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Training Name </label>
                    <select name="training_id" class="form-control selectpicker" required id="opt_level" onchange="trainingCount()">
                      <option value=" ">Please select training</option>
                      <?php foreach ($selectTraining as $row) {
                        if ($edit && $row['id'] == $batch['training_id']) {
                              $sel = 'selected';
                          } else {
                              $sel = '';
                          } 
                        echo '<option value="'.$row["id"].'"' . $sel . '>' . $row["training_name"] . '</option>';
                          }
                      ?> 
                    </select>  
                  </div>  
                  <div class="form-group" style="display:none;" id="opt_lesson_list">
                    <label for="exampleInputEmail1">Batch No (Id):</label>
                    <input type="number" class="form-control" id="batch_id" name="batch_id" readonly="readonly" value="<?php echo htmlspecialchars($edit ? $batch['batch_id'] : '', ENT_QUOTES, 'UTF-8'); ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Venue Name</label>
                    <select name="venue_id" class="form-control selectpicker" required>
                      <option value=" ">Please select venue</option>
                      <?php foreach ($selectVenue as $row) {
                         if ($edit && $row['id']  == $batch['venue_id']) {
                              $sel = 'selected';
                          } else {
                              $sel = '';
                          }
                          echo '<option value="'.$row["id"].'"' . $sel . '>' . $row["venue_name"] . '</option>';                          
                          }
                      ?> 
                    </select>  
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Duration</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter duration" name="duration" value="<?php echo htmlspecialchars($edit ? $batch['duration'] : '', ENT_QUOTES, 'UTF-8'); ?>">
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Starting Date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter starting date" name="starting_date" value="<?php echo htmlspecialchars($edit ? $batch['starting_date'] : '', ENT_QUOTES, 'UTF-8'); ?>">
                  </div> 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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