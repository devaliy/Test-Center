<?php
include_once('../config/init.php');

if(!isset($_SESSION['student_num'])){

 //header("Location: login");

}else{
  
$exam_id = $_GET['cbt'];

$exam_det = $getFromGeneric->get_single('student_test_re', array('id'=>$exam_id), 'id', 'desc');
//var_dump($exam_det);
$student_id = $exam_det->student_id;
$exam_id = $exam_det->id;
//var_dump($exam_det);
    //Students Details Codes
    $regnum = $_SESSION["student_num"]->id;
    //echo $regnum;

}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
<base href="<?=BASE_URL?>student/">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Test Center | CBT Home</title>

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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  
    
   <!-- TimeCircles style -->
   <link rel="stylesheet" href="../assets/dist/css/TimeCircles.css">
   

  
  <style>
   subNav a{
      text-decoration: none;
      color: red;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">


                        <div class="navbar navbar-expand-sm navbar-main pl-md-0 pr-0" id="navbar" data-primary>
                            <div class="container-fluid">
                            <div class="row col-md-2  " id="final_submit">
                                 

                                 <button class="btn btn-outline-danger btn-lg">
                                   Final Submission
                                 </button>
                             </div>


                            <h2 class="mb-0 text-warning text-center"><?=$getFromGeneric->get_single('subject', array('id'=>$exam_det->subject_id), 'id', 'asc')->name;?> </h2>
                          

                                <!-- Navbar toggler -->
                              




                              

                                <ul class="nav navbar-nav d-none d-md-flex menu-right">
                                <div class="  col-md-8 col-sm-8 col-xs-8 offset-4" id="exam_timer" data-timer="<?php

                                $minute = $exam_det->duration;
                                 echo $minute * 60;
                                ?>" style="width: 350px;"></div>
                       
                                   
                                   
                                </ul>

                                

                            </div>
                        </div>

                    </div>
                </div>

                <!-- // END Header -->

  <!-- Main content -->
  <section class="content">
      <div class="container">
        <div class="row">
                      <!-- <div id="cbt_side" class="col-md-4 ">


                         <div  class="card card_over_flow">
                          <div  class="card-header">
                          <h4>Navigation Bar</h4>

                          </div> 

                        <div  class="card-body">
                          <div class="" id ="nav_bar">                                 

                          </div>



                          
                        </div>




                        
                            
                          
                        </div> 
                            
                        </div>-->

                            <div id="cbt_menu" class="col-md-10">
                            <div  class="card">
                            <div id="cbt_header" class="card-header">

                            </div> 
                            
                            <div id="cbt_body" class="card-body">
      
     

                               
                            </div>


                                    <div class="card-footer">
                                        <a  id="previous" class="btn btn-outline-warning float-left text-warning">Previous</a>
                                        <a  id="next" class="btn btn-outline-success float-right text-success">Next</a>
                                    </div>
                                </div>     
                              

                                  
                            </div>

                          
                          
                    </div>





                    
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>





  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- To the right -->
   
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022  <a href="https://chroniclesoft.com">Chroniclesoft SDC</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->

<!-- SweetAlert2 -->
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets/plugins/toastr/toastr.min.js"></script>

<!-- TimeCircles -->
<script src="../assets/dist/js/TimeCircles.js"></script>






<script>

  

// Final Submision

$(document).ready(function(){
            $('#final_submit').click(function(event){
                event.preventDefault();

                var conf = confirm('Are Sure you want to Submit Your Exam Finally  !!!');
                if(conf == true){
                    window.location = '<?=BASE_URL?>student/student';
                  //  window.open('student/quiz_menu/','_self');
                   


                }else{
                return false;
                }

            }); 
        });





// Exam Timer

$('#exam_timer').TimeCircles({
  time: {
    Days:{
      show:false
    }
   
  }
});

setInterval(function(){
var remaining_second = $('#exam_timer').TimeCircles().getTime();
  
   if(remaining_second < 1){
   window.open('student/test','_self');

  }
}, 1000); 




//Submit Options 

$(document).ready(function(){

$(document).on('click', '.answer_opt', function(){
  //event.preventDefault();

    var option_id =  $(this).attr('my_id');
    var question_id =  $(this).attr('my_question');
    var exam_id = <?=$exam_id;?>;
     var student_id = <?=$student_id;?>;
   
   // alert(question_id);

        $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ exam_id : exam_id,  student_id : student_id,  option_id : option_id, question_id : question_id },
        dataType:"json",

        })
        .done(function(data) {
       // $('#cbt_header').html(data.htmlh);
       

                
        })
        .fail(function(errorData) {
            console.log(errorData+'Failed Contact Administrator' );
        })


            
  }); 
  
  });

$(document).ready(function(){
   $('#previous').hide();
  // $('#final_submit').hide();




   var exam_id = <?=$exam_id;?>;
    var student_id = <?=$student_id;?>;
    var types = 'first';
    
    //alert(exam_id);
            $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, student_id : student_id,  types : types },
        dataType:"json",

        })
        .done(function(data) {
        alert( "second success" );
          console.log(data);
          $('#cbt_header').html(data.htmlh);
          $('#cbt_body').html(data.htmlb);
          $('#nav_bar').html(data.nav_html);
          $('#next').val(data.current);
          $('#previous').val(data.current);



                
        })
        .fail(function(errorData) {
         // alert( "second Error" );
      
            console.log(errorData+'Failed Contact Administrator' );
        })

  
    
});




//Navigation Plane


$(document).ready(function(){
  
  $(document).on('click', '.nav_plane', function(event){
    event.preventDefault();
    var exam_id = <?=$exam_id;?>;
    var student_id = <?=$student_id;?>;
    var question_id =  $(this).attr('my_question');
  //  alert(question_id);
    var types = 'nav';
    
            $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ question_id : question_id, exam_id : exam_id, student_id : student_id,  types : types },
        dataType:"json",

        })
        .done(function(data) {
        //  alert( "second success" );
        // console.log(data);
        $('#cbt_header').html(data.htmlh);
        $('#cbt_body').html(data.htmlb);
        
        $('#nav_bar').html(data.nav_html);
        $('#next').val(data.current);
        $('#previous').val(data.current);

                
        })
        .fail(function(errorData) {
            console.log(errorData+'Failed Contact Administrator' );
        })






    }); 
});


//NAvigation Plane


$(document).ready(function(){
  
  $(document).on('click', '.nav_plane_btn', function(event){
    event.preventDefault();
    var exam_id = <?=$exam_id;?>;
    var student_id = <?=$student_id;?>;
    var question_id =  $(this).attr('my_question');
  //  alert(question_id);
    var types = 'nav';
    
            $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ question_id : question_id, exam_id : exam_id, student_id : student_id,  types : types },
        dataType:"json",

        })
        .done(function(data) {
        //  alert( "second success" );
        // console.log(data);
        $('#cbt_header').html(data.htmlh);
        $('#cbt_body').html(data.htmlb);
        
        $('#nav_bar').html(data.nav_html);
        $('#next').val(data.current);
        $('#previous').val(data.current);

                
        })
        .fail(function(errorData) {
            console.log(errorData+'Failed Contact Administrator' );
        })






    }); 
});







//Next Button


$(document).ready(function(){
  $('#next').click(function(){
    $('#previous').show();
   


    var exam_id = <?=$exam_id;?>;
    var student_id = <?=$student_id;?>;
    var next =  $('#next').val();
    var number_of_q = '<?=$exam_det->question_no;?>';
    var vali = number_of_q - 1;
    //alert(next);
  //  alert(vali);
   
    var types = 'next';
    //alert(next);
    //if(next != vali){
    $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, student_id : student_id,  types : types, current : next },
        dataType:"json",

        })
        .done(function(data) {
     //  alert( next );
         // console.log(data);
         if(data.success == true){
              // alert(data.success);
          $('#cbt_header').html(data.htmlh);
          $('#cbt_body').html(data.htmlb);
          
          $('#nav_bar').html(data.nav_html);
          $('#next').val(data.current);
          $('#previous').val(data.current);
          $('#numbering_id').val(data.next);

         }
                
        })
        .fail(function(errorData) {
            $('#next').hide();
            $('#final_submit').show();
            console.log(errorData+'Failed Contact Administrator' );
        })

  
  
    }); 
});





//Previous Button


$(document).ready(function(){
  $('#previous').click(function(){
    $('#next').show();


    var exam_id = <?=$exam_id;?>;
    var student_id = <?=$student_id;?>;
    var previous =  $('#previous').val();
    var types = 'previous';
   // alert(previous);
    
            $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, student_id : student_id,  types : types, current : previous },
        dataType:"json",

        })
        .done(function(data) {
        //  alert( "second success" );
         // console.log(data);
          $('#cbt_header').html(data.htmlh);
          $('#cbt_body').html(data.htmlb);
          $('#nav_bar').html(data.nav_html);
          $('#next').val(data.current);
          $('#previous').val(data.current);

                
        })
        .fail(function(errorData) {
            $('#previous').hide();
            console.log(errorData+'Failed Contact Administrator' );
        })

  



  
    }); 
});

mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

$(document).ready(function(){
  $('#nav_plane_btn').click(function(){
   
  }); 
});

function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}



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

           