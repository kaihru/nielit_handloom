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
                        <div class="col-sm-12">
                            <label for="inputProjectname">Training Name<span class="w3-text-red">*</span></label>
                            <input type="text" class="form-control" name="training_name" value="<?php echo htmlspecialchars($edit ? $training['training_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter full name" required>                    
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