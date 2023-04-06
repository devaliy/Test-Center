
<?php 
    
    session_start();
   // session_abort();
    session_destroy();
    var_dump($_SESSION);
	header('Location: ../../index');
     
?>
