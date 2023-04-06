<?php
    // $servername = "mysql:host=localhost; dbname=alisam";
    // $username = "root";
    // $password = "";

   // $servername = "mysql:host=lagosulearn.cqusbzcbfvv2.us-east-2.rds.amazonaws.com; dbname=lagos_ulearn_db";
    $servername = "mysql:host=db-instance-18022023.cqusbzcbfvv2.us-east-2.rds.amazonaws.com; dbname=lagos_ulearn_db";
    $username = "db_admin";
    $password = "Excellent&1";
    
    try{

        $pdo = new PDO($servername, $username, $password);

    }catch(PDOException $e){

        echo 'Connection error'. $e->getMessage();
        
    }
?>