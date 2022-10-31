
  
  <?php
   require_once('../config/init.php');

 require_once('includes/header.php');
 
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Test Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
              <li class="breadcrumb-item active">Test Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
      
<div class="row">
    
  <?php 
  
$stdTest = $getFromGeneric->get_multi('schedule_test', array('classroom_id'=>1, 'term_id'=>35,'session_id'=>2020), 'id', 'desc'); 

//$stdTest = $getFromGeneric->get_multi('schedule_test', array('class'=>$_SESSION['student_num']->cur_arm, 'term_id'=>$_SESSION['term_id'],'session_id'=>$_SESSION['session_id']), 'id', 'desc');
//var_dump($stdTest);
     // echo $_SESSION['cur_classroom'], $_SESSION['term_id'] $_SESSION['session_id'];
      foreach($stdTest as $test):

        $test_id = $test->test;
        $staff_id = $test->staff_id;
        $subject_id = $test->subject_id;

        $test_details = $getFromGeneric->get_single('test', array('id'=>$test_id), 'id', 'desc');
        $test_type = $getFromGeneric->get_single('test_type', array('id'=>$test_id), 'id', 'desc');
        $subject_details = $getFromGeneric->get_single('subject', array('id'=>$subject_id), 'id', 'desc');
        $staff_details = $getFromGeneric->get_single('staff', array('id'=>$staff_id), 'id', 'desc'); 
  
  ?>
   <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
  <form  method="post" action="prep" enctype="multipart/form-data">

  <input type="hidden" name="student_id" value="<?=$student_id;?>">
  <input type="hidden" name="schedule_id" value="<?=$test->id;?>">
  <input type="hidden" name="question_no" value="<?=$test_type->question;?>">
           <div class="card">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="card-header bg-primary">
                
                <!-- /.widget-user-image -->
                <h3 cl ass="widget-user-username"><?=$subject_details->name;?></h3>
                <h5 class="widget-user-desc">Teacher: <?=$staff_details->fname." ".$staff_details->sname;?></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Questions <span class="float-right badge bg-primary"><?=$test_type->question;?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Duration <span class="float-right badge bg-info"><?=$test_type->duration;?>mins</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Start Date <span class="float-right badge bg-success"><?=$test->starting_date;?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      End Date <span class="float-right badge bg-danger"><?=$test->ending_date;?></span>
                    </a>
                  </li>
                 
                  <input type="submit" name="start_student_exam" class="btn btn-primary text-white fa fa-arrow-right" value="Start Test">
                 
                  
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
            </form>
          </div>
          <!-- /.col -->
      <?php endforeach;?>
     
        </div>
      </div>
    </section>
  </div>

<?php

include('includes/footer.php');

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
