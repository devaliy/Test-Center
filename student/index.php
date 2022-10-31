<?php
   require_once('../config/init.php');
   if(!isset( $_SESSION['student_num'])){
     header('Location: ../auth/student/');
   }
  //  var_dump($_SESSION['student_num']);
require_once('../config/init.php');

require_once('includes/header.php');
//require_once('includes/sidebar.php');

require_once('../config/controller/student.php');

require_once('includes/footer.php');

require_once('../config/model.php');





?>