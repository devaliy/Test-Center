<?php
include_once('../config/init.php');

$exam_id = $_GET['test_id'];
$round = $_GET['round'];

$exam_det = $getFromGeneric->get_single('test', array('id'=>$exam_id), 'id', 'desc');
//var_dump($exam_det);
$student_id = $_SESSION["id"];


include_once("includes/header_.php");
?>

<body class="hold-transition layout-top-nav">
  <section class="content">
      <div class="container">
        <div class="row">

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

// Attach an event listener for the beforeunload event
window.addEventListener('beforeunload', (event) => {
  // Cancel the event
  event.preventDefault();
  // Chrome requires returnValue to be set
 
  event.returnValue = '';
  return false;
});



 
$(document).ready(function(){
  $('#submit_conf').click(function(){
    alert('submitted');
    var exam_id = <?=$exam_id;?>;
     var round = <?=$round;?>; 
    window.location.replace('checker?id='+exam_id+'&r='+round,'_self');
 
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
  
     var exam_id = <?=$exam_id;?>;
     var round = <?=$round;?>;    
   if(remaining_second < 1){
    window.open('checker?id='+exam_id+'&r='+round+'+','_self');

  }
}, 1000); 





//Submit Options 

$(document).ready(function(){

  $(document).on('click', '.answer_opt', function(){
    //event.preventDefault();

    var option =  $(this).attr('my_id');
    var question_id =  $(this).attr('my_question');
    var test_id = <?=$exam_id;?>;
    var student_id = <?=$student_id;?>;
    var round = <?=$round;?>;
   
    // alert(option);

        $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data: { test_id : test_id, round : round, student_id : student_id,  option : option, question_id : question_id },
        dataType:"json",

        })
        .done(function(data) {
        //  alert(data.option_id);
            
                
        })
        .fail(function(errorData) {
            console.log('Failed  Administrator' );
        })

        


            
  }); 
  
});

$(document).ready(function(){
   $('#previous').hide();
  // $('#final_submit').hide();



  var exam_id = <?=$exam_id;?>;
    var student_id = <?=$student_id;?>;
    var types = 'first';
    var round = <?=$round?>
    
    //alert(round);
        $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, round : round, student_id : student_id,  types : types },
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
      
            console.log(errorData+'Failed Contact ' );
        })

  
    
});


//Next Button


$(document).ready(function(){
  $('#next').click(function(){
    $('#previous').show();  


    var exam_id = <?=$exam_id;?>;
    var student_id = <?=$student_id;?>;
    var next =  $('#next').val();
    var number_of_q = 10;
    var vali = number_of_q - 1;
    var round = <?=$round?>
    //alert(next);
  //  alert(vali);
   
    var types = 'next';
    //alert(next);
    //if(next != vali){
    $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, student_id : student_id, round : round,  types : types, current : next },
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
    var round = <?=$round?>
   // alert(previous);
    
            $.ajax({

        url:"<?=BASE_URL?>student/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, student_id : student_id,  round : round, types : types, current : previous },
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




  
</script>
</body>
</html>

           