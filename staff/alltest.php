<?php 
  require_once('../config/init.php');

require_once('includes/header.php');


?>
<div class="container  ">

<div class=" row ">

    <div class="col-md-12">
        <hr>
            <h5  class="text-center">Subject(s) Undertaken</h5>
        <hr>
    </div>
        <?php 
            $subject = $getFromGeneric->get_All('teacher_subj', 'id', 'desc');
            foreach($subject as $subj):
        ?>
        <!-- <div class="row"> -->
            <div class="col-md-4 my-5">
                <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-warning">
                        <h3 class="widget-user-username">
                            <?php
                                $subjs = @$getFromGeneric->get_single('subject',  array('id'=>$subj->subject_id), 'id', 'desc');
                                echo @$subjs->name;
                            ?>
                        </h3>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item text-blue py-2 pl-3">
                                Class <span class="float-right badge bg-primary mr-3">
                                <?php
                                    $arm = @$getFromGeneric->get_single('classroom',  array('id'=>$subj->classroom_id), 'id', 'desc');
                                    echo @$arm->name;
                                    $subId = $subj->subject_id;
                                ?>
                                </span>
                            </li>
                            <li class="nav-item text-blue py-2 pl-3">
                                Number of Questions <span class="float-right badge bg-primary mr-3">
                                    <?php 
                                       // echo $getFromGeneric->totalQuestions($subId);
                                    ?>
                                </span>
                            </li>
                            <li class="nav-item text-blue py-2 pl-3">
                                Student Practice Questions <span class="float-right badge bg-primary mr-3">
                                    <?php 
                                       // echo $getFromGeneric->studentPracticeQue($subId);
                                    ?>
                                </span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="question/<?=$subj->subject_id;?>">
                                    Create Questions <span class="float-right badge bg-danger">Question Builder</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="question/<?=$subj->subject_id;?>">
                                    Subject Results <span class="float-right badge bg-danger">Subject Results</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> <!-- /.widget-user -->
            </div> <!-- /.col -->
            <?php endforeach;?><!-- </div> -->
        
</div>

<?php 

require_once('includes/footer.php');
require_once('../config/model.php');

?>