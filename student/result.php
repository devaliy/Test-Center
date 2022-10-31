
 <?php
 
 require_once('includes/header.php');
 
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Results Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
              <li class="breadcrumb-item active">Result Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    


    <!-- Main content -->
    <section class="content subject">
      <div class="container sub-container">
      

<div class="row">
    
  <?php 
  
$hel = $_SESSION['student_num']->id;
//$stdTest = $getFromGeneric->get_multi('student_test_re', array('student_id'=>$_SESSION['student_num']->id), 'id', 'desc'); 
$stdTest = $getFromGeneric->get_multi('student_test_re', array('student_id'=>$hel), 'id', 'desc'); 
//var_dump($stdTest); 
foreach($stdTest as $test):

      $schedule_id = $test->schedule_id;
        $subject_id = $test->subject_id;

       $schedule_details = $getFromGeneric->get_single('schedule_final', array('id'=>$schedule_id), 'id', 'desc');
        $subject_details = $getFromGeneric->get_single('subject', array('id'=>$subject_id), 'id', 'desc'); 
  
  ?>
  
  <div class="col-md-4 subject-result">
    <!-- <span class="otisumi"> -->
  <!-- <span data-toggle="modal" data-target="#modal-lg"> -->
  <span data-modal-target="#modal">
      <!-- <button data-modal-target="#modal"> -->
      <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header">
          <center>
            <h3 class="widget-user-username text-white">
              <?php
              $get = $getFromGeneric->get_single('subject', array('id'=>$subject_id), 'id', 'desc' );
              echo @$get->name;
              ?></h3>
            <h5 class="widget-user-desc text-white">
              <?php
                $gets = $getFromGeneric->get_single('schedule_test', array('id'=>$schedule_id), 'id', 'desc' );
                // var_dump($gets);
                $dow = @$gets->test;
                $getsd = @$getFromGeneric->get_single('test', array('id'=>$dow), 'id', 'desc' );
                echo @$getsd->test_name;
                ?>
            </h5>
          </center>
        </div>
        <!-- End bg color -->
        
        <!-- Card Footer Start -->
        <div class="card-footer">
          <div class="row">

            <div class="col-sm-6 border-right">
              <div class="description-block">
                <h5 class="description-header">
                  <?php
                    echo @$gets->session_id;
                    $getsdt = @$getFromGeneric->get_single('session', array('id'=>$gets->session_id), 'id', 'desc' );
                    echo @$getsdt->name;
                  ?>
                </h5>
                <span class="description-text">Session</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->

            <div class="col-sm-6 border-right">
              <div class="description-block">
                <h5 class="description-header">
                  <?php
                  $kow = @$getFromGeneric->get_single('term', array('id'=>$gets->term_id), 'id', 'desc' );
                  echo @$kow->name;
                  ?>
                </h5>
                <span class="description-text">Term</span>
              </div>
              <!-- /.description-block -->
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- Card Footer End -->

      </div>
      <!-- /.widget-user -->
    
  </span>
</div>

    <!-- <div class="quiz-over">
      <div class="box">
        <h1>Time Up: <h1 class="setTime">10</h1>
      <h1>
        <span class="comment">Good try!!!</span>  <br />
        You got <span class="correct-answers">3</span> out of <span class="total-question2">5</span> questions <br />
        That's <span class="percentage">60%</span>
      </h1>
      <button type="button" id="tryAgain" onclick="tryAgain()">Try Again Later</button>
      </div>
    </div> -->

      <!-- <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div> -->
      <!-- /.modal -->

      <div class="modal card card-primary card-outline" id="modal">
        <div class="modal-header">
          <div class="title card-title">Modal Header</div>
          <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body card-body card-text">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt nisi veniam, quo, magnam id autem eos quisquam ducimus itaque voluptates vel odio aperiam doloremque cupiditate in aliquid! Reprehenderit aliquam eaque optio consequatur facilis, nobis quibusdam itaque inventore minus voluptate dignissimos temporibus error magni ut atque incidunt voluptas. Quis unde libero architecto magni eum. Natus, asperiores, fuga dignissimos, ab incidunt iure laboriosam fugit ut cum accusantium dolorem tempore non adipisci optio. Qui eius quis voluptatum veritatis, facere aut dolores deserunt modi?
        </div>
      </div>
      <div id="overlay"></div>

      <?php endforeach;?>
     
        </div>
      </div>
    </section>
  </div>


<?php include('includes/footer.php');



if(isset($_POST['start'])){

  $test_id = $_POST['test_id'];
 $ques_no = $_POST['question'];
 $_SESSION['quesnum'] = $ques_no;
 //$ques_no =  2;
  $subject_id = $_POST['subject_id'];
  $duration = $_POST['duration'];
  //$duration = 3600;
  $test_schedule_id = $_POST['test_schedule_id'];
  $exam_secs = $duration * 60;
  $_SESSION['exam_secs'] = $exam_secs;
  $student_id = $_SESSION['student_num'];

  $insert = $getFromGeneric->create('cbt_table',  array('student_id'=>$student_id,'test_id'=>$test_id, 'no_of_question'=>$ques_no, 'subject_id'=>$subject_id, 'duration'=>$duration, 'test_schedule_id'=>$test_schedule_id));
    if($insert){
      $cbt_table_id = $insert;
      $questns = $getFromGeneric->get_questions($subject_id, $ques_no);
      $num = 0;
      //var_dump($questns);
      foreach($questns as $singles){
        $num +=1;
        $question_id = $singles->id;
        $getFromGeneric->create('cbt_table_quest',  array('numbering'=>$num,'cbt_table_id'=>$cbt_table_id,'question_id'=>$question_id));
        
      }

    echo "<script>document.location='cbt/".$cbt_table_id."'</script>";  
    
  }

}

?>
