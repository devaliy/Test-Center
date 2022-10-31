<?php

 if(isset($_GET['id'])){
  $question_set_id = $_GET['id'];

}

?>

<?php 

require_once('includes/header.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header)-->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
         
        </div>
      </div><!-- /.container-fluid-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
       <div class="row">
     
        <div class="col-md-12">

       

          <div class="card elevation-0 " >
          <div class="card-header">
                <ul class=" nav nav-pills card-header-pills">
                  <li class="nav-item"><a href="dashboard" class="nav-link">Dashboard</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="question"class="nav-link"> Question</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">/</a></li>              
                  <li class="nav-item"><a href="#"class="nav-link">Subject</a></li>

                </ul>
                <h3 class="text-center">Manage Passages</h3>
             </div>
            <!-- /.card-header -->
            <div class="card-body"> 
              
            <div class="row">
       
          <div class="col-md-6">
              <form  method="post" enctype="multipart/form-data">


                <div class="form-group" ><!-- form-group Starts -->
                    <label class="col-md-8 control-label" > Passage Title </label>

                <div class="col-md-8 " >

                <input type="text" name="title" class="form-control" required >

                </div>

               </div><!-- form-group Ends -->
            
                <div class="form-group">
                <label class="col-md-5 control-label" >Write passage :</label>

                  <textarea name="passage" class="" style="width: 100%;  font-size: 14px;  border: 1px solid #dddddd;
                    padding: 10px;">
                  </textarea>
                </div>

                <div class="pull-right">
                <div class="form-group " ><!-- form-group Starts -->

                  <label class="col-md-10 offset-md-1 control-label" ></label>

                  <div class="col-md-4 offset-md-3 " >

                  <input type="submit" name="submit" value="Create Passage" class="btn btn-warning text-white form-control" >

                  </div>
                </div>
              </div>
              </form>
          
          </div>  
          
          
          <div class="col-md-6">
                       <!-- Content Wrapper. Contains page content -->
             <table id="example1" class="table  table-bordered table-striped text-center">
              
              <thead  style="background: #ffbf00; color: white;">
                  <tr>
                  <th>S/N</th>
                  <th>Passage Title</th> 
                   <th>Date Created</th>               
                  <th>Actions</th>
                  
                  </tr>
              </thead>
              
              <tbody>
                  <?php
                         $sn = 1;
                          $pass = $getFromGeneric->get_multi('passage', array('subject_id'=>$_GET['subj']), 'id', 'asc');
                          foreach($pass as $columns):
                        
                          
                      ?>
                      <tr>
                      <td><?=@$sn;?></td>
                      <td><?=$columns->title;?></td>
                      <td><?=@$columns->date_created;?></td>
                      </td>
              
                      <td><div class="btn-group btn-group-xl">
                          <a href="edit_classroom/<?=$columns->id;?>" class="btn btn-warning" "><i class="fas fa-edit"></i></a>
                          
                          </div>
                      </td>
                      </tr>
                          <?php 
                            $sn++;
                         endforeach;
                          ?>
                  
                  
              </tbody>
          
         
          </table>
          
          </div> 
          
          </div>
          </div>  


         </div>   
 

          


          </div>
          
        </div>
        <!-- /.col-->
        
      </div>
      <!-- ./row -->
    </section>

    <section class="content">
      <div class="container">
     
       <div class="row">
     
        <div class="col-md-6">
       
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
   
  </div>
  <!-- /.content-wrapper -->

  <?php include('includes/footer.php');?>

  <?php

    if(isset($_POST['submit'])){
      $passage = $_POST['passage'];
      $title = $_POST['title'];
      $subject_id = 1;
      $createPassage = $getFromCbt->create('passage', array('subject_id'=>$subject_id,'title'=>$title, 'passage'=>$passage));
        
        if($createPassage){        
    
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
                title: ' Passage Created Successfully.'
              })
           
          });
          setInterval(() => {
            window.open('passage','_self');
          }, 2000);
        
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
            toastr.error('  Failed to Create Passage.')
          
          
          
          });

                      
        
        </script>";   
        
        }
    }
  
  ?>






