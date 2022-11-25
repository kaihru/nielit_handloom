    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="inputProjectname">Full Name<span class="w3-text-red">*</span></label>
                <input type="text" class="form-control" name="full_name" value="<?php echo htmlspecialchars($edit ? $artisan['full_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter full name" required>                    
            </div>
            <div class="col-sm-6">
            <label for="exampleInputEmail1">Email address<span class="w3-text-red">*</span></label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="<?php echo htmlspecialchars($edit ? $artisan['email'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter email">
            </div>                      
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="inputProjectname">Date of Birth<span class="w3-text-red">*</span></label> 
                <input type="date" class="form-control" name="date_of_birth" placeholder="Enter date of birth" value="<?php echo date("d-m-Y", strtotime($artisan['date_of_birth'])); ?>">                    
            </div>
            <div class="col-sm-6">
            <label for="exampleInputEmail1">Phone No.<span class="w3-text-red">*</span></label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="phone_no" placeholder="Enter phone no" value="<?php echo htmlspecialchars($edit ? $artisan['phone_no'] : '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>                      
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="inputProjectname">Gender<span class="w3-text-red">*</span></label>
                <?php $opt_arr = array("Male", "Female", "Other"); ?>
                <select name="gender" class="form-control selectpicker" value="gender">
                    <option value=" ">Please select gender</option>
                    <?php
                    foreach ($opt_arr as $opt) {
                        if ($edit && $opt == $artisan['gender']) {
                            $sel = 'selected';
                        } else {
                            $sel = '';
                        }
                        echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                    }
                    ?>
                </select>      
            </div>
            <div class="col-sm-6">
            <label for="exampleInputEmail1">Caste<span class="w3-text-red">*</span></label>
            <?php $opt_arr = array("ST", "SC", "MIN", "OBC", "GEN"); ?>
            <select name="caste" class="form-control selectpicker" value="caste">
                <option value=" ">Please select caste</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $artisan['caste']) {
                        $sel = 'selected';
                    } else {
                        $sel = '';
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }
                ?>
            </select> 
            </div>                      
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="inputProjectname">ID Card Type<span class="w3-text-red">*</span></label>
                <?php $opt_arr = array("BPL", "Ration", "Artisan ID Card", "Voter ID","Aadhaar", "Pancard"); ?>
                <select name="id_card_type" class="form-control selectpicker" value="<?php echo htmlspecialchars($edit ? $artisan['id_card_type'] : '', ENT_QUOTES, 'UTF-8'); ?>">
                    <option value=" ">Please select card</option>
                    <?php
                    foreach ($opt_arr as $opt) {
                        if ($edit && $opt == $artisan['id_card_type']) {
                            $sel = 'selected';
                        } else {
                            $sel = '';
                        }
                        echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                    }
                    ?>
                </select>         
            </div>
            <div class="col-sm-6">
            <label for="exampleInputEmail1">ID card no.</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="card_no" placeholder="Enter no" value="<?php echo htmlspecialchars($edit ? $artisan['card_no'] : '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>                      
        </div> 
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="inputProjectname">Address<span class="w3-text-red">*</span></label>
                <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?php echo htmlspecialchars($edit ? $artisan['address'] : '', ENT_QUOTES, 'UTF-8'); ?>">                    
            </div>
            <div class="col-sm-6">
            <label for="inputProjectname">District<span class="w3-text-red">*</span></label>
            <?php $opt_arr = array("Kohima", "Dimapur", "Wokha", "Tuensang","Zunheboto", "Longleng", "Peren", "Mokokchung", "Mon", "Peren", "Kiphire", "Phek", "Noklak", "Shamator", "Tsiiminyu", "Niuland", "Chiimoukedima"); ?>
            <select name="district" class="form-control selectpicker" value="<?php echo htmlspecialchars($edit ? $artisan['district'] : '', ENT_QUOTES, 'UTF-8'); ?>">
                <option value=" ">Please select district</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $artisan['district']) {
                        $sel = 'selected';
                    } else {
                        $sel = '';
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }
                ?>
            </select>
            </div>                      
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="inputProjectname">Block/Village<span class="w3-text-red">*</span></label>
                <input type="text" class="form-control" name="block_village" placeholder="Enter block/village" value="<?php echo htmlspecialchars($edit ? $artisan['block_village'] : '', ENT_QUOTES, 'UTF-8'); ?>">                      
            </div>
            <div class="col-sm-6"> 
                <label for="inputProjectname">Pincode<span class="w3-text-red">*</span></label>
                <input type="number" class="form-control" name="pincode" placeholder="Enter pincode" value="<?php echo htmlspecialchars($edit ? $artisan['pincode'] : '', ENT_QUOTES, 'UTF-8'); ?>">                    
            </div>                      
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label for="inputProjectname">Working with any organisation ?</label>
                <input type="text" class="form-control" name="working_organisation" placeholder="Enter organisation" value="<?php echo htmlspecialchars($edit ? $artisan['working_organisation'] : '', ENT_QUOTES, 'UTF-8'); ?>">                    
            </div>
            <div class="col-sm-4"> 
            <label for="inputProjectname">Economic Group<span class="w3-text-red">*</span></label>
            <?php $opt_arr = array("APL", "BPL", "Antyodaya"); ?>
                <select name="economic_group" class="form-control selectpicker" value="<?php echo htmlspecialchars($edit ? $artisan['economic_group'] : '', ENT_QUOTES, 'UTF-8'); ?>">
                    <option value=" ">Select economic group</option>
                    <?php
                    foreach ($opt_arr as $opt) {
                        if ($edit && $opt == $artisan['economic_group']) {
                            $sel = 'selected';
                        } else {
                            $sel = '';
                        }
                        echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                    }
                    ?>
            </select>                        
            </div>    
            <div class="col-sm-4"> 
                <label for="inputProjectname">Do you have bank account?<span class="w3-text-red">*</span></label>
                    <br/>
                    <input type="radio" name="bank_account" value="Yes" <?php echo ($edit && $artisan['bank_account'] =='Yes') ? "checked": "" ; ?>/> Yes &nbsp;&nbsp; 
                    <input type="radio" name="bank_account" value="No" <?php echo ($edit && $artisan['bank_account'] =='No') ? "checked": "" ; ?>/> No                  
                </div>                  
            </div>
            <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Please Select No. of Craft Practices<span class="w3-text-red">*</span></label>
                    <?php $opt_arr = array("Carpet and other floor Covering", "Metal ware", "Wood ware", "Hand Printing","Textiles", "Zari and Zari goods", "Shawl as art ware", "Arts"); ?>
                <!--     <select name="craft_practices" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select craft practices" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true"> -->
                    <select name="craft_practices" class="form-control selectpicker" value="<?php echo htmlspecialchars($edit ? $artisan['craft_practices'] : '', ENT_QUOTES, 'UTF-8'); ?>">
                        <option value=" ">Please select craft practices</option>
                        <?php
                        foreach ($opt_arr as $opt) {
                            if ($edit && $opt == $artisan['craft_practices']) {
                                $sel = 'selected';
                            } else {
                                $sel = '';
                            }
                            echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                        }
                        ?>
                    </select>
                </div>
                </div>
            <div class="col-sm-6"> 
                    <label for="inputProjectname">Education/Qualification<span class="w3-text-red">*</span></label>
                    <?php $opt_arr = array("Below matric", "10th", "12th/diploma", "Graduate", "Post Graduate","Doctorate"); ?>
                    <select name="education_qualification" class="form-control selectpicker" value="education_qualification">
                        <option value=" ">Please select qualification </option>
                        <?php
                        foreach ($opt_arr as $opt) {
                            if ($edit && $opt == $artisan['education_qualification']) {
                                $sel = 'selected';
                            } else {
                                $sel = '';
                            }
                            echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                        }
                        ?>
                    </select>                    
                </div>
            </div> 
            <div class="form-group">
                <label for="exampleInputFile">Select one Training to register</label>
                <select name="training_id" class="form-control selectpicker" required>
                    <option value=" ">Please select training</option>
                    <?php foreach ($selectTraining as $row) {
                    if ($edit && $row['id'] == $artisan['training_id']) {
                            $sel = 'selected';
                        } else {
                            $sel = '';
                        }  
                    echo '<option value="'.$row["id"].'"' . $sel . '>' . $row["training_name"] . '</option>';
                        }
                    ?> 
                </select>  
            </div>
            <div class="form-group">
                <label for="inputProjectname">Batch No:<span class="w3-text-red">*</span></label>
                <select name="batch_id" class="form-control selectpicker" required>
                    <option value=" ">Please select batch</option> 
                     <?php
                        foreach ($selectBatch as $row) {
                            if ($edit && $row['batch_id'] == $artisan['batch_id']) {
                                $sel = 'selected';
                            } else {
                                $sel = '';
                            }
                            echo '<option value="'.$row['batch_id'].'"' . $sel . '>' . $row['batch_id'] . '</option>';
                        }
                        ?>
                </select>
            </div>  
        <div class="form-group">
            <label for="exampleInputFile">Upload ID Proof</label>
            <div class="input-group">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="id_proof" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <!--  <div class="input-group-append">
                <span class="input-group-text">Upload</span>
                </div> -->
            </div>
        </div>
        <?php 
            if(!empty($edit)){ $i=0;           
                    $imageURL = '../assets/imgUploads/id_proof/'.$artisan["id_proof"];                                                   
        ?>
        <ul>                  
            <li>
                <?php if($artisan["id_proof"]!==NULL)  {   echo' 
                <img src="'.$imageURL.'" style="width: 18%; height: 20%;" /> '  ?><?php } ?>
            </li>
        </ul>
        <?php } ?>
        <div class="form-group">
            <label for="exampleInputFile">Upload Passport Photo</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="passport_photo" >
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div> 
            </div>
        </div>
        <?php 
            if(!empty($edit)){ $i=0;           
                    $imageURLTwo = '../assets/imgUploads/passport_photo/'.$artisan["passport_photo"];                                                   
        ?>
        <ul>                  
            <li>
                <?php if($artisan["passport_photo"]!==NULL)  {   echo' 
                <img src="'.$imageURLTwo.'" style="width: 18%; height: 20%;" /> '  ?><?php } ?>
            </li>
        </ul>
        <?php } ?>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="agree" value="agree" <?php echo ($edit && $artisan['agree'] =='agree') ? "checked": "" ; ?>>
        <label class="form-check-label" for="exampleCheck1">I certify that the particulars furnished above are true and correct to the best of my knowledge and belief</label>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit<i class="glyphicon glyphicon-send"></i></button>
    </div>