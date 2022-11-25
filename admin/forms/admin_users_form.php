 <?php 
 require_once 'config/config.php'; 

//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Get Dashboard information
$admin = $db->get("admin_accounts"); 

$centredb = getDbInstance();
$centres = $centredb->get("nielit_centres"); 
?>
<div class="form-elements-wrapper" style="margin-top:2%;">
            <div class="row">
              <div class="col-lg-6">
                <!-- input style start -->
                <div class="card-style mb-30">
                  <h6 class="mb-25">Add Users</h6>
                  <div class="input-style-1">
                  <label class="col-md-4 control-label">User Name</label>
                  <input type="text" name="user_name" placeholder="Username" class="form-control" required="" value="<?php echo ($edit) ? $admin_account['user_name'] : ''; ?>" autocomplete="off">
                  </div> 
                  <div class="input-style-1">
                  <label class="col-md-4 control-label">Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control" required="" autocomplete="off">
                  </div>
                  <div class="input-style-1">
                    <label class="col-md-4 control-label">District Name</label>
                        <?php $opt_arr = array("Kohima", "Dimapur", "Wokha", "Tuensang","Zunheboto", "Longleng", "Peren", "Mokokchung", "Mon", "Peren", "Kiphire", "Phek", "Noklak", "Shamator", "Tsiiminyu", "Niuland", "Chiimoukedima"); ?>
                        <select name="district" class="form-control selectpicker" value="<?php echo htmlspecialchars($edit ? $project['district_name'] : '', ENT_QUOTES, 'UTF-8'); ?>">
                            <option value=" ">Please select district</option>
                            <?php
                            foreach ($opt_arr as $opt) {
                                if ($edit && $opt == $project['district_name']) {
                                    $sel = 'selected';
                                } else {
                                    $sel = '';
                                }
                                echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                  <!-- end input -->
                  <div class="input-style-2">
                    <label class="col-md-4 control-label">Centres</label>
                    <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
                    <select name="centre_id" class="form-control selectpicker" required>
                      <option value=" ">Please select centres</option>
                      <?php foreach ($centres as $row) {
                        
                        echo'<option value="'.$row["id "].'">'.           
                        $row["centre_name"].'</option>';
                          
                          }
                      ?>
                    </select> 
                  </div>  
                   
                    <!-- Radio checks -->
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" style="font-weight:bold;">User Type</label> 
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <?php //echo $admin_account['user_type'] ?>
                                    <input type="radio" name="user_type" value="super" required="" <?php echo ($edit && $admin_account['user_type'] =='super') ? "checked": "" ; ?>/> Administrator
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="user_type" value="admin" required="" <?php echo ($edit && $admin_account['user_type'] =='admin') ? "checked": "" ; ?>/> Coordinator
                                </label>
                            </div>
                        </div> 
                    </div>
                  <div class="form-group" style="margin-top:5%;"> 
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
                        User Name 
                        </th> 
                        <th class="min-width"> 
                            Admin Type <i class="lni lni-arrows-vertical"></i>
                        
                        </th>   
                        <th> 
                            Actions <i class="lni lni-arrows-vertical"></i> 
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($admin as $row): ?>
                      <tr>
                        <td><?php echo htmlspecialchars( $row['id'] ); ?> </td>
                        <td> <?php echo htmlspecialchars( $row['user_name'] ); ?></td> 
                        <td><?php echo htmlspecialchars( $row['user_type'] ); ?> </td>  

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
                                <a href="#0" class="text-gray"> Remove</a>
                              </li>
                              <li class="dropdown-item">
                                <a href="#0" class="text-gray"> Edit</a>
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
<style>
 .radio {
  margin-top:10%;
 }
  </style>