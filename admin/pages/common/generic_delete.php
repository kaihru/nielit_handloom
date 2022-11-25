<?php 
require_once '../../config/config.php';
if(($_POST['action_type'] == 'artisan_delete') && !empty($_POST['id'])){  
    echo $_POST['id'];
    $db = getDbInstance();
    // Previous image data  
    $db->where('id', $_POST['id']); 
    $stat = $db->delete('artisan_reg_tbl');
 
    if($stat){  
        $_SESSION['info'] = "Artisan deleted successfully!";
        $status = 'ok'; 
    }else{ 
        $status  = 'err'; 
    } 
    echo $status;die; 
  
} 
if(($_POST['action_type'] == 'training_delete') && !empty($_POST['id'])){  
    echo $_POST['id'];
    $db = getDbInstance();
    // Previous image data  
    $db->where('id', $_POST['id']); 
    $stat = $db->delete('training_tbl');
 
    if($stat){  
        $_SESSION['info'] = "Training deleted successfully!";
        $status = 'ok'; 
    }else{ 
        $status  = 'err'; 
    } 
    echo $status;die; 
  
} 
if(($_POST['action_type'] == 'venue_delete') && !empty($_POST['id'])){  
    echo $_POST['id'];
    $db = getDbInstance();
    // Previous image data  
    $db->where('id', $_POST['id']); 
    $stat = $db->delete('venue_tbl');
 
    if($stat){  
        $_SESSION['info'] = "Venue deleted successfully!";
        $status = 'ok'; 
    }else{ 
        $status  = 'err'; 
    } 
    echo $status;die; 
  
}
if(($_POST['action_type'] == 'batch_delete') && !empty($_POST['id'])){  
    echo $_POST['id'];
    $db = getDbInstance();
    // Previous image data  
    $db->where('id', $_POST['id']); 
    $stat = $db->delete('batch_tbl');
 
    if($stat){  
        $_SESSION['info'] = "Batch deleted successfully!";
        $status = 'ok'; 
    }else{ 
        $status  = 'err'; 
    } 
    echo $status;die; 
  
}
 


 