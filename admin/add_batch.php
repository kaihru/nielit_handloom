<?php
session_start();
require_once './config/config.php';
require_once 'include/auth_validate.php';
include 'include/header.php' 
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 text-center my-auto">
            <h1>Batch Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Batch Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Training Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter training name">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Center Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter center name">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Duration</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter duration">
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Starting Date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter starting date">
                  </div> 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
 <?php include 'include/footer.php';?>
