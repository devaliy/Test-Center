<?php
$id = $_GET['id'];

include('../config/init.php');


$del = $getFromGeneric->delete('schedule_test', array('id'=>$id));
if($del){
    echo '<script>alert("Schedule Deleted Successfully")</script>';
    echo '<script>window.location.assign("schedule")</script>';
    
}


?>