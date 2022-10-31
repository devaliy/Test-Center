<?php
 
    require_once('includes/header.php');
    $no = 1;
    
    //$student = @$getFromGeneric->update('course_rel_user','id', 4624626, array('c_id'=>154));
   
    $student = @$getFromGeneric->get_single('student', array('id'=>$no), 'id', 'asc');
    //echo $no;
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>School Name Here</h4>
           
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

     <!-- Main content -->
     <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card  card-outline">
              <div class="card-header">
                <ul class=" nav nav-pills card-header-pills">
                  <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="#"class="nav-link"> Student Profile</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="#"class="nav-link"><?=@$student->fname.' '.@$student->sname;?></a></li>

                </ul>
                <h3>Test Center Dashboard</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">

                     <!-- Card: user Card style 1 -->
                <div class="card">
                  
                  <div class="card-body">
                  

                    <div class="row text-center">
                      <div class="col-md-10 offset-1">
                        <h4 class=""><?=@$student->fname.' '.@$student->sname.' '.@$student->oname;?></h4>
                        <h5 class=""><?php 
                          $curclass = @$getFromGeneric->get_single('class', array('id'=>$student->cur_class), 'id', 'asc');
                          $curarm = @$getFromGeneric->get_single('classroom',  array('id'=>$student->cur_arm), 'id', 'asc');
                          echo @$curclass->name.' '.@$curarm->name;
                       ?></h5>
                        <a class="btn btn-success" style="color: white;" href="#">Active</a>
                       
                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-md-12">
                        <hr>

                        <p><i class="fa fa-phone"></i>&nbsp;<span style="font-weight:700;font-size:500;">Phone:&nbsp;</span><?=@$student->tel;?></p>
                        <p><i class="fa fa-mail"></i>&nbsp;<span style="font-weight:700;font-size:500;">Email:&nbsp;</span>   <?=@$student->email;?></p>
                      </div>
                      <div class="col-md-12 text-center" style="color: red;">
                       <!-- <h6>No Medical Alert</h6> -->
                      </div>
                    
                    </div>
                 <!--    <div class="row">
                      
                      <div class="col-md-12 text-center">
                        <hr>
                        <h5>Attendance</h5>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-center">
                        
                          <h6>0%</h6>
                          <h6>week</h6>
                        </div>

                        <div class="col-md-3 text-center">
                        
                          <h6>0%</h6>
                          <h6>week</h6>
                        </div>

                        <div class="col-md-6">
                        
                          <h6  style="color: blue;">Present: 0 Times</h6>
                          <h6 style="color: red;">Absent: 0 Times</h6>
                          <h6 style="color: yellow;">Late: 0 Times</h6>
                        </div>

                      
                    
                    </div>
                     -->
                    
                  
                  </div>           
                 
                </div>
            <!-- /.Card-user -->
                  </div>

                  <div class="col-md-8">
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="custom-content-below-bio-tab" data-toggle="pill" href="#custom-content-below-bio" role="tab" aria-controls="custom-content-below-bio" aria-selected="true">Latest Result</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " id="custom-content-below-bio-tab1" data-toggle="pill" href="#custom-content-below-bio1" role="tab" aria-controls="custom-content-below-bio1" aria-selected="true">Latest Result</a>
                    </li>

                  </ul>
                  <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-bio" role="tabpanel" aria-labelledby="custom-content-below-bio-tab">
                    
                         
<div class="row " style="padding: 20px;">
    
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
     <div class="col-md-6">
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
                 
                    <div class="tab-pane fade show " id="custom-content-below-bio1" role="tabpanel" aria-labelledby="custom-content-below-bio-tab1">
                     
                    
                    </div>
                  </div>
                </div> 
                
                </div>
                
              </div>
              <!-- /.card-body -->
        


             </div>
            <!-- /.card -->

       
          </div>
       
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
<?php


    require_once('includes/footer.php');



      if(isset($_POST['update'])){
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $oname = $_POST['oname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
      
    $save = $getFromGeneric->update('student', $no, array('fname'=>$fname, 'sname'=>$sname, 'oname'=>$oname, 'gender'=>$gender, 'dob'=>$dob, 'email'=>$email, 'contact_addr'=>$address));
    
    if($save){
      echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
    //  toastr.success('Changes Updated Successfully.')
      Toast.fire({
        type: 'success',
        title: ' Changes Updated Successfully.'
      }) 
     
       
     
    });
    setInterval(() => {
      window.open('".BASE_URL."student','_self');
    }, 3000);
  
  </script>";

      }else{
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
           toastr.error('Error failde to update Changes.')
              
           
           
             
          });
         
        </script>";
  }
      }
    
    ?>












