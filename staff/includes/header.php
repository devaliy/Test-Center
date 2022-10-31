<?php
   
  if(!isset($_SESSION['staff_id'])){
  //header('Location: BASE_URL'.'dashboard.');
  }else{
  
    $no =  $_SESSION['staff_id'];
     
    $staff = @$getFromGeneric->get_single('user',array('user_id'=>$no), 'user_id', 'desc');
    $school_id = $staff->school_id;
  //  var_dump($staff);
  }
?>

<!DOCTYPE html>

<html lang="en">
<head>
<base href="<?=BASE_URL?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Eko Success Cloud  | Test Center</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
 
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
   <!-- My Style -->
   <link rel="stylesheet" href="assets/dist/css/mystyle.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
  
  <style>
   subNav a{
      text-decoration: none;
      color: red;
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

    /* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 50px;
  height: 50px;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255,255,255,0.5);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 120px;
  height: 120px;
  margin-top: -0.5em;

  border: 15px solid red;
  border-radius: 100%;
  border-bottom-color: transparent;
  -webkit-animation: spinner 1s linear 0s infinite;
  animation: spinner 1s linear 0s infinite;


}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
  </style>

</head>
<body class="hold-transition layout-top-nav bg-white">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md ">
    <div class="container">
   <div class="row">
   <div class="col-md-5 col-sx-12">
  <a href="https://ekodigitalschool.com/learn"> <img src="https://ekosuccesscloud.com/learn/web/css/themes/chamilo/images/header-logo.png" alt="Eko DS Logo"  width="200px" height="70px"   ></a>
</div>

   </div>  
      
       <!-- Left navbar links -->
   
   
    
  </nav>
  


<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" href="learn/index.php">Homepage</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto  text-light">
    <li class="nav-item active">
        <a class="nav-link  text-light" href="learn/user_portal.php?nosession=true">My Courses <span class="sr-only">(current)</span></a>
      </li>
     
   
      <li class="nav-item text-light">
        <a class="nav-link  text-light" href="learn/main/social/home.php">Social Network</a>
      </li>
    
    </ul>
  
  </div>
</nav>

<nav class="navbar navbar-expand-md ">
    <div class="container">
    
    <ul class="navbar-nav" >
    <li ><a href="staff/dashboard" style="text-decoration: none; color: black; font-size: 18px; margin: 20px;"> <i class="fa fa-laptop"></i> Dashboard</a></li>

    <li ><a href="staff/test" style="text-decoration: none; color: black; font-size: 18px; margin: 20px;"> <i class="fa fa-laptop"></i> Manage Test</a></li>

        </ul>   
       
    
    </div>

  </nav>
 


<?php /*
<!DOCTYPE html>

<html lang="en">
<head>
<base href="<?=BASE_URL?>staff/">
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
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light">
    <div class="container">
      <a href="<?=BASE_URL?>staff/dashboard" class="navbar-brand">
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
    <li ><a href="dashboard" style="text-decoration: none; color: black; font-size: 18px; margin: 20px;"> <i class="fa fa-laptop"></i> Dashboard</a></li>

    <li ><a href="test" style="text-decoration: none; color: black; font-size: 18px; margin: 20px;"> <i class="fa fa-laptop"></i> Manage Test</a></li>

<li ><a href="alltest" style="text-decoration: none; font-size: 18px; margin: 20px;"> <i class="fa fa-laptop"></i> All Tests</a></li>

     
        </ul>   
       
    
    </div>

  </nav>
*/?>