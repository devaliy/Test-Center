<?php
	include_once('config/init.php');

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
  <div class="login-logo">
    <img style="height: 100%; width: 85%; margin-bottom: 15px;" src="https://ekosuccesscloud.com/learn/web/css/themes/chamilo/images/header-logo.png">
   </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login" method="post">
        <div class="input-group mb-3">
          <input type="text" name="admission_id" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        </div>
         
        <div class="input-group mb-3">
         <input type="submit" name="login" value="Sign in" class="btn btn-block btn-info">
      
          </div>
          <!-- /.col -->
        </div>
      </form>
      
     
    <!-- /.login-card-body -->
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

<?php

if(isset($_POST['login']) && !empty($_POST['login'])){
	$admission_id = $_POST['admission_id'];
	$password = $_POST['password'];

	if(!empty($admission_id) or !empty($password)){
	
	          $login_det = $getFromAdmin->login('student', array('admission_id' => $admission_id, 'admission_id'=>$password));
            $get_cur = $getFromAdmin->get_single('current', array('id'=> 1),'id', 'desc');
           // var_dump($login_det);
           $_SESSION['student_num'] = $login_det;
           $_SESSION['term_id'] = @$get_cur->term_id;
           $_SESSION['session_id'] = @$session_id;
           if(!$login_det){
                echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    
          Toast.fire({
            type: 'error',
            title: '    Invalid Login Details.'
          })
       
      });
    
    </script>";
              
        //echo "<script>$('#error').click()</script>";
          
			
			}else{
                    echo "<script type='text/javascript'>
                    $(function() {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                        });
                    
                        Toast.fire({
                            type: 'success',
                            title: ' Welcome',
                        })
                    
                    });
                    

                    setInterval(() => {
                      window.open('".BASE_URL."student/student','_self');
                    }, 2000);
              
                    </script>";
            }

		}else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    
          Toast.fire({
            type: 'error',
            title: 'Please Fill Appropriately'
          })
       
      });
    
    </script>";
    }



	}



?>
