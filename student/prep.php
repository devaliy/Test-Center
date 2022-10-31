<?php 
require_once('includes/header_.php');
    
//Start Student Exam 
if(isset($_POST['start_student_exam'])){

    $schedule_id = $_POST['schedule_id'];
    $student_id = $_POST['student_id'];
   // echo $student_id;
    $question_no = $_POST['question_no'];
    //echo $question_no;
  
    
    $check = $getFromGeneric->get_single('schedule_test', array('id'=>$schedule_id), 'id', 'desc');
   // var_dump($check);
    $subject_id = $check->subject_id;
    $type_id = $check->test_type;
    
    $checkd = $getFromGeneric->get_single('test_type', array('id'=>1), 'id', 'desc');
    //var_dump($checkd);
    $duration = $checkd->duration;

    $save_re_exam = $getFromGeneric->create('student_test_re', array('duration'=>$duration,'schedule_id'=>$schedule_id, 'student_id'=>$student_id, 'subject_id'=>$subject_id, 'question_no'=>$question_no));

      $exam_id = $save_re_exam;
      
             $exams = $getFromStudent->get_rand_quest($subject_id, $question_no);
            // var_dump($exams);
        $num = 0;
            foreach($exams as $exam ){
                $num +=1;
                $q_id = $exam->id;
                $save_live = $getFromGeneric->create('live_question', array('schedule_id'=>$schedule_id,'numbering'=>$num,'subject_id'=>$subject_id, 'student_id'=>$student_id, 'question_id'=> $q_id, 'exam_id'=>$exam_id));
            
            }

       
  
  }




?>

           <!-- Header Layout Content -->
           <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
      
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
   
    <div class="col-md-2 offset-5">
   
    <a class="btn btn-outline-primary" href="cbt?cbt=<?=$exam_id;?>">Start Exam </a>
    </div>

    </div>

</div>


</div>
<!-- // END header-layout__content -->

