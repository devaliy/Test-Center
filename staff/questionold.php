
 <?php 

require_once('../config/init.php');

require_once('includes/header.php');


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
      
        <h3>Student Details Page</h3>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card  card-outline elevation-0">
            <div class="card-header">
                <ul class=" nav nav-pills card-header-pills">
                  <li class="nav-item"><a href="dashboard" class="nav-link">Dashboard</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="#"class="nav-link">Subject</a></li>
                
                  <li class="nav-item text-right"> <a href="passage" class="btn btn-info text-white">Add Pasages</a></li>
             
                </ul>
                <h3 class="text-center">Manage Passages</h3>
             </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">

                        <div class="card elevation-1">                    
                            <div class="card-body">                     
                                
                                <form  method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-md-10 control-label" >Question :</label>

                                  
                                <textarea name="question"  class="form-control"  >
                              </textarea>
                            </div>

                                <div class="form-group" ><!-- form-group Starts -->
                                  <label class="col-md-12  control-label" > Option 1 </label>

                                  <div class="col-md-12 " >

                                    <input type="text" name="option1" class="form-control"  >

                                  </div>

                                </div><!-- form-group Ends -->
                                <div class="form-group" ><!-- form-group Starts -->
                                <label class="col-md-12  control-label" > Option 2 </label>

                                <div class="col-md-12 " >

                                <input type="text" name="option2" class="form-control"  >

                                </div>

                                </div><!-- form-group Ends -->

                                <div class="form-group" ><!-- form-group Starts -->
                                <label class="col-md-12  control-label" > Option 3 </label>

                                <div class="col-md-12 " >

                                <input type="text" name="option3" class="form-control"  >

                                </div>

                                </div><!-- form-group Ends -->


                                <div class="form-group" ><!-- form-group Starts -->
                                <label class="col-md-12  control-label" > Option 4 </label>

                                <div class="col-md-12 " >

                                <input type="text" name="option4" class="form-control"  >

                                </div>

                                </div><!-- form-group Ends -->

                                <div class="form-group" ><!-- form-group Starts -->
                                <label class="col-md-12 control-label" > Option 5 </label>

                                <div class="col-md-12 " >

                                <input type="text" name="option5" class="form-control"  >

                                </div>

                                </div><!-- form-group Ends -->

                                <div class="form-group" ><!-- form-group Starts -->
                                    <label class="col-md-10 offset-md-1 control-label" > Correct Option </label>

                                    <div class="col-md-3 offset-md-1" >

                                    <input type="number" name="correct" class="form-control" required >

                                    </div>

                                </div><!-- form-group Ends -->
                                <div class="form-group" ><!-- form-group Starts -->

<label class="col-md-10 control-label" > Require Passage </label>

<div class="col-md-10" >


    <select name="passage" class="form-control" >

    <option value='0'>No</option>
    <option value='1'>Yes</option>

    </select>

</div>

</div>    









                                
                                
                            <div class="pull-right">
                                <div class="form-group " ><!-- form-group Starts -->
                                    <div class="col-md-6 offset-md-4" >

                                    <input type="submit" name="submit" value="Insert Question" class="btn btn-info text-white form-control" >

                                    </div>
                                   
                                </div>                   
                            
                            </div> 

                            </form>
                        </div>          
                    
                        </div>
                    </div>
           
               
                  <div class="col-md-6">
                 
                  <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-bio" role="tabpanel" aria-labelledby="custom-content-below-bio-tab">
                     <div class="row"> <div class="col-md-12"><p></p></div></div>

                <?php 
                  $questions = $getFromStaff->get_multi('question', array('subject_id'=> $_GET['subj']), 'id', 'desc');
                  $sn = 0;
                  //var_dump($questions);
                  //echo $subject_id;

                  foreach($questions as $question):
                      $sn +=1;
                      $question_id = $question->id;
                      // echo $question_id;
                      // var_dump($question);
                ?>
                     <div class="card card-secondary collapsed-card">
                          <div class="card-header">
                            <h3 class="card-title text-white">Question  <?=$sn;?></h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus text-white"></i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                          <!-- <a class="btn btn-info text-white">Assign Passage</a> -->
                          <form method="POST">
                            <input type="hidden" name="play" value="1">
                            <input type="text" name="assQueId" value="<?=$question_id?>">
                            <button type="submit" name="playQue" class="btn btn-danger">Assign Passage</button>
                          </form>

                            <p> <?=$question->question;?>&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#edit-question<?=$question_id?>" class="btn btn-info text-white"> <i class="fas fa-edit"></i></a> </p>
                            <hr>
                            <div class="form-group clearfix text-left choice" style="font-size:14px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: black;">

                              <?php 
                                $questionGan = $question->question;
                                // echo $questionGan;
                                $options = $getFromStaff->get_multi('options', array('question_id'=>$question_id), 'id', 'asc');
                                foreach($options as $option):
                                  $optionId = $option->id;
                                  // echo $optionId;
                              ?>
                              
                                <div class="icheck-info d-block"  >
                                  <input type="radio" id="radioPrimary<?=$option->id;?>" name="r<?=$question_id;?>"
                                    <?php 
                                      $iscorrect = $option->is_correct;
                                      if($iscorrect == 1){
                                        echo 'checked';
                                      }
                                      $optionse = $getFromStaff->get_single('options', array('id'=> $optionId), 'id', 'desc');
                                    ?>>
                                  <label for="radioPrimary<?=$option->id;?>">
                                    <?=$option->options;?>
                                    &nbsp;&nbsp;&nbsp;

                                    <a href="#" data-toggle="modal" data-target="#edit-option<?=$optionId?>" class="btn btn-info text-white"><i class="fas fa-edit"></i></a>
                                    <div class="modal fade" id="edit-option<?=$optionId?>">
                                      <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Small Modal</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>

                                          <form method="POST">
                                            <div class="modal-body">
                                              <input type="text" value="<?=$optionse->options?>" class="btn btn-success form-control my-1 px-1" name="editOpt">
                                              <input type="hidden" name="optId" value="<?=$optionId;?>">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <button type="submit" name="updateOpt" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </form>

                                        </div> <!-- /.modal-content -->
                                      </div> <!-- /.modal-dialog -->
                                    </div> <!-- /.end small modal -->
                                  </label>
                                </div>
                                
                                <?php endforeach;?>
                                
                                  <!-- Edit Question only Modal start -->
                                    <div class="modal fade" id="edit-question<?=$question_id?>">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">

                                          <?php 
                                            // echo $question_id;
                                            $questions = $getFromStaff->get_single('question', array('id'=> $question_id), 'id', 'desc');
                                          ?>
                                            <p><b>Question:</b></p>
                                            <form method="POST">
                                                <textarea name="editQue" class="" placeholder="Question to type"
                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;
                                                    padding: 10px;">
                                                    <?php 
                                                        // echo $questionGan;
                                                        // $question->question;
                                                        echo $questions->question;
                                                    ?>
                                                </textarea>
                                                <input type="hidden" name="qstId" value="<?=$question_id;?>">
                                                
                                                <center><button type="submit" name="updateQue" class="btn btn-danger">Save Edited Question</button></center>
                                            </form>
                                            
                                          </div>
                                        </div>  <!-- /.modal-content -->
                                      </div>  <!-- /.modal-dialog -->
                                    </div>  <!-- /.modal end -->
                                    
                                <br>
                      </div> 
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <form method="POST">
                      <!-- <a class="btn btn-danger text-white"><i class="fas fa-trash"></i></a> -->
                      <input type="hidden" name="editQueNum" value="<?=$question_id?>">
                      <button type="submit" name="deleteQue" class="btn btn-danger text-white"><i class="fas fa-trash"></i></button>
                     </form>
                  </div>
                </div>
                
                  <?php endforeach;?>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
      

    <?php include('includes/footer.php');?>

<?php 

  if(isset($_POST['question'])){

      $question = $_POST['question'];
     $subject_id = $_GET['subj'];
     // $subject_id = 1;
   // var_dump($_POST);
   // die();
      $correct = $_POST['correct'];
      $option = array();
      $option[1] =  $_POST['option1'];
      $option[2] =  $_POST['option2'];
      $option[3] =  $_POST['option3'];
      $option[4] =  $_POST['option4'];
      $option[5] =  $_POST['option5'];

      $createQuestion = $getFromStaff->create('question',  array('question'=>$question, 'subject_id'=>$subject_id, 'available'=> 'true' ));
          
      if($createQuestion){ 
        $question_id = $createQuestion;
        $createOptions = $getFromStaff->createOption($question_id, $correct, $option);        
        if($createOptions){    
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            toastr.success('Question Submitted Successfully.')
             
          });
          
        </script>";
       
        } else {
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            toastr.error('  Failed to Create Options.')
          });
        </script>";   
        
        }                   
      } else {
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Create Question.')
        });
      </script>";   
      
      }
      
   
  }


  //update each questions
  if(isset($_POST['updateQue'])){
      $quest = $_POST['editQue'];
      $qstId = $_POST['qstId'];
      if(!empty($quest)) {
        $getFromStaff->update('question', 'id', $qstId, array('question'=>$quest));
        echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
           // toastr.success('Question Submitted Successfully.')
              Toast.fire({
                type: 'success',
                title: ' Question Updated Successfully.'
              })
          });
          setInterval(() => {
            window.open('question,'_self');
          }, 2000);
        </script>";
      }
      
      else {
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('Input Field Required')
        });
      </script>";   
      }
  }

  //update each options
  if(isset($_POST['updateOpt'])){
    $opti = $_POST['editOpt'];
    $optId = $_POST['optId'];
    if(!empty($opti)) {
      $getFromStaff->update('options', 'id', $optId, array('options'=>$opti));
    } else {
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('Input Field Required')
      });
    </script>";   
    }
  }

  // update questions to display as play for styudents
  if(isset($_POST['playQue'])){
    $play = $_POST['play'];
    $assQueId = $_POST['assQueId'];
    if(!empty($play)) {
      $getFromStaff->update('question', 'id', $assQueId, array('q_bank'=>$play));
    } else {
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('Input Field Required')
      });
    </script>";   
    }
  }

  //delete each questions
  if(isset($_POST['deleteQue'])){
    $editQueNum = $_POST['editQueNum'];
    $editQueNu = $_POST['editQueNu'];
    if(!empty($editQueNum)) {
      // delete($table, $array)
      $getFromStaff->delete('question', array('id' => $editQueNum));
      $getFromStaff->delete('options', array('question_id' => $editQueNum));
    } else {
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('Input Field Required')
      });
    </script>";   
    }
  }


?>
