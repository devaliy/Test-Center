<?php
 

include_once('../config/init.php');

if(!isset($_SESSION['student_num'])){

 header("Location: ../login");

}else{
    $regnum = $_SESSION["student_num"];
    $student_id = $_SESSION["student_num"]->id;
   
   
}

        $randImages = rand(1, 4);
      //  $stdTest = $getFromGeneric->get_rand_images($randImages);
     
?>

<!DOCTYPE html>

<html lang="en">
<head>
<base href="<?=BASE_URL?>student/">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Test Center | Student Home</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
 
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
   <!-- My Style -->
   <link rel="stylesheet" href="../assets/dist/css/mystyle.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  
  <style>
   subNav a{
      text-decoration: none;
      color: red;
    }
    .mydrop {
      display: absolute;
      min-width: 180px;
    }
    .mydrop li a {
      text-decoration: none;
      color: white;
      /* background-color: #84DE37; */
      font-size: 18px;
      /* padding: 8px 2px; */
      display: none;
    }
    .mydrop:hover ul li a {
      display: block;
    }
  </style>
  <script>
    $(`.exam`).change(function(){
    alert('scdjsdj');
  });
  </script>

<script src="//code.jivosite.com/widget/XD9DVM8a1j" async></script>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light">
    <div class="container">
      <a href="<?=BASE_URL?>student/student" class="navbar-brand">
       <img src="https://ekosuccesscloud.com/learn/web/css/themes/chamilo/images/header-logo.png" alt="Test Center Logo" class="brand-image  elevation-0">
          </a>
       <!-- Left navbar links
    <ul class="navbar-nav">
           <li class="nav-item d-none d-sm-inline-block">
        <a href="../assets/dashboard" class=" nav-link"  style="color: white;">Admin Portal</a>
      </li>
    
    </ul>
    -->
   
     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments" style="color: white;"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"  style="color: white;"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
      
      </li> -->
      <!-- Student Image -->
      <li class="nav-item dropdown mydrop">
      <a href="<?=BASE_URL?>student/student" class="navbar-brand">
       <img src="https://ekosuccesscloud.com/learn/web/css/themes/chamilo/images/header-logo.png" alt="Test Center Logo" class="brand-image  elevation-0">
          </a>
        <!-- <ul>
          <li><a href="includes/logout.php">Logout</a></li>
        </ul> -->
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->
  <nav class="navbar navbar-expand-md ">
    <div class="container">
    
    <ul class="navbar-nav" >
    <li ><a href="student" style="text-decoration: none; color: black; font-size: 18px; margin: 20px;"> <i class="fa fa-laptop"></i> Dashboard</a></li>

<li ><a href="test" style="text-decoration: none; color: 
      <?php 
      if(@$active != ''){
        echo @$active;
      }else{
        echo 'black';
      }
      
      
      ?>; font-size: 18px; margin: 20px;"> <i class="fa fa-laptop"></i> All Tests</a></li>

      <li><a href="result" style="text-decoration: none; color: 
      <?php 
      if(@$active != ''){
        echo @$active;
      }else{
        echo 'black';
      }
      ?>; font-size: 18px;  margin: 20px;"> <i class="far fa-list-alt"></i> All Result</a></li>

        </ul>   
       
    
    </div>

  </nav>
