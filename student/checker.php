<?php
 
    require_once('includes/header.php');
    $no = 1;
    
    //$student = @$getFromGeneric->update('course_rel_user','id', 4624626, array('c_id'=>154));
   
    $student = @$getFromGeneric->get_single('user', array('id'=>$student_id), 'id', 'asc');
    //echo $no;
    $round = $_GET['r'];
    $exam_id = $_GET['id'];

    $get_review = $getFromGeneric->get_multi('marking_up', array('test_id'=>$exam_id, 'round'=>$round), 'id', 'asc');
    $total = $getFromGeneric->get_count('questions', array('test_id'=>$exam_id), 'id', 'asc');
    $correct = 0;
    $wrong = 0;
    foreach($get_review as $review){
      //$total =$review->questio;
      $correct += $review->mark;
     
    }
?>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Test Result</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Result</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
           
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-user" class="text-warning"></i> <?php echo $student->firstname.' ' .$student->lastname?>.
                    <small class="float-right">Date: <?=date("l jS \of F Y ");?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <h2>Score: <span class="text-primary"><?=number_format(@($correct/$total)*100, 2);?>%</span></h2>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <h4>Correctly answers: <span class="text-success"><?=@$correct;?></span></h4>
                </div>
                 
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <h4>Wrong Answers: <span class="text-danger"><?=@$total-$correct;?></span></h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Question</th>
                      <th>Selected Option</th>
                      <th>Correct Option</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sn = 0;
                     /// var_dump($get_review);
                        foreach($get_review as $reviews):
                          $sn+=1;

                          $init = $getFromGeneric->get_single('options', array('question_id'=>$reviews->question_id, 'is_correct'=>'1'), 'id', 'asc');
   
                      ?>
                    <tr>
                      <td><?=$sn?></td>
                      <td><?=$getFromGeneric->get_single('questions', array('id'=>$reviews->question_id), 'id', 'asc')->question;?></td>
                      <td><?=$getFromGeneric->get_single('options', array('id'=>$reviews->option_id), 'id', 'asc')->options;?></td>
                      <td><?=$init->options;?></td>
                    </tr>
                  <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
 
 require_once('includes/footer.php');
 $no = 1;
 
 //$student = @$getFromGeneric->update('course_rel_user','id', 4624626, array('c_id'=>154));

 $student = @$getFromGeneric->get_single('user', array('id'=>$student_id), 'id', 'asc');
 //echo $no;
?>

