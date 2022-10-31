
<?php 
    
    include '../../config/init.php';
    $getFromStudent->logout();
    if($getFromStudent->loggedIn() === false) {
		header('Location: '.BASE_URL.'login');
    }
?>
