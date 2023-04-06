<?php
 
    require_once('includes/header.php');
    $no = 1;
    
    //$student = @$getFromGeneric->update('course_rel_user','id', 4624626, array('c_id'=>154));
   
    $student = @$getFromGeneric->get_single('user', array('id'=>$student_id), 'id', 'asc');
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
                  <li class="nav-item"><a href="#"class="nav-link"><?=@$student->firstname.' '.@$student->lastname;?></a></li>

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
                        <h4 class=""><?=@$student->firstname.' '.@$student->lastname?></h4>
                       
                        <a class="btn btn-success" style="color: white;" href="#">Active</a>
                       
                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-md-12">
                        <hr>

                       
                        <p><i class="fa fa-mail"></i>&nbsp;<span style="font-weight:700;font-size:15;">Email:&nbsp;</span>   <?=@$student->email;?></p>
                      </div>
                      <div class="col-md-12 text-center" style="color: red;">
                       <!-- <h6>No Medical Alert</h6> -->
                      </div>
                    
                    </div>
              </div>           
                 
                </div>
            <!-- /.Card-user -->
                  </div>

                  <div class="col-md-8">
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="custom-content-below-bio-tab" data-toggle="pill" href="#" role="tab" aria-controls="custom-content-below-bio" aria-selected="true">Latest Test</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " id="custom-content-below-bio-tab1" data-toggle="pill"  role="tab" aria-controls="custom-content-below-bio1" aria-selected="true">Latest Result</a>
                    </li>

                  </ul>
                  <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-bio" role="tabpanel" aria-labelledby="custom-content-below-bio-tab">
                    
                         
<div class="row " style="padding: 20px;">
            
         <?php 

$get_class = $getFromGeneric->get_single('usergroup_rel_user', array('user_id'=>$student_id), 'id', 'desc');

//var_dump($get_class); 

$get_tests = @$getFromGeneric->get_multi('test', array('school_id'=>68, 'class_id' =>11), 'id', 'desc');

        foreach($get_tests as $test):
        ?>
    
    <div class="col-md-6">
                          <div class="card">
                            <div class="card-header" >
                              <img width="100%" height="100%" src="https://www.readingrockets.org/sites/default/files/field/image/phonics-3.jpg">
                            </div>
                            <div class="card-content">
                              <div class="text-padding" style="padding: 15px">
                                
                              <h4><?=$test->test_name?></h4>
                              <p>
                                <a class="badge badge-info text-white"><?=$getFromGeneric->get_single('course',array('id'=>$test->subject_id), 'id', 'asc')->title;?></a>
                                
                                
                                &nbsp;&nbsp; 
                                
                                <a class="badge badge-primary text-white"><?=$getFromGeneric->get_single('usergroup',array('id'=>$test->class_id), 'id', 'asc')->name;?></a>
                                
                            
                              </div>
                            </div>
                           <div class="card-footer">
                           <a class="btn btn-success" href="student/prep?id=<?=$test->id?>">Manage</a>
                           </div>
                          </div>
                        </div>
                        <?php endforeach; ?>
       
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












