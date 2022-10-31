<?php

include_once('../core/init.php');
  if(isset($_POST['start'])){
      $test_id = $_POST['test_id'];
      $ques_no = $_POST['question'];
      $subject_id = $_POST['subject_id'];
      $duration = $_POST['duration'];
      $test_schedule_id = $_POST['test_schedule_id'];
      $exam_secs = $duration * 60;

  }else{
    header('Location: test');
  }

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Smart Tester | Student Home</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
 
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../dist/css/adminlte.min.css">
   <!-- TimeCircles style -->
   <link rel="stylesheet" href="../dist/css/TimeCircles.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  
</head>
<body class=" layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar  navbar-success fixed-top">
    <div class="container">
      <a style="font-size: 50px; color: black">
       <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">-->
           <?php

              $subject_details = $getFromCbt->get_subject($subject_id);
        
             ?>
        <span class="brand-text text-light"><?=$subject_details->name;?> CBT</span>
      </a>

      



        <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      
      <!-- Timer  Menu -->
      <li class="nav-item dropdown">
      <div id="exam_timer" data-timer="<?=$exam_secs;?>" style="max-width: 200px; width:100%; height:80px;" class="float-sm-right">
      </div>
        
      </li>
     
      </ul>
    </div>
   
   
  </nav>
  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper  bg-white " style="margin-top: 150px;">  

    <!-- Main content -->
    <section class="content">
      <div class="container">
      
      <?php 

$questions = $getFromCbt->get_questions($subject_id, $ques_no);
//var_dump($questions);

$sn =0; 
//var_dump($stdTest);
// echo $_SESSION['cur_classroom'], $_SESSION['term_id'] $_SESSION['session_id'];
foreach($questions as $question):
  $sn += 1;
  $passage = @$question->passage_id;
  $question_id = $question->id;
  //$staff_id = $test->staff_id;


?>
         <div class="row">
           <div class="col-md-9 offset-1 col-sm-9 offset-1"  style="margin-bottom: 35px; padding: 10px; border: 1px solid black; border-radius: 5px;">
             <div class="row  post">
                      <div class="col-md-8  text-justify">
                          <p style="font-size:18px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: black;">
                       
                          <b><?=$sn;?>.</b> <?=$question->question;?></p>  
                      </div>                                 

                      <div class="col-md-4  text-center"> 
                         <!-- <img src="../dist/img/photo1.png" class="img-fluid rounded" >-->
                      </div>                                  
                    </div>
                    <div class="row" >
                      
                      <div class="col-md-12">
                          <div class="form-group clearfix text-left choice" style="font-size:20px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: black;">
                         <?php
                          $options = $getFromCbt->get_options($question_id);
                           $sn = 0;
                            foreach($options as $option):
                             // $sn +=1;
                          ?>
                              <div class="icheck-info d-block"  >
                                    <input type="radio" id="radioPrimary<?=$option->id;?>" name="r<?=$option->question_id;?>">
                                    <label for="radioPrimary<?=$option->id;?>"><?=$option->options;?></label>
                                </div>

                            <?php endforeach;?>

                          </div>
                      </div>
                  
            
            
          
            </div>
            <!-- /.nav-tabs-custom -->
            <div class="col-md-2 offset-10">
                <input type="submit" class="btn btn-success" value="Save and Continue">
            </div>
          </div>
          <!-- /.col -->
           
       
        </div>
<?php endforeach; ?>

        

        <div class="row">
            <div class="col-md-2 offset-10">
                <a type="submit" class="btn btn-primary" href="test.php">Submit Test</a>
            </div>
        </div>

        
      </div>
    </section>
  </div>







</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- TimeCircles -->
<script src="../dist/js/TimeCircles.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->

<script type="text/Javascript">
$('#exam_timer').TimeCircles({
  time: {
    Days:{
      show:false
    },
   
  }
});

setInterval(function(){
var remaining_second = $('#exam_timer').TimeCircles().getTime();
  if(remaining_second < 1){
    //alert('Exam time is over');
    //location.reload();
  }
}, 1000); 
</script>




<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>



