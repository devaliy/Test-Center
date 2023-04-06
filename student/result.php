
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Score List Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Test Name</th>
                    <th>Subject</th>
                    <th>No. of Test Taking</th>
                    <th>Average Score</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sn = 0;
                    $total_question = 0;
                    $total_round = 0;
                    $mark = 0;
                   
                      $exams = $getFromGeneric->get_test_score($student_id);
                      foreach($exams as $exam):
                        $get_exam = $getFromGeneric->get_single('test', array('id'=>$exam->exam_id), 'id', 'desc');
                        $total_round = $getFromGeneric->get_count('student_exam_re', array('exam_id'=>$exam->exam_id, 'student_id'=>$student_id), 'id', 'desc');
                        $total_question = $getFromGeneric->get_count('questions', array('test_id'=>$exam->exam_id), 'id', 'desc');
                        $get_subject = $getFromGeneric->get_single('course', array('id'=>$get_exam->subject_id), 'id', 'desc');
                          $sn +=1;

                          $get_score = $getFromGeneric->get_multi('marking_up', array('test_id'=>$exam->exam_id, 'student_id'=>$student_id), 'id', 'desc');
                          foreach($get_score as $ind){
                            $mark +=$ind->mark;
                          }
                       
                        @$_score = $mark/($total_question * $total_round);
                        $average_score = $_score * 100
                      

                    ?>
                  <tr>
                    <td><?=$sn;?></td>
                    <td><?=$get_exam->test_name?></td>
                    <td><?=$get_subject->title?></td>
                    <td> <?=$total_round?></td>
                    <td><?=$average_score?>%</td>
                  </tr>

                  <?php endforeach?>
                 
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S/N</th>
                    <th>Test Name</th>
                    <th>Subject</th>
                    <th>No. of Test Taking</th>
                    <th>Average Score</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    


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
