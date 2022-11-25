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
            <h1>Center Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Center Form</li>
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
                    <label for="exampleInputEmail1">Center Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter center name">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">State</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter state">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">District</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter destrict">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control" id="exampleInputEmail1" placeholder="Enter address"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pincode</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter pincode">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputFile">Center Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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
