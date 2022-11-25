<?php
// Load the database configuration file
include_once 'dbConfig.php';

if(isset($_POST['importSubmit'])){
    $training_auto_id = $_POST['training_id'];
    $batch_auto_id = $_POST['batch_id'];
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){ 
                // Get row data
                $full_name   = $line[0];
                $email  = $line[1];
                $date_of_birth  = $line[2];
                $phone_no = $line[3];
                $gender = $line[4];
                $caste = $line[5];
                $id_card_type_no = $line[6];
                $card_no = $line[7];
                $address = $line[8];
                $district = $line[9];
                $block_village = $line[10];
                $pincode = $line[11];
                $working_organisation = $line[12];
                $economic_group = $line[13];
                $bank_account = $line[14];
                $craft_practices = $line[15];
                $education_qualification = $line[16];
                /* $training_id = $line[17];
                $batch_id = $line[18]; */
                $id_proof = $line[18];
                $passport_photo = $line[19];                                
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM artisan_reg_tbl WHERE email = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE artisan_reg_tbl SET full_name = '".$full_name."', email = '".$email."',
                    date_of_birth = '".$date_of_birth."', phone_no = '".$phone_no."',gender = '".$gender."',
                    caste = '".$caste."', id_card_type = '".$id_card_type_no."',card_no = '".$card_no."',
                    address = '".$address."', district = '".$district."',block_village = '".$block_village."',
                    pincode = '".$pincode."', working_organisation = '".$working_organisation."',economic_group = '".$economic_group."',
                    bank_account = '".$bank_account."', craft_practices = '".$craft_practices."',education_qualification = '".$education_qualification."',
                    training_id = '".$training_auto_id."', batch_id = '".$batch_auto_id."',id_proof = '".$id_proof."',
                    passport_photo = '".$passport_photo."', updated_at = NOW() WHERE email = '".$email."'
                    ");
                }else{
                    // Insert member data in the database 
                    $db->query("INSERT INTO artisan_reg_tbl (full_name, email, date_of_birth, phone_no, gender, caste,
                    id_card_type,card_no,address, district,block_village, pincode, working_organisation, economic_group,
                    bank_account, craft_practices, education_qualification, training_id,batch_id,id_proof,passport_photo,
                    created_at) VALUES ('".$full_name."', '".$email."', '".$date_of_birth."',
                    '".$phone_no."','".$gender."','".$caste."','".$id_card_type_no."', '".$card_no."','".$address."',
                    '".$district."','".$block_village."','".$pincode."','".$working_organisation."',
                    '".$economic_group."','".$bank_account."','".$craft_practices."','".$education_qualification."','".$training_auto_id."',
                    '".$batch_auto_id."','".$id_proof."','".$passport_photo."', NOW())");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: view_all_artisans.php".$qstring);
