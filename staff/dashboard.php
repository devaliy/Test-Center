 <?php 
  include('../config/init.php');
  include('includes/header.php');

   // var_dump($_SESSION['school_id']);
  // $no = 1;
  //   $staff = @$getFromGeneric->get_single('staff', array('id'=>$no), 'id', 'asc');
  
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Test Center</h4>
           
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
                  <li class="nav-item"><a href="<?=BASE_URL?>/staff" class="nav-link">Home</a></li>
                  <li class="nav-item"><a  class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="<?=BASE_URL?>/staff"class="nav-link"> Staff Directory</a></li>
                  <li class="nav-item"><a  class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="<?=BASE_URL?>/staff"class="nav-link"><?=$staff->firstname.' '.$staff->lastname?></a></li>

                </ul>
                <h3>STAFF PROFILE</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">

                        <!-- Card: user Card style 1 -->
                    <div class="card  elevation-1"  style=" border-right: 0px solid black">
                    
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 offset-3">
                              <!-- <img  class="img-circle elevation-1" height="100px" width="100px" src="../assets/images/E1.png" alt="User Avatar"> -->
                          </div>
                        </div>

                        <div class="row text-center">
                          <div class="col-md-10 offset-1">
                              <h5 class="" style="font: capitalize;"><?=$staff->firstname.' '.$staff->lastname;?></h5>
                              <h6 class="">ICT Teacher</h6>
                              <a class="btn btn-success" style="color: white;" href="dashboard">active</a>                        
                          </div>
                        </div>

                        <div class="row">
                        
                          <div class="col-md-12">
                              <hr>

                              
                              <p><i class="fa fa-mail"> </i> Email:   <?=$staff->email;?></p>
                          </div>
                          <div class="col-md-12 text-center" style="color: red;">
                          <h6>School: <?php
                           $curarm = @$getFromGeneric->get_single('schools', array('id'=>$staff->school_id), 'id', 'desc');
                           echo @$curarm->school_name;
                           ;?></h6>
                          </div>
                        
                        </div>

                        <div class="row">

                        
                        
                      </div>
                    
                        
                    
                  </div>           
                   
                </div>
                    <!-- /.Card-user -->
                    

              </div>
              <div class="col-md-8">
                     <div class="row">
                       <?php 

                        $get_tests = $getFromGeneric->get_multi('test', array('school_id'=>$school_id), 'id', 'desc');

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
                                <a class="badge badge-info text-white">
                              <?php 
                                
                                echo $test->subject_id;
                                //$getFromGeneric->get_single('course',array('id'=>$test->subject_id), 'id', 'asc')->title;
                                
                              ?></a>
                                
                                
                                &nbsp;&nbsp; 
                                
                                <a class="badge badge-primary text-white"><?=@$getFromGeneric->get_single('usergroup',array('id'=>$test->class_id), 'id', 'asc')->name;?></a>
                                
                            
                              </div>
                            </div>
                           <div class="card-footer">
                           <a class="btn btn-success" href="staff/upload_xml?id=<?=$test->id?>">Manage</a>
                           </div>
                          </div>
                        </div>
                        <?php endforeach; ?>
                     </div>
              </div>



     
            </div>

                    

       
                 </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?php 

require_once('includes/footer.php');
require_once('../config/model.php');


   if(isset($_POST['update'])){
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $oname = $_POST['oname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
  
    $state = $_POST['state'];
    $nationality = $_POST['nationality'];
    $phone = $_POST['phone'];
  
$save = $getFromStaff->update('staff', 'id', $staff->id, array('fname'=>$fname, 'sname'=>$sname, 'oname'=>$oname, 'gender'=>$gender, 'dob'=>$dob, 'email'=>$email, 'contact_addr'=>$address, 'tel'=>$phone, 'state'=>$state, 'nationality'=>$nationality));

if($save){
  echo "<script type='text/javascript'>
$(function() {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
 // toastr.success('Changes Updated Successfully.')
  Toast.fire({
    type: 'success',
    title: ' Changes Updated Successfully.'
  })
   
 
});
setInterval(() => {
  window.open('".BASE_URL."staff/teacher','_self');
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
       toastr.error('Error faild to update Changes.')

       
         
      });
    
    </script>";
}

}
   
   ?>