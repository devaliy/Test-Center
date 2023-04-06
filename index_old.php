<?php
	include_once('config/init.php');


if(isset($_GET['id'])){
	$id = $_GET['id'];

	        $get_cur = $getFromGeneric->get_single('user', array('id'=> $id),'id', 'desc');
       //   var_dump($get_cur); 
          if($get_cur->roles == 'a:0:{}'){
            $_SESSION['id'] = $get_cur->id;
            $_SESSION['school_id'] = @$get_cur->school_id;
            $url = 'student/dashboard';
           
             }else{
              $_SESSION['staff_id'] = $get_cur->id;
              $_SESSION['school_id'] = @$get_cur->school_id;
              $url = 'staff/dashboard';
             
              
             }
          
          
}

?>
<!DOCTYPE html>
<html>
<head>
<base href="<?=BASE_URL?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Test Center | Student Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
 
   <div class="card ">
<div class="card-body text-center">
  <h1>
  <b style="color: red;">Welcome to </b> Test Center
  </h1>
  <p class="id-box-msg">Proceed in to start your session</p>
  <div>
              <button id="proceed" onclick="manage('<?=$url?>')" class="btn btn-primary  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
      </svg>&nbsp;Proceed </button>
</div>

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="assets/plugins/toastr/toastr.min.js"></script>


</body>
</html>

<script>
  function manage(url){
    //alert('ji');
    window.open(url);
  }
</script>
