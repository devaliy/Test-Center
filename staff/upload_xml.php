
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
      
        <h3>Question Uploading Page</h3>
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
            <div class="card  card-outline elevation-0">
            <div class="card-header">
                <ul class=" nav nav-pills card-header-pills">
                  <li class="nav-item"><a href="staff/test" class="nav-link">Tests</a></li>
                  <li class="nav-item"><a href="staff/upload?id=<?=$_GET['id']?>" class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="staff/upload?id=<?=$_GET['id']?>"class="nav-link">Question Uploading Page</a></li>
                
                </ul>
                <h3 class="text-center"><?=$getFromGeneric->get_single('test', array('id'=>$_GET['id']), 'id', 'asc')->test_name;?></h3>
             </div>
                <div class="card-body">
                    <div class="row">
                    <div class="offset-md-3 col-md-6">

                        <div class="card elevation-1">                    
                            <div class="card-body">                     
                                
                                <form  method="post" action="staff/upload_xml?id=<?=$_GET['id'];?>" enctype="multipart/form-data">
                          <div class="row">
                              <div class="form-group col-md-6">
                                                                 
                                <div>
                                  <label for="formFileLg" class="form-label">Select File</label>
                                  <input class="form-control form-control-lg" name="quest" type="file" accept=".xml">
                                </div>
                              
                              </div>  
                          </div>
                                 
                          <div class="pull-right">
                                <div class="form-group " ><!-- form-group Starts -->
                                    <div class="col-md-6 offset-md-4" >

                                    <input type="submit" name="submit" value="Upload Question" class="btn btn-info text-white form-control" >

                                    </div>
                                   
                                </div>                   
                            
                            </div> 
                            </form>
                        </div>          
                    
                        </div>
                    </div>
           
               
             
          </div>
          <div class="row">
          <div class=" col-md-12">
                  <table class="table table-responsive table-striped" >
                    <a href="staff/upload_xml?id=<?=$_GET['id']?>">Reload Page</a>
                      <thead>
                          <th>S/N</th>
                          <th width="150px">Test Name</th>
                          <th>Question</th>
                          <th>Options</th>
                          <th>Correct Answer</th>
                          <th>Manage</th>
                      </thead>

                      <tbody>

                      <?php 
                        $all = $getFromGeneric->get_multi('questions', array('test_id'=>$_GET['id']), 'id', 'asc');
                      //var_dump($all);
                    $sn = 0;
                          foreach($all as $in):
                            $sn +=1;
                      ?>
                        <tr>
                        <td><?=$sn?></td>
                          <td><?=$getFromGeneric->get_single('test', array('id'=>$in->test_id), 'id', 'asc')->test_name;?></td>

                        
                          <td><?=$in->question?></td>
                          <td>
                            <?php 
                                $ali = $getFromGeneric->get_multi('options', array('question_id'=>$in->id), 'id', 'asc');

                                foreach($ali as $kewu):
                      
                            ?>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked><?=$kewu->options?>
                            </div>

                            <?php endforeach  ?>
                          </td>
                          <td>
                            <?php 
                                $aliy = $getFromGeneric->get_single('options', array('question_id'=>$in->id, 'is_correct'=>1), 'id', 'asc');

                              
                      
                            ?>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked><?=$aliy->options?>

                                </br>
                                <!-- <a class="btn btn-warning text-white" href="question?subj=<?//=$in->id;?>">
                                <i class="fa fa-edit"></i> -->

                                </a>
                            </div>

                           
                          </td>

                          <td><a class="btn btn-danger" href="staff/option_del?id=<?=$in->id;?>&back=<?=$_GET['id']?>">Delete</a>

                        
                         </td>
                        </tr>
                         <?php endforeach?>
                      </tbody>


                      <tfoot>
                          <th>S/N</th>
                          <th>Test Name</th>
                          <th>Question</th>
                          <th>Options</th>
                          <th>Correct Answer</th>
                          <th>Manage</th>
                      </tfoot>

                  </table>
              
                </div>
                
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
      

    <?php include('includes/footer.php');?>
<script>
$(function() {
    $('button.first').confirmButton({
        confirm: "Are you really sure?"
    });
});
</script>
<?php 

                            

if(isset($_POST['submit'])){
  
        $test_id = $_GET['id'];
  
        if(isset($_FILES['quest'])){
          if(!empty($_FILES['quest']['name'][0])){
                  $fileRoot = $getFromGeneric->uploadDocXml($_FILES['quest']);
                $up_file =  $getFromGeneric->create('question_file',  array('test_id'=> $test_id, 'url' => $fileRoot));

          

          
          if($up_file){ 

            $get_file = @$getFromGeneric->get_single('question_file', array('id'=>$up_file), 'id', 'asc')->url;

            //$questions = $getFromExam->XtractQuestion('../assets/documents/'.$get_file);
           // $questions = '../assets/documents/'.$get_file;
            $xmls = simplexml_load_file('../assets/documents/'.$fileRoot);
           
          
            
              $init = count($xmls);
          
              $x = pathinfo($get_file, PATHINFO_FILENAME);
       
           $optnum = 0;
           foreach ($xmls->$x as $xml) {
               
             $optnum ++;
             $options = [];
             $question = (string)$xml->Questions;
             $quest_num = (string)$xml->QuesNo;

             $OptionA = (string)$xml->OptionA;
             $OptionB = (string)$xml->OptionB;
             $OptionC = (string)$xml->OptionC;
             $OptionD = (string)$xml->OptionD;

             array_push($options, $OptionA,  $OptionB, $OptionC, $OptionD);

             $correct = (string)$xml->Answers;
             $graphics = (string)$xml->Graphics;
           
             

             if($correct == 'A'){
               $corrects = 0;
             }else if($correct == 'B'){
               $corrects = 1;
             }else if($correct == 'C'){
               $corrects = 2;
             }else if($correct == 'D'){
               $corrects = 3;
             }
             

                 
             $createQuestion = $getFromGeneric->create('questions',  array('question'=>$question, 'test_id'=>$test_id, 'graphics'=>$graphics, 'questNo'=>$quest_num));
             if($createQuestion){
               $createOptions = $getFromExam->createOption($createQuestion, $corrects, $options);  
             } 
            
            unset($options);
         }
           if($init == $optnum ){
                  
              echo "<script type='text/javascript'>
              $(function() {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                });
                toastr.success(' Question Uploaded.')
              });
              // setInterval(() => {
              //   window.location.replace('staff/upload_xml?id=".$_GET['id']."'); 
              //   }, 1000);
      
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
                  toastr.error('  Failed to Upload Question.')
                
                
                
                });
    
                // setInterval(() => {
                //   window.location.replace('staff/upload_xml?id=".$_GET['id']."');
                // }, 1000);
    
                            
    
                </script>"; 
    
                
              }    
    
    
    
    
            }
       
          }
        }

        }








  // if(isset($_POST['submit'])){

  //   $names = $_POST['names'];
  //   $class = $_POST['class'];
  //   $time = $_POST['time'];
  //    $subject_id = $_POST['subject'];
  //    $staff_id = 5; //$_SESSION['teacher_id'];
  //    $school_id = 1;
   
  //     $createTest = $getFromGeneric->create('test',  array('class_id'=>$class, 'subject_id'=>$subject_id, 'test_name'=>$names, 'time'=>$time, 'school_id'=>$school_id, 'staff_id'=>$staff_id));
          
           
  //       if($createTest){    
  //         echo "<script type='text/javascript'>
  //         $(function() {
  //           const Toast = Swal.mixin({
  //             toast: true,
  //             position: 'top-end',
  //             showConfirmButton: false,
  //             timer: 2000
  //           });
  //           toastr.success('Test Created Successfully.');
  //          });

  //          setInterval(() => {
  //           window.open('test','_self');
  //         }, 2000);
         
  //       </script>";

       
       
  //       } else {
  //         echo "<script type='text/javascript'>
  //         $(function() {
  //           const Toast = Swal.mixin({
  //             toast: true,
  //             position: 'top-end',
  //             showConfirmButton: false,
  //             timer: 3000
  //           });
  //           toastr.error('  Failed to Create Test.')
  //         });
  //       </script>";   
        
  //       } 
      
   
  // }


  // //update each questions
  // if(isset($_POST['updateQue'])){
  //     $quest = $_POST['editQue'];
  //     $qstId = $_POST['qstId'];
  //     if(!empty($quest)) {
  //       $getFromGeneric->update('question', 'id', $qstId, array('question'=>$quest));
  //       echo "<script type='text/javascript'>
  //         $(function() {
  //           const Toast = Swal.mixin({
  //             toast: true,
  //             position: 'top-end',
  //             showConfirmButton: false,
  //             timer: 3000
  //           });
  //          // toastr.success('Question Submitted Successfully.')
  //             Toast.fire({
  //               type: 'success',
  //               title: ' Question Updated Successfully.'
  //             })
  //         });
  //         setInterval(() => {
  //           window.open('question,'_self');
  //         }, 2000);
  //       </script>";
  //     }
      
  //     else {
  //       echo "<script type='text/javascript'>
  //       $(function() {
  //         const Toast = Swal.mixin({
  //           toast: true,
  //           position: 'top-end',
  //           showConfirmButton: false,
  //           timer: 3000
  //         });
  //         toastr.error('Input Field Required')
  //       });
  //     </script>";   
  //     }
  // }

  // //update each options
  // if(isset($_POST['updateOpt'])){
  //   $opti = $_POST['editOpt'];
  //   $optId = $_POST['optId'];
  //   if(!empty($opti)) {
  //     $getFromGeneric->update('options', 'id', $optId, array('options'=>$opti));
  //   } else {
  //     echo "<script type='text/javascript'>
  //     $(function() {
  //       const Toast = Swal.mixin({
  //         toast: true,
  //         position: 'top-end',
  //         showConfirmButton: false,
  //         timer: 3000
  //       });
  //       toastr.error('Input Field Required')
  //     });
  //   </script>";   
  //   }
  // }

  // // update questions to display as play for styudents
  // if(isset($_POST['playQue'])){
  //   $play = $_POST['play'];
  //   $assQueId = $_POST['assQueId'];
  //   if(!empty($play)) {
  //     $getFromGeneric->update('question', 'id', $assQueId, array('q_bank'=>$play));
  //   } else {
  //     echo "<script type='text/javascript'>
  //     $(function() {
  //       const Toast = Swal.mixin({
  //         toast: true,
  //         position: 'top-end',
  //         showConfirmButton: false,
  //         timer: 3000
  //       });
  //       toastr.error('Input Field Required')
  //     });
  //   </script>";   
  //   }
  // }

  // //delete each questions
  // if(isset($_POST['deleteQue'])){
  //   $editQueNum = $_POST['editQueNum'];
  //   $editQueNu = $_POST['editQueNu'];
  //   if(!empty($editQueNum)) {
  //     // delete($table, $array)
  //     $getFromGeneric->delete('question', array('id' => $editQueNum));
  //     $getFromGeneric->delete('options', array('question_id' => $editQueNum));
  //   } else {
  //     echo "<script type='text/javascript'>
  //     $(function() {
  //       const Toast = Swal.mixin({
  //         toast: true,
  //         position: 'top-end',
  //         showConfirmButton: false,
  //         timer: 3000
  //       });
  //       toastr.error('Input Field Required')
  //     });
  //   </script>";   
  //   }
  // }


?>
