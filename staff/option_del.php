<?php
$id = $_GET['id'];

include('../config/init.php');


$del = $getFromGeneric->delete('questions', array('id'=>$id));
if($del){
    echo '<script>alert("Question Deleted Successfully")</script>';
    echo '<script>window.location.assign("upload?id='.$_GET['back'].'")</script>';
    
}


?>