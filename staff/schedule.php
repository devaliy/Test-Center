
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
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card  card-outline elevation-0">
            <div class="card-header">
                <ul class=" nav nav-pills card-header-pills">
                  <li class="nav-item"><a href="staff/dashboard" class="nav-link">Dashboard</a></li>
                  <li class="nav-item"><a href="staff/test" class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="staff/test"class="nav-link">Test Creation Page</a></li>
                
                </ul>
                <h3 class="text-center">Create New Test</h3>
             </div>
                <div class="card-body">
                    <div class="row">
                    <div class="offset-md-3 col-md-6">

                        <div class="card elevation-1">                    
                            <div class="card-body">                     
                                
                                <form  method="post" enctype="multipart/form-data">
                          <div class="row">
                        

                                <div class="form-group   col-md-6" ><!-- form-group Starts -->
                                  <label class="col-md-12  control-label" >Select Test</label>

                                  <div class="col-md-12 " >

                                  <select name="test" class="form-control" >
                                  <option value="">Select Test</option>
                                 
                                  <?php 
                                  
                                        $get_subs = $getFromGeneric->get_All('test', 'id', 'desc');
                                     //var_dump($get_subs);
                                      foreach($get_subs as $subj):       
                                ?>


                                    <option value='<?=$subj->id?>'><?=$subj->test_name?></option>
                                   
                                  <?php endforeach; ?>
                                  </select>
                                  </div>

                                </div><!-- form-group Ends -->
                                <div class="form-group col-md-6" ><!-- form-group Starts -->
                                  <label class="col-md-12  control-label" > Select Class </label>

                                 <div class="col-md-12 " >

                                 <select name="class" class="form-control" >

                                 <option value="">Select Class</option>
                                 <option value="11">JSS1</option>
                                  <option value="10">JSS2</option>

                                  <option value="12">JSS3</option>
                                  
                                  <option value="17">SS1 Art</option>
                                  <option value="18">SS1 Comm</option>
                                  <option value="19">SS1 Sci</option>
                                  

                                  <option value="20">SS2 Art</option>
                                  <option value="21">SS2 Comm</option>
                                  <option value="22">SS2 Sci</option>

                                  <option value="23">SS3 Art</option>
                                  <option value="24">SS3 Comm</option>
                                  <option value="25">SS3 Sci</option> 

                                 </select>
                                 </div>

                                </div><!-- form-group Ends -->

                                <div class="form-group col-md-6" ><!-- form-group Starts -->
                                 <label class="col-md-12  control-label" > Starting  </label>

                                 <div class="col-md-12 " >

                                  <input type="datetime-local" name="start" class="form-control">
                                  </div>

                                </div><!-- form-group Ends -->

                                <div class="form-group col-md-6" ><!-- form-group Starts -->
                                 <label class="col-md-12  control-label" > Ending  </label>

                                 <div class="col-md-12 " >

                                  <input type="datetime-local" name="end" class="form-control">
                                  </div>

                                </div><!-- form-group Ends -->

     
                          

                          </div>
                                 
                          <div class="pull-right">
                                <div class="form-group " ><!-- form-group Starts -->
                                    <div class="col-md-6 offset-md-4" >

                                    <input type="submit" name="submit" value="Create Test" class="btn btn-info text-white form-control" >

                                    </div>
                                   
                                </div>                   
                            
                            </div> 
                            </form>
                        </div>          
                    
                        </div>
                    </div>
           
               
             
          </div>
          <div class="row">
          <div class=" col-md-8 offset-md-2">
                  <table class="table table-responsive table-striped" >
                      <thead>
                          <th>S/N</th>
                          <th>Test Name</th>
                          <th>Class</th>
                          <th>Start</th>
                          <th>End</th>
                          <th>Manage Schedule</th>
                      </thead>

                      <tbody>

                      <?php 
                        $all = $getFromGeneric->get_multi('schedule_test',array('school_id'=>$_SESSION['school_id']), 'id', 'desc');
                      //var_dump($all);
                    $sn = 0;
                          foreach($all as $in):
                            $sn +=1;
                      ?>
                        <tr>
                        <td><?=$sn?></td>
                          <td><?=$getFromGeneric->get_single('test', array('id'=>$in->test_id), 'id', 'asc')->test_name;?></td>
                          <td><?=$getFromGeneric->get_single('usergroup', array('id'=>$in->class_id), 'id', 'asc')->name;?></td>

                          <td>
                            
                          <?php 
                          echo $in->startingd;
                          //$getFromGeneric->get_single('course', array('id'=>$in->subject_id), 'id', 'asc')->title;
                          
                          ?>
                        
                        
                        </td>

                        <td>
                            
                            <?php 
                            echo $in->endingd;
                            //$getFromGeneric->get_single('course', array('id'=>$in->subject_id), 'id', 'asc')->title;
                            
                            ?>
                          
                          
                          </td>
  

                          <td><a class="btn btn-danger" href="staff/schedule_del?id=<?=$in->id;?>">Delete Schedule</a></td>
                        </tr>
                         <?php endforeach?>
                      </tbody>


                      <tfoot>
                      <th>S/N</th>
                          <th>Test Name</th>
                          <th>Class</th>
                          <th>Start</th>
                          <th>End</th>
                          <th>Manage Schedule</th>
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

<?php 

  if(isset($_POST['submit'])){

    $test = $_POST['test'];
    $class = $_POST['class'];
    $start = $_POST['start'];
     $end = $_POST['end'];
     $staff_id = $_SESSION['staff_id'];; //$_SESSION['teacher_id'];
     $school_id = $_SESSION['school_id'];;
   
      $createTest = $getFromGeneric->create('schedule_test',  array('class_id'=>$class, 'test_id'=>$test, 'startingd'=>$start, 'endingd'=>$end, 'school_id'=>$school_id));
          
           
        if($createTest){    
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 2000
            });
            toastr.success('Schedule Created Successfully.');
           });

           setInterval(() => {
            window.open('staff/schedule','_self');
          }, 2000);
         
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
            toastr.error('  Failed to Create Test.')
          });
        </script>";   
        
        } 
      
   
  }


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
