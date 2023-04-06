<?php 
session_start();
require_once('includes/header.php');
    
//Start Student Exam 
if(isset($_GET['id'])){
    
    $test_id = $_GET['id'];
    $school_id = $_SESSION["school_id"];
    $student_id = $_SESSION["id"];

}

  
    
        $check = $getFromGeneric->get_single('test' , array('id'=>$test_id), 'id', 'desc');
       // var_dump($check);
        $subject_id = $check->subject_id;
//     $type_id = $check->test_type;
    
        $checkd = $getFromGeneric->get_count('questions', array('test_id'=>$test_id), 'id', 'desc');
        
        echo '<script>alert('.$checkd.')</script>';
        // $count = 0;
        // foreach($checkd as $cot){
        //     $count +=1;
        // }
//     //var_dump($checkd);

        $duration = $check->time;

        
        $rount = $getFromGeneric->get_count('student_exam_re', array('exam_id'=>$test_id,'student_id'=>$student_id), 'id', 'desc');
        $rountd = $rount + 1;

        $save_re_exam = $getFromGeneric->create('student_exam_re', array('round'=>$rountd,'exam_id'=>$test_id,'duration'=>$duration, 'student_id'=>$student_id));

        // $cout = 0;
        // foreach($rountd as $cot){
        //     $cout +=1;
        // }

//            $exam_id = $save_re_exam;
              $question_no = $checkd;
            //  echo $test_id;
           
              $exams = $getFromExam->get_rand_quest($test_id, $question_no);
           //  var_dump($exams);
        $num = 0;
        // $round = $getFromGeneric->get_single('live_question', array('student_id'=>$student_id,'test_id'=>$test_id, ), 'id', 'desc')->round;
        // $rounds = $round + 1;
      
      
        var_dump($exams);
            foreach($exams as $exam ){
                $num +=1;
                $q_id = $exam->id;
               // $aa = array('numbering'=>$num, 'student_id'=>$student_id, 'question_id'=> $q_id,'round'=>$rountd, 'test_id'=>$check->id);
               // $save_live = $getFromGeneric->create('live_question', array('numbering'=>$num, 'student_id'=>$student_id, 'question_id'=> $q_id,'round'=>$rountd, 'test_id'=>$check->id));
            
    
               
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
   
    <a class="btn btn-outline-primary" href="student/cbt?test_id=<?=$test_id;?>&round=<?=$rountd?>">Start Exam </a>
    </div>

    </div>

</div>


</div>
<!-- // END header-layout__content -->

<?php 
// require_once('includes/header_.php');
    
// //Start Student Exam 
// if(isset($_GET['id'])){

//     $schedule_id = $_POST['schedule_id'];
//     $student_id = $_SESSION['student_id'];
//    // echo $student_id;
//     $question_no = $_POST['question_no'];
//     //echo $question_no;
  
    
//     $check = $getFromGeneric->get_single('schedule_test', array('id'=>$schedule_id), 'id', 'desc');
//    // var_dump($check);
//     $subject_id = $check->subject_id;
//     $type_id = $check->test_type;
    
//     $checkd = $getFromGeneric->get_single('test_type', array('id'=>1), 'id', 'desc');
//     //var_dump($checkd);
//     $duration = $checkd->duration;

//     $save_re_exam = $getFromGeneric->create('student_test_re', array('duration'=>$duration,'schedule_id'=>$schedule_id, 'student_id'=>$student_id, 'subject_id'=>$subject_id, 'question_no'=>$question_no));

//       $exam_id = $save_re_exam;
      
//              $exams = $getFromExam->get_rand_quest($subject_id, $question_no);
//             // var_dump($exams);
//         $num = 0;
//             foreach($exams as $exam ){
//                 $num +=1;
//                 $q_id = $exam->id;
//                 $save_live = $getFromGeneric->create('live_question', array('schedule_id'=>$schedule_id,'numbering'=>$num,'subject_id'=>$subject_id, 'student_id'=>$student_id, 'question_id'=> $q_id, 'exam_id'=>$exam_id));
            
//             }

       
  
//   }




?>