<?php

include_once('../core/init.php');
 /* if(isset($_POST['start'])){
      $test_id = $_POST['test_id'];
      $ques_no = $_POST['question'];
      $subject_id = $_POST['subject_id'];
      $duration = $_POST['duration'];
      $test_schedule_id = $_POST['test_schedule_id'];
      $exam_secs = $duration * 60;

  }else{
    header('Location: test');
  }*/
  if(isset($_GET['cbt'])) {
    $cbt = $_GET['cbt'];
  }

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
<base href="<?=BASE_URL?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Smart Tester | Student Home</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
 
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- TimeCircles style -->
   <link rel="stylesheet" href="dist/css/TimeCircles.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  
</head>
<body class=" layout-top-nav" onload="loadQuestion()">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar  navbar-info fixed-top">
    <div class="container">
      <a style="font-size: 20px; color: white">
       <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">-->
          Smart Tester
      </a>

      



        <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      
      <!-- Timer  Menu -->
      <li class="nav-item dropdown">
     
        
      </li>
     
      </ul>
    </div>
   
   
  </nav>
  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper  bg-white " style="margin-top: 80px;">  
  <?php 

//$questions = $getFromCbt->get_questions_first($subject_id, $ques_no);
//var_dump($questions);
//echo count($questions);

//$qn =$questions[1];
//echo $qn->id;
/*
$sn =0; 

  foreach($questions as $question){
  $sn += 1;
  $passage = @$question->passage_id;
  $question_id = $question->id;
  //$staff_id = $test->staff_id;

  }*/
?>
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
         



          <!-- /.col -->
          <div class="col-md-9 col-sm-12">
         <div class="col-md-3 offset-4"> <button id="start" class="btn btn-success btn-lg center" >Start Test</button></div>
            <div class="card" id="cbtQustion" >

             <!--   <div class="card-header  text-center">
              
                <h4 style=" color: white;"> <?php

//$subject_details = $getFromCbt->get_subject($subject_id);

?>
<span class="brand-text text-light"><?//=$subject_details->name;?> CBT</span></h4>
             
            </div> /.card-header -->
            <div class="card-body">
<div class="row  post">
   <div class="col-md-8  text-justify">
     <p style="font-size:18px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: black;">
    
  
      <b>Question (<span id="numbering"></span>): </b><br><span id="questFile"></span>

      </p>  
   </div>                                 

   <div class="col-md-4  text-center"> 
       <img src="img/session_default.png" class="img-fluid rounded" >
   </div>                                  
 </div>
 <div class="row" >
   
   <div class="col-md-12">
       <div class="form-group clearfix text-left choice" style="font-size:20px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: black;">
       <span id="optFile"></span>
       </div>
   </div>
 </div>
         
</div>

              
            
            
            <div class="card-footer">
         


              <a id="prev"  class="float-left btn btn-primary text-white">Previous</a>
              <a id="next" class="float-right btn btn-success text-white">Next</a>
              <a id="finalsub" class="float-right btn btn-warning text-white btn-xl">Finish Test</a>
                            
            </div>
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
         
         <!-- /.col -->
         <div class="col-md-3 col-sm-12 ">
           <div class="card card-info " id="planeTab">
           
            <div class="row card-header  p-2">                   
              <h5>Exam Period</h5>
                
            </div><!-- /.card-header -->
            <div class="row card-body">
              <div class="  col-md-12 col-sm-12 col-xs-12" id="exam_timer" data-timer="<?=$_SESSION['exam_secs'];?>" style="width: 100%;">
             </div>
            </div>
            
            <div class=" row card-footer bg-info">
           <?php 
          /* $navs = $getFromCbt->get_nav($cbt);
          
           foreach( $navs as $nav):
           
           */?>
            <!-- <div class="col-md-2 col-sm-1 col-xs-1">
               <a id="navigate<?//=$nav->numbering?>" style="margin-top:5px;" value="<?//=$nav->numbering?>" class="btn btn-warning"><?//=$nav->numbering?></a>
             </div>-->
             <?php //endforeach;?>
             
            </div>
           
         
           </div>
           <!-- /.nav-tabs-custom -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


  </div>







</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- TimeCircles -->
<script src="dist/js/TimeCircles.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->

<script type="text/Javascript">
window.onbeforeunload = function(){
 // preventDefault();
 return true;
}

  $(document).ready(function(){
      $('#cbtQustion').hide();
      $('#planeTab').hide();    
      $('#finalsub').hide();    
  })








/*


  function calculacart(){
  

      var q_id = $('#qty').val();
      var opt_id = $('#tamount').val();
      var cost_price = tamount / qtys;

      var mcart = $('#pcarton').html();
       var cartons = $('#psize').html();
       var pid = $('#prod_id').val();



         
          $.ajax({
            url:"ajaxfile.php",
            method:"POST",
            data:{pid:pid, cart_sell:cart_sell},
            dataType:"json",
            success:function(data){
              $('#sellcarton').html(cart_sell);
             }
          })
         
       
         

    
}*/
<script>
  $(document).on('click', '.answer_opt', function(){
    var q_id = $(this).data('');
    var opt = $(this).data('');
  });

</script>


</script>


  <script>

$(document).ready(function(){
  $('#start').click(function(){

  var conf = confirm('Are you ready to take your Test !!');
  if(conf == true){


    var fid = <?=$cbt;?>;
    var sid = <?=$_SESSION['student_num']?>;
    var questnum = <?=$_SESSION['quesnum']?>;
    
        $.ajax({
          url:"student/ajaxFile.php",
          method:"POST",
          data:{fid:fid, sid:sid},
          dataType:"json",
          success:function(data){
            //alert(id);
              //console.log(data);
              $('#questFile').html(data.quest);
              $('#optFile').html(data.opts);
              $('#numbering').html(data.numbering);

              var prev = parseInt(data.numbering) - 1;
              var next =  parseInt(data.numbering) + 1;

              $('#prev').val(prev);
              $('#next').val(next);

            

             
              $('#planeTab').show();     
              $('#cbtQustion').show();
             $('#start').hide();
             $('#prev').hide();
             if( parseInt(data.numbering) >= parseInt(questnum)){
              $('#next').hide();
            } 
            
           }
        })
   
   
   



  }else{
    return false;
  }


  
    }); 
});
</script>




<script>

$(document).ready(function(){
  $('#navigate').click(function(){

    var id = <?=$cbt;?>;
    var sid = <?=$_SESSION['student_num']?>;
    var navigate =  $('#navigate').val();
    var questnum = <?=$_SESSION['quesnum']?>;
    alert(navigate);
    
        $.ajax({
          url:"student/ajaxFile.php",
          method:"POST",
          data:{id:id, sid:sid, navigate:navigate},
          dataType:"json",
          success:function(data){
            alert(id);
              //console.log(data);
              $('#questFile').html(data.quest);
              $('#optFile').html(data.opts);
              $('#numbering').html(data.numbering);

              var prev = parseInt(data.numbering) - 1;
              var next =  parseInt(data.numbering) + 1;

              $('#prev').val(prev);
              $('#next').val(next);

            

             
              $('#planeTab').show();     
              $('#cbtQustion').show();
               $('#prev').show();
             $('#start').hide();
            
            if( parseInt(data.numbering) >= questnum){
              $('#next').hide();
              $('#finalsub').show();
            }elseif( questnum <= parseInt(data.numbering)){
              $('#prev').hide();
            }
            
           }
        })
   
   
  


  
    }); 
});
</script>



<script>

$(document).ready(function(){
  $('#next').click(function(){

    var id = <?=$cbt;?>;
    var sid = <?=$_SESSION['student_num']?>;
    var next =  $('#next').val();
    var questnum = <?=$_SESSION['quesnum']?>;
    // alert(next);
    
        $.ajax({
          url:"student/ajaxFile.php",
          method:"POST",
          data:{id:id, sid:sid, next:next},
          dataType:"json",
          success:function(data){
            //alert(id);
              //console.log(data);
              $('#questFile').html(data.quest);
              $('#optFile').html(data.opts);
              $('#numbering').html(data.numbering);

              var prev = parseInt(data.numbering) - 1;
              var next =  parseInt(data.numbering) + 1;

              $('#prev').val(prev);
              $('#next').val(next);

            

             
              $('#planeTab').show();     
              $('#cbtQustion').show();
               $('#prev').show();
             $('#start').hide();
            
            if( parseInt(data.numbering) >= questnum){
              $('#next').hide();
              $('#finalsub').show();
            } 
            
           }
        })
   
   
  


  
    }); 
});
</script>


<script>

$(document).ready(function(){
  $('#prev').click(function(){

    var id = <?=$cbt;?>;
    var sid = <?=$_SESSION['student_num']?>;
    var prev =  $('#prev').val();
    var questnum = <?=$_SESSION['quesnum']?>;
    // alert(next);
    
        $.ajax({
          url:"student/ajaxFile.php",
          method:"POST",
          data:{id:id, sid:sid, prev:prev},
          dataType:"json",
          success:function(data){
            //alert(id);
              //console.log(data);
              $('#questFile').html(data.quest);
              $('#optFile').html(data.opts);
              $('#numbering').html(data.numbering);

              var prev = parseInt(data.numbering) - 1;
              var next =  parseInt(data.numbering) + 1;

              $('#prev').val(prev);
              $('#next').val(next);

            

             
              $('#planeTab').show();     
              $('#cbtQustion').show();
               $('#next').show();
             $('#start').hide();
            
            if( questnum <= parseInt(data.numbering) ){
              $('#prev').hide();
            } 
            
           }
        })
   
   
  


  
    }); 
});
</script>










</script>


<script type="text/Javascript">
$('#exam_timer').TimeCircles({
  time: {
    Days:{
      show:false
    }
   
  }
});

setInterval(function(){
var remaining_second = $('#exam_timer').TimeCircles().getTime();
  if(remaining_second <= 0){
    alert('Exam time is over');
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



