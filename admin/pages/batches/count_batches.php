<?php 
require_once '../../config/config.php'; 
if(isset($_POST['hps_level'])){
    $training_id = $_POST['hps_level'];
    $db = getDbInstance(); 
    $db->where('training_id', $training_id);
    $numdb = $db->getValue ("batch_tbl", "count(*)");
    echo $numdb;
}
?>