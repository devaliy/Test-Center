<?php

include_once('../core/init.php');

    if(isset($_POST['fid'])){
      $cbt_table = $_POST['fid'];
      $student = $_POST['sid'];

      $get = $getFromCbt->get_questions_live($cbt_table, '1');
     if($get != false){
              $question_id =$get->question_id;
              $numbering =$get->numbering;
             $getQuest = $getFromCbt->get_question($question_id);
                      
                $ques = $getQuest->question;

                $getOptions = $getFromCbt->get_options($question_id);
              $opts = '';
               foreach($getOptions as $option){
                
                  $opts .= '<div class="icheck-info d-block" >
                      <input type="radio" id="radioPrimary'.$option->id.'" name="r1" value="'.$option->id.'">
                      <label for="radioPrimary'.$option->id.'">'.$option->options.'</label>
                  </div>';

              }
              $output = array(
                'success'	=>	true,    
                'numbering' => $numbering,
                'quest' => $ques,
               'opts' => $opts
               
            );
       }
         echo json_encode($output);

  }
      




  /*
  * Next Navigation Link  
  *
  */

  if(isset($_POST['next'])){
    $cbt_table = $_POST['id'];
    $student = $_POST['sid'];
    $number = $_POST['next'];

    $get = $getFromCbt->get_questions_live($cbt_table, $number);
   if($get != false){
            $question_id =$get->question_id;
            $numbering =$get->numbering;
           $getQuest = $getFromCbt->get_question($question_id);


                    
              $ques = $getQuest->question;

                            $getOptions = $getFromCbt->get_options($question_id);
            $opts = '';
             foreach($getOptions as $option){
              
                $opts .= '<div class="icheck-info d-block" >
                    <input type="radio" id="radioPrimary'.$option->id.'" name="r1" value="'.$option->id.'">
                    <label for="radioPrimary'.$option->id.'">'.$option->options.'</label>
                </div>';

            }
            $output = array(
              'success'	=>	true,    
              'numbering' => $numbering,
              'quest' => $ques,
             'opts' => $opts
             
          );
     }
       echo json_encode($output);

}
   







  /*
  * Previous Navigation Link  
  *
  */

  if(isset($_POST['prev'])){
    $cbt_table = $_POST['id'];
    $student = $_POST['sid'];
    $number = $_POST['prev'];

    $get = $getFromCbt->get_questions_live($cbt_table, $number);
   if($get != false){
            $question_id =$get->question_id;
            $numbering =$get->numbering;
           $getQuest = $getFromCbt->get_question($question_id);
                    
              $ques = $getQuest->question;

                            $getOptions = $getFromCbt->get_options($question_id);
            $opts = '';
             foreach($getOptions as $option){
              
                $opts .= '<div class="icheck-info d-block" >
                    <input type="radio" id="radioPrimary'.$option->id.'" name="r1" value="'.$option->id.'">
                    <label for="radioPrimary'.$option->id.'">'.$option->options.'</label>
                </div>';

            }
            $output = array(
              'success'	=>	true,    
              'numbering' => $numbering,
              'quest' => $ques,
             'opts' => $opts
             
          );
     }
       echo json_encode($output);

}
   




  /*
  *  Navigation Links
  *
  */

  if(isset($_POST['navigate'])){
    $cbt_table = $_POST['id'];
    $student = $_POST['sid'];
    $number = $_POST['navigate'];

    $get = $getFromCbt->get_questions_live($cbt_table, $number);
   if($get != false){
            $question_id =$get->question_id;
            $numbering =$get->numbering;
           $getQuest = $getFromCbt->get_question($question_id);


                    
              $ques = $getQuest->question;

                            $getOptions = $getFromCbt->get_options($question_id);
            $opts = '';
             foreach($getOptions as $option){
              
                $opts .= '<div class="icheck-info d-block" >
                    <input type="radio" id="radioPrimary'.$option->id.'" class="answer_opt" name="r1" value="'.$option->id.'">
                    <label for="radioPrimary'.$option->id.'">'.$option->options.'</label>
                </div>';

            }
            $output = array(
              'success'	=>	true,    
              'numbering' => $numbering,
              'quest' => $ques,
             'opts' => $opts
             
          );
     }
       echo json_encode($output);

}
   
?>
